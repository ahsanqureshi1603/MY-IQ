<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Subject;
use App\Models\QuestionSubject;
use App\Models\AnswerKey;
use App\Models\QuestionContent;

class QuestionsController extends Controller
{
    /**
     * Sends questions list with question content and answer detail to list view in descending order of id
     * @return view
     */
    public function index()
    {
        $questions = Question::with('answers', 'answerKey', 'questionContent')->orderBy('id', 'desc')->paginate(8)->toArray();
        return view('questions.list', compact('questions'));
    }

    /**
     * Takes to add question page
     * Sends subject list to the page
     * @return view
     */
    public function add()
    {
        $verbalSubjects = Subject::where('category', 'verbal')
            ->get()
            ->toArray();

        $mathSubjects = Subject::where('category', 'math')
            ->get()
            ->toArray();
        return view('questions.add', compact('verbalSubjects', 'mathSubjects'));
    }

    /**
     * Creates new question along with its content,question subject, answer and answer key
     * First creates an entry in question_contents
     * Creates entries in question_subjects using question->id
     * Creates an entry in questions using question_contents->id
     * Creates an entry in answers using question->id
     * Creates an entry in answer_keys using question->id and answers->id
     * @param  array  $request - postdata
     * @param  array $request->question
     * @param  array $request->question_content
     * @param  array $request->answer
     * @param  array $request->answer_key
     * redirects to /admin/questions
     */

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'question.category' => 'required|string',
            'question.section' => 'required|string',
            'question.difficulty' => 'required|string',
            'question.question_extra' => 'nullable|string',
            'question_content.content' => 'required|string',
            'answer.options.0' => 'required|string',
            'answer.options.1' => 'required|string',
            'answer.options.2' => 'required|string',
            'answer.options.3' => 'required|string',
            'answer.options.4' => 'required|string',
            'answer_key.key' => 'required|integer|between:0,4',
            'answer_key.explanation_text' => 'nullable|string',
            'answer_key.explanation_video' => 'nullable|string',

        ]);
        $requestData = $request->all();

        DB::transaction(function () use ($requestData) {
            $questionContent = new QuestionContent();
            $questionContent->content = $requestData['question_content']['content'];
            $questionContent->save();

            $question = new Question();
            $question->content_id = $questionContent->id;
            $question->question_extra = (!empty($requestData['question']['question_extra']) ? $requestData['question']['question_extra'] : '');
            $question->category = $requestData['question']['category'];
            $question->section = $requestData['question']['section'];
            $question->difficulty = $requestData['question']['difficulty'];
            $question->save();

            if (isset($requestData['subjects'])) {
                foreach ($requestData['subjects'] as $subjectId => $subjectValue) {
                    $questionSubject = new QuestionSubject();
                    $questionSubject->question_id = $question->id;
                    $questionSubject->subject_id = $subjectId;
                    $questionSubject->save();
                }
            }

            if (!empty($requestData['new_subject'])) {
                $subject = new Subject();
                $subject->name = $requestData['new_subject'];
                $subject->category = $requestData['question']['category'];
                $subject->save();

                $questionSubject = new QuestionSubject();
                $questionSubject->question_id = $question->id;
                $questionSubject->subject_id = $subject->id;
                $questionSubject->save();
            }

            foreach ($requestData['answer']['options'] as $key => $value) {
                $answer = new Answer();
                $answer->question_id = $question->id;
                $answer->answer = $value;
                $answer->option_number = $key;
                $answer->save();

                if ($requestData['answer_key']['key'] == $key) {
                    $answerKey = new AnswerKey();
                    $answerKey->question_id = $question->id;
                    $answerKey->answer_id = $answer->id;
                    $answerKey->explanation_text = $requestData['answer_key']['explanation_text'];
                    $answerKey->explanation_video = $requestData['answer_key']['explanation_video'];
                    $answerKey->save();
                }
            }
        });

        return redirect('/admin/questions');
    }

    /**
     * Takes to edit question page
     * @param  int $question->id
     * @return view
     */

    public function edit(Question $question)
    {
        $verbalSubjects = Subject::where('category', 'verbal')
            ->get()
            ->toArray();

        $mathSubjects = Subject::where('category', 'math')
            ->get()
            ->toArray();
        $questionData = Question::with('answers', 'answerKey', 'questionContent', 'questionSubject.subject')->find($question->id);
        $questionData = $questionData->toArray();
        return view('questions.edit', compact('questionData', 'verbalSubjects', 'mathSubjects'));
    }

    /**
     * Updates the Question details
     * Updates question along with its content, answer and answer key
     * @param  array  $request - postdata
     * @param  array $request->question
     * @param  array $request->question_content
     * @param  array $request->answer
     * @param  array $request->answer_key
     * redirects to /admin/questions
     */

    public function update(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'question.category' => 'required|string',
            'question.section' => 'required|string',
            'question.difficulty' => 'required|string',
            'question.question_extra' => 'nullable|string',
            'question_content.content' => 'required|string',
            'answer.options.0' => 'required|string',
            'answer.options.1' => 'required|string',
            'answer.options.2' => 'required|string',
            'answer.options.3' => 'required|string',
            'answer.options.4' => 'required|string',
            'answer_key.key' => 'required|integer|between:0,4',
            'answer_key.explanation_text' => 'nullable|string',
            'answer_key.explanation_video' => 'nullable|string',
        ]);
        $requestData = $request->all();
        DB::transaction(function () use ($requestData, $question) {
            $question->question_extra = (!empty($requestData['question']['question_extra']) ? $requestData['question']['question_extra'] : '');
            $question->category = $requestData['question']['category'];
            $question->section = $requestData['question']['section'];
            $question->difficulty = $requestData['question']['difficulty'];
            $question->save();

            $questionData = Question::with('answers', 'answerKey', 'questionContent', 'questionSubject.subject')->find($question->id);
            $questionData = $questionData->toArray();

            $questionContent = QuestionContent::find($questionData['question_content']['id']);
            $questionContent->content = $requestData['question_content']['content'];
            $questionContent->save();

            QuestionSubject::where('question_id', $question->id)->delete();

            if (isset($requestData['subjects'])) {
                foreach ($requestData['subjects'] as $subjectId => $subjectValue) {
                    $questionSubject = new QuestionSubject();
                    $questionSubject->question_id = $question->id;
                    $questionSubject->subject_id = $subjectId;
                    $questionSubject->save();
                }
            }

            if (!empty($requestData['new_subject'])) {
                $subject = new Subject();
                $subject->name = $requestData['new_subject'];
                $subject->category = $requestData['question']['category'];
                $subject->save();

                $questionSubject = new QuestionSubject();
                $questionSubject->question_id = $question->id;
                $questionSubject->subject_id = $subject->id;
                $questionSubject->save();
            }


            foreach ($questionData['answers'] as $key => $value) {
                $answer = Answer::find($value['id']);
                $answer->answer = $requestData['answer']['options'][$key];
                $answer->save();

                if ($requestData['answer_key']['key'] == $key) {
                    $answerKey = AnswerKey::find($questionData['answer_key']['id']);
                    $answerKey->answer_id = $value['id'];
                    $answerKey->explanation_text = $requestData['answer_key']['explanation_text'];
                    $answerKey->explanation_video = $requestData['answer_key']['explanation_video'];
                    $answerKey->save();
                }
            }
        });
        return redirect('/admin/edit-question/' . $question->id);
    }
    /**
     * Deletes the Question details
     * @param  int $question
     * redirects to /admin/questions
     */

    public function delete(Question $question)
    {
        DB::transaction(function () use ($question) {
            $questionData = Question::with('answers', 'answerKey', 'questionContent')->find($question->id);
            $questionData = $questionData->toArray();
            QuestionSubject::where('question_id', $question->id)->delete();
            AnswerKey::destroy($questionData['answer_key']['id']);
            Answer::destroy(
                $questionData['answers'][0]['id'],
                $questionData['answers'][1]['id'],
                $questionData['answers'][2]['id'],
                $questionData['answers'][3]['id'],
                $questionData['answers'][4]['id']
            );
            $questionCountOfContent = Question::where('content_id', $questionData['question_content']['id'])->count();
            if ($questionCountOfContent == 1) {
                QuestionContent::destroy($questionData['question_content']['id']);
            }
            $question->delete();
        });
        return redirect('/admin/questions');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\PracticeTest;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use App\Models\Subject;
use App\Models\QuestionSubject;
use App\Models\QuestionContent;
use App\Models\TestSubmission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class TestsController extends Controller
{
    /**
     * Shows choose category order view on test start
     * Takes to pre test start page of test type selected
     * Called in get request
     * @param  string|required $testType
     * @return view
     */

    public function prePracticeTestStart()
    {
        $verbalSubjectQuestions = Subject::where('category', 'verbal')
            ->get()
            ->toArray();

        $mathSubjectQuestions = Subject::where('category', 'math')
            ->get()
            ->toArray();

        return view('practice', compact('verbalSubjectQuestions', 'mathSubjectQuestions'));
    }
    /**
     * Shows choose category order view on test start
     * Takes to pre test start page of test type selected
     * Called in get request
     * @param  string|required $testType
     * @return view
     */

    public function preTestStart($testType)
    {
        $testDetails = array();
        if ($testType == 'mock') {
            return view('tests.mockTestStart', compact('testDetails'));
        } elseif ($testType == 'practice') {
            $verbalSubjectQuestions = Question::groupBy('subject')->where('category', 'verbal')->get()->toArray();
            $mathSubjectQuestions = Question::groupBy('subject')->where('category', 'math')->get()->toArray();
            return view('tests.practiceTestStart', compact('verbalSubjectQuestions', 'mathSubjectQuestions'));
        }
        return Redirect::back()->withErrors(['Test Not started']);
    }
    /**
     * Creates new mock test
     * Gets first question for test
     * @param  array  $request - postdata
     * @param  int $request->categoryOrder 
     * @redirects to test/test_id
     */
    public function firstQuestion(Request $request)
    {
        $validatedData = $request->validate([
            'categoryOrder' => 'required|string'
        ]);
        $requestData = $request->all();
        print('<pre>' . print_r($requestData, true) . '</pre>');
        $mathSections = array('data_sufficiency', 'problem_solving');
        $verbalSections = array('critical_reasoning', 'reading_comprehension', 'sentence_correction');
        $category = 'math';
        $categoryOrder = $requestData['categoryOrder'];
        if (!empty($categoryOrder)) {
            if ($categoryOrder == 'math-verbal') {
                $category = 'math';
                $finalSection = $mathSections[array_rand($mathSections)];
            } else {
                $category = 'verbal';
                $finalSection = $verbalSections[array_rand($verbalSections)];
            }
        }
        $requestData['category'] = $category;
        $requestData['section'] = $finalSection;
        $questionData = $this->getQuestion($requestData);

        $testData = $this->createTest($questionData, $categoryOrder);

        if ($testData) {
            return redirect('/test/mock/' . $testData['id']);
        }
        return Redirect::back()->withErrors(['Test Not created']);
    }

    /**
     * Gets question for test and practice test on the basis of testtype
     * @param  string $testType
     * @param  string $testId
     * @return view
     */

    public function getCurrentQuestionOfTest($testType, $testId)
    {
        $testDetails['testType'] = $testType;
        if ($testType == 'mock') {
            $testData = Test::where('id', $testId)
                ->first()->toArray();
            $testData['number_of_questions'] = 67;
            $questionData = $this->getQuestionById($testData['current_question_id']);

            if ($testData['current_category'] == 'math') {
                $testDetails['timeRemaining'] = $testData['math_time_remaining'];
            } else {
                $testDetails['timeRemaining'] = $testData['verbal_time_remaining'];
            }
            $testDetails['totalNumberOfQuestions'] = 67;
            return view('tests.questionPage', compact('questionData', 'testData', 'testDetails'));
        } elseif ($testType == 'practice') {
            $testData = PracticeTest::where('id', $testId)
                ->first()->toArray();
            $testDetails['timeRemaining'] = $testData['time_remaining'];
            $questionData = $this->getQuestionById($testData['current_question_id']);
            $testDetails['totalNumberOfQuestions'] = $testData['number_of_questions'];
            if ($testData['mode'] == 'practice') {
                return view('tests.practiceQuestionPage', compact('questionData', 'testData', 'testDetails'));
            } else {
                return view('tests.questionPage', compact('questionData', 'testData', 'testDetails'));
            }
        }
    }
    /**
     * Gets question details of a given question id with answer details
     * @param  string $questionId
     * @return array $questionData
     */
    public function getQuestionById($questionId)
    {
        $questionData = Question::with('answers', 'answerKey', 'questionContent')->find($questionId);
        $questionData = $questionData->toArray();
        return $questionData;
    }


    /**
     * Get complete question for the giver parameters.
     * Question also contains all options that can be shown to user
     * @param  int  $current_question_number
     * @param  string  $category - category of the test
     * @param  string  $section - section of quesstion
     * @param  string  $difficulty 
     * @return array $questionData
     */

    public function getQuestion($data)
    {
        $question = Question::where('questions.category', $data['category'])
            ->where('questions.section', $data['section'])
            ->inRandomOrder()
            ->get()
            ->first();

        if ($question) {
            $question = $question->toArray();
            return $question;
        } else {
            return 0;
        }
    }


    /**
     * Called when user clicks on next question or finish test button
     * Called on post request
     * Stores answer submitted by user
     * Gets next question of test and practice test on the basis of testtype
     * Updates test progress
     * @param  array  $request - postdata
     * @param  int $request->question_id
     * @param  int $request->answer_id
     * @param  int $request->current_question_number
     * @param  int $request->category
     * @param  int $request->test_id
     * @param  int $request->category_order
     * @param  string  $testType
     * redirects to /test/$testType/$testId
     */

    public function submitAndNextQuestion(Request $request, $testType)
    {
        $requestData = $request->all();
        if ($testType == 'mock') {
            $validatedData = $request->validate([
                'question_id' => 'required|integer',
                'answer_id' => 'required|integer',
                'current_question_number' => 'required|integer',
                'category' => 'required|string',
                'test_id' => 'required|string',
                'category_order' => 'required|string',
            ]);
            $requestData = $request->all();
            $testId = $requestData['test_id'];
            $this->createTestSubmission($requestData);
            if ($requestData['current_question_number'] == 67) {
                $testData = $this->updateTest(array(), $testId, 'finished');
                return redirect('/dashboard');
            }
            $category = $requestData['category'];
            if ($category == 'math' && $requestData['current_question_number'] == 31 && $requestData['category_order'] == 'math-verbal') {
                $category = 'verbal';
                return redirect('/pause-test/mock/' . $requestData['test_id']);
            } elseif ($category == 'verbal' && $requestData['current_question_number'] == 37 && $requestData['category_order'] == 'verbal-math') {
                $category = 'math';
                return redirect('/pause-test/mock/' . $requestData['test_id']);
            }

            $mathSections = array('data_sufficiency', 'problem_solving');
            $verbalSections = array('critical_reasoning', 'reading_comprehension', 'sentence_correction');
            if ($category  == 'math') {
                $sections = $mathSections;
                $finalSection = $sections[array_rand($sections)];
            } elseif ($category == 'verbal') {
                $sections = $verbalSections;
                $finalSection = $sections[array_rand($sections)];
            }
            $requestData['section'] = $finalSection;
            $questionData = $this->getQuestion($requestData);
            $testData = $this->updateTest($questionData, $testId);

            return redirect('/test/mock/' . $testId);
        } else if ($testType == 'practice') {
            $validatedData = $request->validate([
                'question_id' => 'required|integer',
                'answer_id' => 'required|integer',
                'current_question_number' => 'required|integer',
                'category' => 'required|string',
                'test_id' => 'required|string',
                'test_type' => 'required|string',
            ]);
            $requestData = $request->all();
            $testId = $requestData['test_id'];
            $practicetestData = PracticeTest::where('id', $testId)
                ->first()->toArray();
            if ($practicetestData['mode'] == 'quiz') {
                $requestData['test_type'] = 'quiz';
                $this->createTestSubmission($requestData);
            }
            if ($requestData['current_question_number'] == $practicetestData['number_of_questions']) {
                $testData = $this->updatePracticeTest($testId, $requestData['question_id'], $requestData['current_question_number'], 'finished');
                return redirect('/dashboard');
            }
            $practicetestData['question_type'] = json_decode($practicetestData['question_type']);
            $practicetestData['subjects'] = json_decode($practicetestData['subjects'], true);
            $practicetestData['difficulty'] = json_decode($practicetestData['difficulty']);
            $question = $this->getQuestionForPracticeTest($practicetestData);
            $status = 'ongoing';

            $this->updatePracticeTest($testId, $question['id'], $requestData['current_question_number'] + 1, $status);
            return redirect('/test/practice/' . $testId);
        }
    }

    /**
     * Called on ajax call when someone submits practice test
     * @param  array  $request - postdata
     * @param  int  $request->test_id
     * @param  string  $request->question_id
     * @param  int  $request->current_question_number
     * @param  int  $request->flagged
     * @param  int  $request->test_type
     * @return array $requestData status
     */

    public function submitPracticeTestResponse(Request $request)
    {
        $validatedData = $request->validate([
            'test_id' => 'required|string',
            'question_id' => 'required|integer',
            'answer_id' => 'required|integer',
            'current_question_number' => 'required|integer',
            'current_question_time_spent' => 'required|integer',
            'flagged' => 'nullable|integer',
            'test_type' => 'required|string',

        ]);
        $requestData = $request->all();
        $this->createTestSubmission($requestData);
        $questionData = $this->getQuestionById($requestData['question_id']);
        return $questionData;
    }

    /**
     * Used to create a new test submission
     * Stores answer submitted by user
     * @param  array $data
     * @return void
     */
    public function createTestSubmission($data)
    {
        $testSubmission = new TestSubmission();
        $testSubmission->user_id = auth()->user()->id;
        $testSubmission->test_id = $data['test_id'];
        $testSubmission->question_id = $data['question_id'];
        $testSubmission->answer_id = $data['answer_id'];
        $testSubmission->current_question_number = $data['current_question_number'];
        $testSubmission->time_spent = $data['current_question_time_spent'];
        $testSubmission->flagged = (isset($data['flagged']) ? $data['flagged'] : 0);
        $testSubmission->notes = '';
        $testSubmission->test_type = $data['test_type'];
        $testSubmission->data = json_encode(array());
        $testSubmission->save();
    }

    /**
     * Used to create a new test record on new test start
     * @param  array  $data
     * @param  string  $categoryOrder
     * @return array $testData
     */
    public function createTest($data, $categoryOrder)
    {

        $testId = (string) Str::uuid();
        $test = new Test();
        $test->user_id = auth()->user()->id;
        $test->id = $testId;
        $test->category_order = $categoryOrder;
        $test->current_question_number = 1;
        $test->current_question_time_spent = 0;
        $test->current_category = $data['category'];
        $test->current_section = $data['section'];
        $test->current_question_id = $data['id'];
        $test->section_cr_count = ($data['section'] == 'critical_reasoning' ? 1 : 0);
        $test->section_ds_count = ($data['section'] == 'data_sufficiency' ? 1 : 0);
        $test->section_ps_count = ($data['section'] == 'problem_solving' ? 1 : 0);
        $test->section_rc_count = ($data['section'] == 'reading_comprehension' ? 1 : 0);
        $test->section_sc_count = ($data['section'] == 'sentence_correction' ? 1 : 0);
        $test->status = 'ongoing';
        $test->math_time_remaining = 62 * 60 * 1000; // time in milliseconds
        $test->verbal_time_remaining = 65 * 60 * 1000;
        $test->pause_time_remaining = 2 * 60 * 1000;
        $test->data = json_encode(array());
        $test->save();

        $testId = $test->toArray()['id'];
        $test = Test::find($testId);
        $testData = $test->toArray();
        return $testData;
    }
    /**
     * Updates current test details
     * @param  array  $data
     * @param  int  $testId
     * @param  string  $status
     * @return array $testData
     */

    public function updateTest($data, $testId, $status = 'ongoing')
    {
        $test = Test::find($testId);
        if ($status != 'ongoing') {
            $test->status = $status;
            $test->save();
        } else {
            $test->current_category = $data['category'];
            $test->current_question_number = $test->current_question_number + 1;
            $test->current_question_time_spent = 0;
            $test->current_section = $data['section'];
            $test->current_question_id = $data['id'];
            $test->status = 'ongoing';
        }
        if (isset($data['section'])) {
            $test->section_cr_count = ($data['section'] == 'critical_reasoning' ? $test->section_cr_count + 1 : $test->section_cr_count);
            $test->section_ds_count = ($data['section'] == 'data_sufficiency' ?  $test->section_ds_count + 1 : $test->section_ds_count);
            $test->section_ps_count = ($data['section'] == 'problem_solving' ?  $test->section_ps_count + 1 : $test->section_ps_count);
            $test->section_rc_count = ($data['section'] == 'reading_comprehension' ? $test->section_rc_count + 1 : $test->section_rc_count);
            $test->section_sc_count = ($data['section'] == 'sentence_correction' ?  $test->section_sc_count + 1 : $test->section_sc_count);
        }

        $test->save();
        $testData = $test->toArray();
        return $testData;
    }
    /**
     * Called on first category time expiratoin or first category completion of testType mock
     * Or on test completion of test type practice test
     * Updates test details
     * @param string $testType 
     * @param string $testId 
     * @return view
     * 
     */
    public function goToPause($testType, $testId)
    {
        if ($testType == 'mock') {
            $testData = DB::table('tests')
                ->where('id', $testId)
                ->first();
            if ($testData->status != 'paused') {
                $testDataUpdated = $this->updateTest(array(), $testData->id, 'paused');
            }
            $categoryOrderSplit = explode('-', $testData->category_order);
            if ($categoryOrderSplit[1] == $testData->current_category) {
                return redirect('/dashboard');
            }
            return view('tests.pausePage', compact('testData'));
        } else if ($testType == 'practice') {
            return redirect('/dashboard');
        }
    }
    /**
     * Called on unpausing the test
     * Resumes the test and starts with new category
     * Gets new question of new category
     * Updates test details
     * @param string $testId 
     * redirects to test/testId
     */
    public function goToUnPause($testId)
    {
        $testData = Test::find($testId);
        $testData = $testData->toArray();
        $mathSections = array('data_sufficiency', 'problem_solving');
        $verbalSections = array('critical_reasoning', 'reading_comprehension', 'sentence_correction');

        if ($testData['current_category'] == 'math') {
            $category = 'verbal';
            $finalSection = $verbalSections[array_rand($verbalSections)];
        } else {
            $category = 'math';
            $finalSection = $mathSections[array_rand($mathSections)];
        }

        $testData['category'] = $category;
        $testData['section'] = $finalSection;
        $questionData = $this->getQuestion($testData);
        $testDataUpdated = $this->updateTest($questionData, $testData['id']);
        return redirect('/test/mock/' . $testId);
    }

    /**
     * Called every second on ajax call to update timers of test
     * Updates remaining time of both test types (mock and practice)
     * @param  array  $request - postdata
     * @param  int  $request->test_id
     * @param  string  $request->category - category of test
     * @param  int  $request->time_remaining - time remaining on test
     * @return array $requestData status
     */

    function updateTestTimer(Request $request, $testType)
    {
        if ($testType == 'mock') {
            $validatedData = $request->validate([
                'test_id' => 'required|string',
                'category' => 'required|string',
                'time_remaining' => 'required|integer',
                'current_question_time_spent' => 'required|integer'
            ]);
            $requestData = $request->all();
            $testId = $requestData['test_id'];
            $test = Test::find($testId);
            if ($requestData['category'] == 'math') {
                $test->math_time_remaining = $requestData['time_remaining'];
            } elseif ($requestData['category'] == 'verbal') {
                $test->verbal_time_remaining = $requestData['time_remaining'];
            } elseif ($requestData['category'] == 'pause') {
                $test->pause_time_remaining = $requestData['time_remaining'];
            }
            $test->current_question_time_spent = $requestData['current_question_time_spent'];
            $test->save();
            $requestData['status'] = 'success';
            return $requestData;
        } else if ($testType == 'practice') {
            $validatedData = $request->validate([
                'test_id' => 'required|string',
                'category' => 'required|string',
                'time_remaining' => 'required|integer'
            ]);
            $requestData = $request->all();
            $testId = $requestData['test_id'];
            $test = PracticeTest::find($testId);
            $test->time_remaining = $requestData['time_remaining'];
            $test->current_question_time_spent = $requestData['current_question_time_spent'];
            $test->save();
            $requestData['status'] = 'success';
            return $requestData;
        }
    }

    /**
     * Called on Practice test start
     * Gets first question for test
     * @param  array  $request - postdata
     * @param  int $request->category
     * @param  array $request->question_type 
     * @param  array $request->subjects 
     * @param  array $request->difficulty 
     * @param  array $request->question_pool 
     * @param  int $request->number_of_questions 
     * @param  int $request->time_limit 
     * @param  string $request->mode 
     * @redirects to /test/practice/$testId
     */
    public function firstPracticeQuestion(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required|string',
            'question_type.*' => 'required|string',
            'subjects.*' => 'string|distinct|nullable',
            'difficulty.*' => 'required|string|distinct',
            'question_pool' => 'required|string',
            'number_of_questions' => 'required|integer',
            'time_limit' => 'required|integer',
            'mode' => 'required|string',

        ]);
        $requestData = $request->all();
        if (in_array("all_verbal", $requestData['question_type'])) {
            $requestData['question_type'] = array('critical_reasoning', 'reading_comprehension', 'sentence_correction');
        }
        if (in_array("all_quant", $requestData['question_type'])) {
            $requestData['question_type'] = array('data_sufficiency', 'problem_solving');
        }
        $question = $this->getQuestionForPracticeTest($requestData);
        if (!$question) {
            return Redirect::back()->withErrors(['No more Questions']);
        }
        $testData = $this->createPracticeTest($requestData, $question);
        return redirect('/test/practice/' . $testData['id']);
    }
    /**
     * Gets question for practice test according to the parameters given
     * Excludes and includes the questions required accordingly
     * @param  array  $data
     * @return to $question
     */

    public function getQuestionForPracticeTest($data)
    {
        $allTestSubmissions = User::find(auth()->user()->id)->testSubmissions()->get()->toArray();
        $excludedQuestionIds = array();
        $includedQuestionIds = array();
        if ($data['question_pool'] == 'unanswered') {
            $answeredQuestionIds = array_column($allTestSubmissions, 'question_id');
            $excludedQuestionIds = $answeredQuestionIds;
        } else if ($data['question_pool'] == 'answered_and_unanswered') {
            $excludedQuestionIds = array();
        } else if ($data['question_pool'] == 'incorrect') {
            $j = 0;
            foreach ($allTestSubmissions as $key => $testSubmission) {
                $questionsAnswerKey = Question::find($testSubmission['question_id'])->answerKey()->first()->toArray();
                if ($testSubmission['answer_id'] != $questionsAnswerKey['answer_id']) {
                    $incorrectQuestionIds[$j++] = $testSubmission['question_id'];
                }
            }
            $includedQuestionIds = $incorrectQuestionIds;
        } else if ($data['question_pool'] == 'flagged') {
            $k = 0;
            foreach ($allTestSubmissions as $key => $testSubmission) {
                $questionsAnswerKey = Question::find($testSubmission['question_id'])->answerKey()->first()->toArray();
                if ($testSubmission['flagged']) {
                    $flaggedQuestionIds[$k++] = $testSubmission['question_id'];
                }
            }
            $includedQuestionIds = $flaggedQuestionIds;
        }
        // exclude question ids that have been answered in the current test
        if (isset($data['id'])) {
            $currentTestSubmissions = TestSubmission::where('test_id', $data['id'])->get()->toArray();
            $answeredQuestionIdsOfCurrentTest = array_column($currentTestSubmissions, 'question_id');
            $excludedQuestionIds = array_merge($excludedQuestionIds, $answeredQuestionIdsOfCurrentTest);
        }

        $question = Question::leftJoin('question_subjects', function ($join) {
            $join->on('questions.id', '=', 'question_subjects.question_id');
        })->Join('subjects', function ($join) {
            $join->on('question_subjects.subject_id', '=', 'subjects.id');
        })->whereIn('subjects.name', $data['subjects']);
        //because when $includedQuestionIds is empty, the query will return null value
        if (!empty($includedQuestionIds)) {
            $question = $question->whereIn('questions.id', $includedQuestionIds);
        }
        $question = $question->whereNotIn('questions.id', $excludedQuestionIds)
            ->whereIn('questions.difficulty', $data['difficulty'])
            ->where('questions.category', $data['category'])
            ->inRandomOrder()
            ->get()
            ->first();
        if ($question) {
            $question = $question->toArray();
            return $question;
        } else {
            return 0;
        }
    }

    /**
     * Used to create a new test record on new practice test on start
     * @param  array  $data
     * @param  array  $question
     * @return array $testData
     */
    public function createPracticeTest($data, $question)
    {

        $testId = (string) Str::uuid();
        $test = new PracticeTest();
        $test->user_id = auth()->user()->id;
        $test->id = $testId;
        $test->category = $data['category'];
        $test->question_type = json_encode($data['question_type']);
        $test->subjects = json_encode($data['subjects']);
        $test->difficulty = json_encode($data['difficulty']);
        $test->question_pool = $data['question_pool'];
        $test->number_of_questions = $data['number_of_questions'];
        $test->time_limit = $data['time_limit'] * 60 * 1000; // time in milliseconds
        $test->mode = $data['mode'];
        $test->current_question_number = 1;
        $test->current_question_time_spent = 0;
        $test->status = 'ongoing';
        $test->time_remaining = $data['time_limit'] * 60 * 1000; // time in milliseconds
        $test->current_question_id = $question['question_id'];
        $test->data = json_encode(array());
        $test->save();
        $testData = $test->toArray();

        return $testData;
    }

    /**
     * Updates Practice test details
     * @param  string  $testId
     * @param  int  $questionId
     * @param  int  $current_question_number
     * @param  string  $status
     * @return array $testData
     */
    public function updatePracticeTest($testId, $questionId, $current_question_number, $status = 'ongoing')
    {
        $test = PracticeTest::find($testId);
        $test->status = $status;
        $test->current_question_id = $questionId;
        $test->current_question_number = $current_question_number;
        $test->current_question_time_spent = 0;
        $test->save();
        $testData = $test->toArray();
        return $testData;
    }
    /**
     * Ends test forcefully in the middle of the test
     * @param  array  $testType
     * @param  int  $testId
     * @redirects to /dashboard
     */

    public function endTest($testType, $testId)
    {
        if ($testType == 'practice') {
            $test = PracticeTest::find($testId);
            $test->status = 'ended';
            $test->save();
            return redirect('/dashboard');
        } else if ($testType == 'mock') {
            $test = Test::find($testId);
            $test->status = 'ended';
            $test->save();
            return redirect('/dashboard');
        }
    }
    /**
     * Updates test's status to paused
     * @param  array  $testType
     * @param  int  $testId
     * @redirects to /dashboard
     */

    public function pauseTest($testType, $testId)
    {
        if ($testType == 'practice') {
            $test = PracticeTest::find($testId);
            $test->status = 'paused';
            $test->save();
        } else if ($testType == 'mock') {
            $test = Test::find($testId);
            $test->status = 'paused';
            $test->save();
        }
    }
}

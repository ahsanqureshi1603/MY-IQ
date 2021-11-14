<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Question') }}
        </h2>
    </x-slot>
    <div class="add_question_container">
        <form action="/admin/edit-question/{{$questionData['id']}}" class="inline-block">


            <div class="head-option-container">
                <div class="head-options">
                    <label for="question[category]">Category</label>
                    <select name="question[category]" id="question[category]" data-select="category" class="select-drop">
                        <option value="math" @if($questionData['category']=='math' ) selected @endif>Math</option>
                        <option value="verbal" @if($questionData['category']=='verbal' ) selected @endif>Verbal</option>
                    </select>
                </div>

                <div class="head-options">
                    <label for="question[section]">Section</label>
                    <select name="question[section]" data-select="section" class="select-drop">
                        <option value="data_sufficiency" @if($questionData['section']=='data_sufficiency' ) selected @endif>data_sufficiency</option>
                        <option value="problem_solving" @if($questionData['section']=='problem_solving' ) selected @endif>problem_solving</option>
                        <option value="critical_reasoning" data-notshow="math" @if($questionData['section']=='critical_reasoning' ) selected @endif>critical_reasoning</option>
                        <option value="reading_comprehension" data-notshow="math" @if($questionData['section']=='reading_comprehension' ) selected @endif>reading_comprehension</option>
                        <option value="sentence_correction" data-notshow="math" @if($questionData['section']=='sentence_correction' ) selected @endif>sentence_correction</option>
                    </select>
                </div>

                <div class="head-options">
                    <label for="question[difficulty]">Difficulty</label>
                    <select name="question[difficulty]" id="question[difficulty]" data-select="difficulty" class="select-drop">
                        <option value="Easy" @if($questionData['difficulty']=='Easy' ) selected @endif>Easy</option>
                        <option value="Medium" @if($questionData['difficulty']=='Medium' ) selected @endif>Medium</option>
                        <option value="Hard" @if($questionData['difficulty']=='Hard' ) selected @endif>Hard</option>
                        <option value="Very Hard" @if($questionData['difficulty']=='Very Hard' ) selected @endif>Very Hard</option>
                    </select>
                </div>
            </div>
            <div class="d-flex" style="margin-top: 2rem">
                <h6 class="main-heads">Subjects :</h6>
                <div class="subj-container">
                    <p>Verbal Subjects</p>
                    <div class="js-verbal-subs d-block">
                        <div class="subj-radio">
                            @foreach($verbalSubjects as $verbalSubject)
                            @php
                            $checked=0;
                            foreach ($questionData['question_subject'] as $key => $value){
                            if (in_array($verbalSubject['id'], $value)){
                            $checked=1;
                            break;
                            }
                            }
                            @endphp
                            <div class="radio-row">
                                <input type="checkbox" name="subjects[{{$verbalSubject['id']}}]" id="{{$verbalSubject['name']}}" value="{{$verbalSubject['name']}}"  @if($checked) checked @endif>
                                <label for="{{$verbalSubject['name']}}" class="mb-0 pl-2 radio-row-label"> {{$verbalSubject['name']}}</label><br>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <p>Math Subjects</p>
                    <div class="js-math-subs d-block">
                        <div class="subj-radio">
                            @foreach($mathSubjects as $mathSubject)
                            @php
                            $checked=0;
                            foreach ($questionData['question_subject'] as $key => $value){
                            if (in_array($mathSubject['id'], $value)){
                            $checked=1;
                            break;
                            }
                            }
                            @endphp
                            <div class="radio-row">
                                <input type="checkbox" name="subjects[{{$mathSubject['id']}}]" id="{{$mathSubject['name']}}" value="{{$mathSubject['name']}}" @if($checked) checked @endif>
                                <label for="{{$mathSubject['name']}}" class="mb-0 pl-2 radio-row-label"> {{$mathSubject['name']}}</label><br>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <p>Add New Subject</p>
            <label for="question[new_subject]">New Subject</label>
            <input type="text" name="new_subject">

            <br><br>


            <div class="editor-content-container">
                <label for="question_content[content]" class="main-label-heading">Question Content</label>
                <div id="MathPreview-0" class="preview-1 MathPreview"></div>
                <div class="editor-container">
                    <textarea name="question_content[content]" class="text-editor " id="question-content" placeholder='Enter your question'> {{$questionData['question_content']['content']}} </textarea>
                </div>
                <input type="button" value="Preview" class="renderBtn" style="float: right; font-size: initial; margin-top: .5em">
            </div>

            <div class="ques-extra-container">
                <label for="question[question_extra]">Question Extra</label>
                <input type="text" name="question[question_extra]" value="{{$questionData['question_extra']}}">
            </div>


            <p class="answer-question-heading">Answer Options</p>

            @foreach($questionData['answers'] as $key=>$value)

            <div class="editor-content-container">
                <div class="op-container">
                    <input type="radio" name="answer_key[key]" value="{{$key}}" @if($questionData['answer_key']['answer_id']==$value['id']) checked @endif>
                    <label for="answer[options][{{$key}}]">Option {{$key+1}}</label>
                </div>
                {{-- <input type="text" name="answer[options][0]" value="Option 1"><br><br> --}}
                <div id="MathPreview-{{$key + 1}}" class="preview-{{$key + 1}} MathPreview"></div>
                <div class="editor-container">
                    <textarea name="answer[options][{{$key}}]" class="option-editor" id="option-editor-{{$key + 1}}">{{$value['answer']}}</textarea>
                </div>

                <input type="button" value="Preview" class="renderBtn" style="float: right; font-size: initial; margin-top: .5em">

            </div>




            @endforeach

            {{-- <p>Answer Key</p>
        @foreach($questionData['answers'] as $key=>$value)
        <input type="radio" name="answer_key[key]" value="{{$key}}" @if($questionData['answer_key']['answer_id']==$value['id']) checked @endif>
            <label for="{{$key}}">Option {{$key +1 }}</label><br>
            @endforeach --}}

            <div class="editor-content-container">
                <div class="op-container">
                    <label for="answer_key[explanation_text]" class="explanation-text">Explanation Text</label>
                </div>

                <div id="MathPreview-extra" class="preview-extra MathPreview"></div>
                <div class="editor-container">
                    <textarea name="answer_key[explanation_text]" class="option-editor" id="explanation-editor" placeholder='Explanation text'> {{$questionData['answer_key']['explanation_text']}} </textarea>
                </div>

                <input type="button" value="Preview" class="renderBtn" style="float: right; font-size: initial; margin-top: .5em">
            </div>

            <div class="ques-extra-container">
                <label for="answer_key[explanation_video]">Explanation Video</label>
                <input type="text" name="answer_key[explanation_video]" value="{{$questionData['answer_key']['explanation_video']}}" style="margin-bottom: 20px">

            </div>

            <button type="submit" class="text-sm bg-blue-500 hover:bg-blue-700 my-2 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" name="update" formmethod="POST">Update</button>

            {{ csrf_field() }}
        </form>
        <form action="/admin/delete-question/{{$questionData['id']}}" class="inline-block">
            <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
            {{ csrf_field() }}
        </form>
    </div>
</x-app-layout>
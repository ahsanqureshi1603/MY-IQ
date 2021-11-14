<form action="/start-practice-test" method="POST">

<div class="upper-half">
    <h1 class="practice">Practice</h1>
    <div class="d-flex">
        <label for="category-1" class="checkbox-label js-quant-cat">
            <input class="checkbox-row-input js-quant-cat-input js-cat-inputs" type="radio" id="category-1" name="category" value="math" style="">
            <div class="js-test-type js-quant-test-type test-type">
                <img src="{{ asset('images/dashboard/quant.svg') }}" class="test-type-img" alt="">
                <h5 class="test-type-head">Quantitative <br>Reasoning</h5>
            </div>
        </label>

        <label for="category-2" class="checkbox-label js-verbal-cat">
            <input class="checkbox-row-input js-verbal-cat-input js-cat-inputs" type="radio" id="category-2" name="category" value="verbal" style="" checked>
            <div class="js-test-type js-verbal-test-type test-type selected-test-type mx-4">
                <img src="{{ asset('images/dashboard/verbal.svg') }}" class="test-type-img" alt="">
                <h5 class="test-type-head">Verbal <br>Reasoning</h5>
            </div>
        </label>

            {{-- <label for="category-3" class="checkbox-label">
            <input class="checkbox-row-input" type="radio" id="category-3" name="integrated_reasoning" value="integrated_reasoning" style="">
            <div class="js-test-type test-type">
                <img src="{{ asset('images/dashboard/IR.svg') }}" class="test-type-img" alt="">
            <h5 class="test-type-head">Integrated <br>Reasoning</h5>
        </div>
        </label> --}}

    </div>
    </div>

    <div class="lower-half">
        <div class="dashboard-practice-option d-flex align-items-center mt-3" data-category="questionType">
            <h6 class="main-heads">Question Type : </h6>
            <div class="inline-flex align-items-center">
                <div class="js-option-container js-verbal-ques d-block" data-cat="verbal">
                    <label for="ques-1" class="checkbox-label">
                        <input class="checkbox-row-input abc" type="checkbox" id="ques-1" name="question_type[]" value="all_verbal" style="" >
                        <div class="js-opt-btn js-opt-btn-ques opt-btn unselected-opt-btn js-opt-btn-ques-first js-default-option js-default-option-verbal mr-2">All Verbal
                        </div>
                    </label>

                    <label for="ques-2" class="checkbox-label">
                        <input class="checkbox-row-input" type="checkbox" id="ques-2" name="question_type[]" value="sentence_correction" style="">
                        <div class="js-opt-btn js-opt-btn-ques opt-btn unselected-opt-btn mr-2">Sentence Correction</div>
                    </label>

                    <label for="ques-3" class="checkbox-label">
                        <input class="checkbox-row-input" type="checkbox" id="ques-3" name="question_type[]" value="critical_reasoning" style="">
                        <div class="js-opt-btn js-opt-btn-ques opt-btn unselected-opt-btn mr-2">Critical Reasoning</div>
                    </label>

                    <label for="ques-4" class="checkbox-label">
                        <input class="checkbox-row-input" type="checkbox" id="ques-4" name="question_type[]" value="reading_comprehension" style="">
                        <div class="js-opt-btn js-opt-btn-ques opt-btn unselected-opt-btn mr-2">Reading Comprehension</div>
                    </label>
                </div>

                <div class="js-option-container js-math-ques d-none" data-cat="quant">
                    <label for="ques-5" class="checkbox-label">
                        <input class="checkbox-row-input def" type="checkbox" id="ques-5" name="question_type[]" value="all_quant" style="">
                        <div class="js-opt-btn js-opt-btn-ques opt-btn unselected-opt-btn js-opt-btn-ques-first js-default-option js-default-option-quant mr-2">All Quant</div>
                    </label>

                    <label for="ques-6" class="checkbox-label">
                        <input class="checkbox-row-input" type="checkbox" id="ques-6" name="question_type[]" value="data_sufficiency" style="">
                        <div class="js-opt-btn js-opt-btn-ques opt-btn unselected-opt-btn mr-2">Data Sufficiency</div>
                    </label>

                    <label for="ques-7" class="checkbox-label">
                        <input class="checkbox-row-input" type="checkbox" id="ques-7" name="question_type[]" value="problem_solving" style="">
                        <div class="js-opt-btn js-opt-btn-ques opt-btn unselected-opt-btn mr-2">Problem Solving</div>
                    </label>
                </div>
            </div>
        </div>


        <div class="dashboard-practice-option d-flex" style="margin-top: 2rem" data-category="deSelectSubjects">
            <h6 class="main-heads">Subjects :</h6>
            <div class="subj-container">
                <div class="d-flex align-items-center mb-2">
                    <h6 class="clear-sel-all" id="js-clear-all">Clear All</h6>
                    <div class="divider">|</div>
                    <h6 class="clear-sel-all" id="js-sel-all">Select All</h6>
                </div>

                {{-- <p>Verbal Subjects</p>
                <input type="checkbox" name="subjects[]" value="all_verbal">
                <label for="all_verbal"> All Verbal</label><br> --}}
                <div class="subject-option-container js-verbal-subs d-block">
                    <div class="subj-radio">
                        @foreach($verbalSubjectQuestions as $verbalSubjectQuestion)
                        <div class="radio-row">
                            <input type="checkbox" name="subjects[{{$verbalSubjectQuestion['id']}}]" id="{{$verbalSubjectQuestion['name']}}" data-subjects="subjects" value="{{$verbalSubjectQuestion['name']}}" checked>
                            <label for="{{$verbalSubjectQuestion['name']}}" class="mb-0 pl-2 radio-row-label"> {{$verbalSubjectQuestion['name']}}</label><br>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- <p>Math Subjects</p>
                <input type="checkbox" name="subjects[]" value="all_quant">
                <label for="all"> All Quant</label><br> --}}

                <div class="subject-option-container js-quant-subs d-none">
                    <div class="subj-radio">
                        @foreach($mathSubjectQuestions as $mathSubjectQuestion)
                        <div class="radio-row">
                            <input type="checkbox" name="subjects[{{$mathSubjectQuestion['id']}}]" id="{{$mathSubjectQuestion['name']}}" data-subjects="subjects" value="{{$mathSubjectQuestion['name']}}" checked>
                            <label for="{{$mathSubjectQuestion['name']}}" class="mb-0 pl-2 radio-row-label"> {{$mathSubjectQuestion['name']}}</label><br>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-practice-option d-flex align-items-center mt-5" data-category="difficulty">
            <h6 class="main-heads">Difficulty :</h6>
            <div class="js-option-container inline-flex align-items-center">
                <label for="diff-2" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="diff-2" name="difficulty[]" value="Easy" style="">
                    <div class="js-opt-btn js-opt-btn-diff  opt-btn unselected-opt-btn mr-1">Easy</div>
                </label>
                <label for="diff-3" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="diff-3" name="difficulty[]" value="Medium" style="">
                    <div class="js-opt-btn js-opt-btn-diff  opt-btn unselected-opt-btn mr-1 js-default-option">Medium</div>
                </label>
                <label for="diff-4" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="diff-4" name="difficulty[]" value="Hard" style="">
                    <div class="js-opt-btn js-opt-btn-diff  opt-btn unselected-opt-btn mr-1">Hard</div>
                </label>
                <label for="diff-5" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="diff-5" name="difficulty[]" value="Very Hard" style="">
                    <div class="js-opt-btn js-opt-btn-diff opt-btn unselected-opt-btn mr-1">Very Hard</div>
                </label>
            </div>
        </div>

        <div class="dashboard-practice-option d-flex align-items-center " style="margin-top: 2rem" data-category="questionPool">
            <h6 class="main-heads">Question Pool :</h6>
            <div class="js-option-container inline-flex align-items-center">
                <label for="q_pool-1" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="q_pool-1" name="question_pool" value="unanswered" style="" >
                    <div class="js-opt-btn js-opt-btn-q_pool opt-btn unselected-opt-btn mr-2">Unanswered</div>
                </label>
                <label for="q_pool-2" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="q_pool-2" name="question_pool" value="answered_and_unanswered" style="">
                    <div class="js-opt-btn js-opt-btn-q_pool opt-btn unselected-opt-btn mr-2 js-default-option">Answered and Unanswered</div>
                </label>
                <label for="q_pool-3" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="q_pool-3" name="question_pool" value="incorrect" style="">
                    <div class="js-opt-btn js-opt-btn-q_pool opt-btn unselected-opt-btn mr-2">Incorrect</div>
                </label>
                {{-- <label for="q_pool-4" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="q_pool-4" name="question_pool" value="flagged" style="">
                    <div class="js-opt-btn js-opt-btn-q_pool opt-btn unselected-opt-btn mr-2">Flagged</div>
                </label> --}}
            </div>
        </div>

        <div class="dashboard-practice-option d-flex align-items-center" style="margin-top: 2rem" data-category="noOfQuestion">
            <h6 class="main-heads">Number of<br> Questions :</h6>
            <div class="js-option-container inline-flex align-items-center">
                <label for="ques_no_1" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="ques_no_1" name="number_of_questions" value="5" style="" >
                    <div class="js-opt-btn js-opt-btn-no-of-ques opt-btn unselected-opt-btn mr-2">5</div>
                </label>
                <label for="ques_no_2" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="ques_no_2" name="number_of_questions" value="10" style="">
                    <div class="js-opt-btn js-opt-btn-no-of-ques opt-btn unselected-opt-btn mr-2 js-default-option">10</div>
                </label>
                <label for="ques_no_3" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="ques_no_3" name="number_of_questions" value="15" style="">
                    <div class="js-opt-btn js-opt-btn-no-of-ques opt-btn unselected-opt-btn mr-2">15</div>
                </label>
                <label for="ques_no_4" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="ques_no_4" name="number_of_questions" value="36" style="">
                    <div class="js-opt-btn js-opt-btn-no-of-ques opt-btn unselected-opt-btn mr-2">36</div>
                </label>
                <label for="ques_no_5" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="ques_no_5" name="number_of_questions" value="Unlimited" style="">
                    <div class="js-opt-btn js-opt-btn-no-of-ques opt-btn unselected-opt-btn">Unlimited</div>
                </label>
                <div class="OR">OR</div>
                <input class="form-check-input practice-input js-practice-input js-enter-ques" type="number" name="" id="" value="">
                <div class="plain-text ml-0">question</div>
            </div>
        </div>

        <div class="dashboard-practice-option d-flex align-items-center" style="margin-top: 2rem" data-category="timeLimit">
            <h6 class="main-heads">Time Limit :</h6>
            <div class="js-option-container inline-flex align-items-center">
                <label for="t-limit-1" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="t-limit-1" name="time_limit" value="10" style="" >
                    <div class="js-opt-btn js-opt-btn-limit opt-btn unselected-opt-btn mr-2 js-default-option">10</div>
                </label>
                <label for="t-limit-2" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="t-limit-2" name="time_limit" value="20" style="">
                    <div class="js-opt-btn js-opt-btn-limit opt-btn unselected-opt-btn mr-2">20</div>
                </label>
                <label for="t-limit-3" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="t-limit-3" name="time_limit" value="30" style="">
                    <div class="js-opt-btn js-opt-btn-limit opt-btn unselected-opt-btn mr-2">30</div>
                </label>
                <label for="t-limit-4" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="t-limit-4" name="time_limit" value="65" style="">
                    <div class="js-opt-btn js-opt-btn-limit opt-btn unselected-opt-btn mr-2">65</div>
                </label>
                <label for="t-limit-5" class="checkbox-label">
                    <input class="checkbox-row-input" type="radio" id="t-limit-5" name="time_limit" value="Unlimited" style="">
                    <div class="js-opt-btn js-opt-btn-limit opt-btn unselected-opt-btn">Unlimited</div>
                </label>

                <div class="OR">OR</div>
                <input class="form-check-input practice-input js-practice-input js-enter-min" type="number" name="" value="">
                <div class="plain-text ml-0">minutes</div>
            </div>
        </div>

        <div class="d-flex mt-5">
            <h6 class="main-heads">Mode :</h6>
            <div class="mode-sel-container">
                <div class="d-flex align-items-center">
                    <input class="form-check-input practice-radio" type="radio" name="mode" id="exampleRadios1" value="practice" checked>
                    <label class="form-check-label practice-label d-block" for="exampleRadios1">
                        Practice Mode (show explanations after each question)
                    </label>
                </div>

                <div class="d-flex align-items-center">
                    <input class="form-check-input practice-radio" type="radio" name="mode" id="exampleRadios2" value="quiz">
                    <label class="form-check-label practice-label d-block" for="exampleRadios2">
                        Quiz Mode (hide explanations until the end)
                    </label>
                </div>
            </div>
        </div>

        <input type="submit" value="Start Session" class="start-session-btn" formmethod="POST">
        {{-- <div class="start-session-btn">Start Session</div> --}}
        <h6 class="plain-text" id="will-have-questions">Your session will have <span id="no_of_questions">5</span> questions.</h6>
        {{ csrf_field() }}
    </div>
</form>
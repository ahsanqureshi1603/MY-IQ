<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard ') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" type="" href="{{ asset('css/main_test.css') }}">
    <form action="/next-question/{{$testDetails['testType']}}" class="inline-block">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 700px; margin:5.75rem auto;">
                <div class="modal-content help-modal-content">
                    <div class="modal-header ques-modal-header">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/test/information.svg') }}" width="16px" height="16px" class="white-img">
                            <h5 class="modal-title text-white ml-2 font-weight-light" id="exampleModalLabel">Help</h5>
                        </div>
                        <button type="button" class="close help-modal--header-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding:1rem 0.6rem 0.7rem">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item  nav-link modal-nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Quantitative</a>
                                <a class="nav-item  nav-link modal-nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Quantitative : PS</a>
                                <a class="nav-item  nav-link modal-nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Quantitative : DS</a>
                            </div>
                        </nav>
                        <div class="tab-content modal-tab-content" id="nav-tabContent">

                            <div class="modal-tab-pane tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <strong class="modal-nav-link-subHead">Data Sufficieny</strong>

                                Each data sufficiency problem consists of a question and two statements, labeled (1) and (2),
                                which contain certain data. Using these data and your knowledge of mathematics and everday
                                facts (such as the number of days in July or the meaning of the word counterclockwise), decide
                                whether the data given are sufficient for answering the question and then select one of the
                                following answer choices:

                                Statement (1) ALONE is sufficient, but statement (2) alone is not sufficient to answer the
                                question asked.
                                Statement (2) ALONE is sufficient, but statement (1) alone is not sufficient to answer the
                                question asked.
                                EACH statement ALONE is sufficient to answer the question asked.
                                Statements (1) and (2) TOGETHER are NOT sufficient to answer the question asked, and
                                additional data specific to the problem are needed.

                                Note: In data sufficiency problems that ask for the value of a quantity, the data given in the
                                statement are sufficient only when it is possible to determine exactly one numerical value for
                            </div>
                            <div class="modal-tab-pane tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <strong class="modal-nav-link-subHead">Data Sufficieny</strong>
                                Each data sufficiency problem consists of a question and two statements, labeled (1) and (2),
                                which contain certain data. Using these data and your knowledge of mathematics and everday
                                facts (such as the number of days in July or the meaning of the word counterclockwise), decide
                                whether the data given are sufficient for answering the question and then select one of the
                                following answer choices:

                                Statement (1) ALONE is sufficient, but statement (2) alone is not sufficient to answer the
                                question asked.
                                Statement (2) ALONE is sufficient, but statement (1) alone is not sufficient to answer the
                                question asked.
                                EACH statement ALONE is sufficient to answer the question asked.
                                Statements (1) and (2) TOGETHER are NOT sufficient to answer the question asked, and
                                additional data specific to the problem are needed.

                                Note: In data sufficiency problems that ask for the value of a quantity, the data given in the
                                statement are sufficient only when it is possible to determine exactly one numerical value for

                                sadsad sad sa ds d a sd sa
                                sada sd
                            </div>
                            <div class="modal-tab-pane tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <strong class="modal-nav-link-subHead">Data Sufficieny</strong>

                                Each data sufficiency problem consists of a question and two statements, labeled (1) and (2),
                                which contain certain data. Using these data and your knowledge of mathematics and everday
                                facts (such as the number of days in July or the meaning of the word counterclockwise), decide
                                whether the data given are sufficient for answering the question and then select one of the
                                following answer choices:

                                Statement (1) ALONE is sufficient, but statement (2) alone is not sufficient to answer the
                                question asked.
                                Statement (2) ALONE is sufficient, but statement (1) alone is not sufficient to answer the
                                question asked.
                                EACH statement ALONE is sufficient to answer the question asked.
                                Statements (1) and (2) TOGETHER are NOT sufficient to answer the question asked, and
                                additional data specific to the problem are needed.

                                Note: In data sufficiency problems that ask for the value of a quantity, the data given in the
                                statement are sufficient only when it is possible to determine exactly one numerical value for
                            </div>
                        </div>
                        {{-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"></a>
                            </li>
                          </ul>
                          <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                        </div> --}}
                    </div>
                    <div class="modal-footer help-modal-footer">
                        <button class="close close-btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="close-btn--cross">&times;</span>
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End-->
        <div class="comb">
            <div class="main practice-question-container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="main-head">GMAT TEST </div>
                    <img src="{{ asset('images/test/logo_white.png') }}" width="220px" height="10px" class="">
                    <div class="text-right">
                        <div class="d-flex">
                            <img src="{{ asset('images/test/time.svg') }}" width="18px" height="18px" class="" style="margin-bottom: 0.1rem;">
                            <div class="time_remaining">Time Remaining <div id="time-remaining-div" class="ml-2"></div>
                            </div>
                        </div>
                        <div class="ques_out_of" data-curr="{{$testData['current_question_number']}}" data-total="{{$testData['number_of_questions']}}">{{$testData['current_question_number']}} of {{$testData['number_of_questions']}}</div>
                    </div>
                </div>
                <div class="ques-container">
                    <div class="section-tab">
                        <div>Section {{$questionData['category']}}</div>
                        <div class="d-flex align-items-center">
                            {{-- <div class="d-flex align-items-center pr-2" style="border-right: 1px solid #87a1cb;"><img src="{{ asset('images/test/flag.svg') }}" class="section-tab-img"> Flag for Review</div> --}}
                        <label for="flagged" class="flag-checkbox-label">
                            <input class="flag-checkbox-input" type="checkbox" id="flagged" name="flagged" value="0">
                            <div class="d-flex align-items-center pr-2 js-toggle-flag" style="border-right: 1px solid #87a1cb;"><img src="{{ asset('images/test/flag.svg') }}" class="section-tab-img flag-unselected"> Flag for Review</div>
                        </label>
                        <div class="d-flex align-items-center cursor-pointer"><img src="{{ asset('images/test/white_board.svg') }}" class="section-tab-img"> Whiteboard</div>
                    </div>
                </div>
                @if($questionData['section']=='reading_comprehension')
                <div class="question_split">
                    <div class="question_split-left">
                        <div class="question">
                            <div class="ques-left">
                                <div class="ques-left">{!! $questionData['question_content']['content'] !!} </div>
                            </div>
                        </div>

                    </div>

                    <div>
                        <div class="question">
                            <div class=""> {!! $questionData['question_extra'] !!} </div>
                        </div>
                        @foreach($questionData['answers'] as $key=>$answer)
                        <div class="option-cont">
                            <input class="checkbox-row-input" type="radio" id="opt-{{$key+1}}" name="answer_id" value="{{ $answer['id']}}">
                            <label for="opt-{{$key+1}}" class="mb-0 pl-3 checkbox-label"> {{ $answer['answer']}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="question_plain" style="padding: 1.8rem">
                    <div class="question">
                        <div class=""> {!! $questionData['question_content']['content'] !!} </div>
                    </div>
                    {{-- <div class="mt-4 ml-4 d-flex align-items-center"> --}}
                    @foreach($questionData['answers'] as $key=>$answer)
                    <div class="option-cont">
                        <input class="" type="radio" id="opt-{{$key+1}}" name="answer_id" value="{{ $answer['id']}}">
                        <label for="opt-{{$key+1}}" class="mb-0 pl-3 radio-row-label"> {{ $answer['answer']}}</label>
                    </div>
                    @endforeach
                    {{-- </div> --}}
                </div>
                @endif
                <input type="hidden" name="test_id" value="{{$testData['id']}}">
                <input type="hidden" name="question_id" value="{{$questionData['id']}}">
                <input type="hidden" name="current_question_number" value="{{ $testData['current_question_number'] }}">
                <input type="hidden" name="category" value="{{ $questionData['category'] }}">
                <input type="hidden" name="test_type" value="{{ $testDetails['testType'] }}">
                <input type="hidden" name="current_question_time_spent" value="{{$testData['current_question_time_spent']}}" id="question-time-spent">
            </div>
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="lower_head_container" data-toggle="modal" data-target="#exampleModal">
                        <img src="{{ asset('images/test/information.svg') }}" width="16px" height="16px" class="white-img">
                        <div class="lower_heads">Help</div>
                    </div>
                    <div class="lower_head_container">
                        <img src="{{ asset('images/test/pause.svg') }}" width="16px" height="16px" class="white-img">

                        <a href="/pause-exam/{{$testDetails['testType']}}/{{$testData['id']}}">
                            <div class="lower_heads">Pause Exam</div>
                        </a>
                    </div>

                    <div class="lower_head_container">
                        <img src="{{ asset('images/test/logout.svg') }}" width="18px" height="15px" class="white-img">
                        <a href="/end-exam/{{$testDetails['testType']}}/{{$testData['id']}}">
                            <div class="lower_heads">End Exam</div>
                        </a>
                    </div>

                </div>

                @if (isset($testData['category_order']))
                <input type="hidden" name="category_order" value="{{ $testData['category_order'] }}">
                @endif
                @if (isset($testData['mode']) && $testData['mode']=='practice')

                {{-- <input type="button" name="answer" value="Show Answer" onclick="showAnswerExplaination()" /> --}}
                @endif
                @if ($testData['current_question_number'] == $testDetails['totalNumberOfQuestions'])

                <div class="js-toggle-submit">
                    <div class="next_container">
                        <div>Submit</div>
                        <img src="{{ asset('images/test/arrow.svg') }}" width="18px" height="15px" style="margin-bottom: 0.1rem;" class="next-img white-img">
                    </div>
                </div>

                <button type="submit" formmethod="POST" class="finish_form d-none">
                    <div class="next_container">
                        <div>Finish</div>
                        <img src="{{ asset('images/test/arrow.svg') }}" width="18px" height="15px" style="margin-bottom: 0.1rem;" class="next-img white-img">
                    </div>
                </button>
                @else
                {{-- <button type="submit" formmethod="POST"> --}}
                <div class="js-toggle-submit">
                    <div class="next_container">
                        <div>Submit</div>
                        <img src="{{ asset('images/test/arrow.svg') }}" width="18px" height="15px" style="margin-bottom: 0.1rem;" class="next-img white-img">
                    </div>
                </div>

                <button type="submit" formmethod="POST" id="nextBtn" class="d-none">
                    <div class="next_container">
                        <div>Next</div>
                        <img src="{{ asset('images/test/arrow.svg') }}" width="18px" height="15px" style="margin-bottom: 0.1rem;" class="next-img white-img">
                    </div>
                </button>

                @endif
                {{ csrf_field() }}
            </div>
        </div>
        <div style="background-color: #f5f5f5;" class="non js-view-explaination-container d-none">
            <div class="js-view-explaination explaination-container">
                <div class="explaination-subs">
                    <div class="explaination-titles">Title</div><br>
                    <div class="explaination-sub-titles">Dorn Consulting handles</div>
                </div>
                <div class="explaination-subs">
                    <div class="explaination-titles">Your Result</div><br>
                    <div class="explaination-sub-titles">Correct</div>
                </div>
                <div class="explaination-subs">
                    <div class="explaination-titles">Difficulty</div><br>
                    <div class="explaination-sub-titles">Medium</div>
                </div>
                <div class="explaination-subs">
                    <div class="explaination-titles">Your Pace</div><br>
                    <div class="explaination-sub-titles">00:51</div>
                </div>
                <div class="explaination-subs" style="border-right: none">
                    <div class="explaination-titles">Others's Pace</div><br>
                    <div class="explaination-sub-titles">1:12</div>
                </div>
            </div>
            <div class="explaination--text-container">
                <h3 class="Explaination">Explaination</h3>
                <div class="px-4 pb-5">{!! $questionData['answer_key']['explanation_text'] !!}</div>
                <h3 class="Explaination">Explanation-Video</h3>
                <div class="px-4 pb-5">{!! $questionData['answer_key']['explanation_video'] !!}</div>
            </div>
        </div>
        </div>
    </form>
    </div>
    </div>
</x-app-layout>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

    </style>
</head>

<body>
    <script src="{{ asset('js/questions.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script>
        const timeRemaining = parseInt("{{$testDetails['timeRemaining']}}");
        const testId = "{{$testData['id']}}";
        const category = "{{$questionData['category']}}";
        const testType = "{{$testDetails['testType']}}";
        var current_question_time_spent = parseInt("{{$testData['current_question_time_spent']}}");
    </script>
</body>
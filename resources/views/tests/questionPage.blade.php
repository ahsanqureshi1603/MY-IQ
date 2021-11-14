<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard ') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" type="" href="{{ asset('css/main_test.css') }}">
    <form action="/next-question/{{$testDetails['testType']}}" class="inline-block">
        <div class="main">
            <div class="d-flex justify-content-between align-items-center">
                <div class="main-head">GMAT TEST </div>
                <img src="{{ asset('images/test/logo_white.png') }}" width="220px" height="10px" class="">
                <div class="text-right">
                    <div class="d-flex">
                        <img src="{{ asset('images/test/time.svg') }}" width="18px" height="18px" class="" style="margin-bottom: 0.1rem;">
                        <div class="time_remaining">Time Remaining <div id="time-remaining-div" class="ml-2"></div>
                        </div>
                    </div>
                    <div class="ques_out_of">{{$testData['current_question_number']}} of {{$testData['number_of_questions']}}</div>
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
                    <div class="question">
                        {{-- <label for="answerSubmitted"> --}}
                        <div class=""> {!! $questionData['question_extra'] !!} </div>
                        {{-- </label> --}}
                    </div>
                </div>

                <div>
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
            <input type="hidden" name="current_question_time_spent" value="{{$testData['current_question_time_spent']}}" id="id1">
        </div>
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <div class="lower_head_container" data-toggle="modal" data-target="#exampleModal">
                    <img src="{{ asset('images/test/information.svg') }}" width="16px" height="16px" class="white-img">
                    <div class="lower_heads">Help</div>
                </div>
                <div class="lower_head_container">
                    <img src="{{ asset('images/test/pause.svg') }}" width="16px" height="16px" class="white-img">
                    <div class="lower_heads">Pause Exam</div>
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
            <div id="answer-explanation" style="display:none;" class="answer_list">
                <h4>Explanation</h4><br>
                <h4>{{$questionData['answer_key']['explanation_text']}}</h4>
                <h4>Explanation-Video</h4><br>
                <h4>{{$questionData['answer_key']['explanation_video']}}</h4>
            </div>
            {{-- <input type="button" name="answer" value="Show Answer" onclick="showAnswerExplaination()" /> --}}
            @endif
            @if ($testData['current_question_number'] == $testDetails['totalNumberOfQuestions'])
            <button type="submit" formmethod="POST">
                <div class="next_container">
                    <div>Finish</div>
                    <img src="{{ asset('images/test/arrow.svg') }}" width="18px" height="15px" style="margin-bottom: 0.1rem;" class="next-img white-img">
                </div>
            </button>
            @else
            <button type="submit" formmethod="POST" id="nextBtn">
                <div class="next_container">
                    <div>Next</div>
                    <img src="{{ asset('images/test/arrow.svg') }}" width="18px" height="15px" style="margin-bottom: 0.1rem;" class="next-img white-img">
                </div>
            </button>

            @endif
            {{ csrf_field() }}
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
        // Set the date we're counting down to
        var timeRemaining = parseInt("{{$testDetails['timeRemaining']}}");
        var countDownDate = (new Date().getTime()) + (timeRemaining);
        var current_question_time_spent = parseInt("{{$testData['current_question_time_spent']}}");
        // Update the count down every 1 second
        var x = window.setInterval(function() {
            current_question_time_spent = current_question_time_spent + 1;
            document.getElementById("id1").value = current_question_time_spent;
            console.log(current_question_time_spent);
            // Get today's date and time
            var now = new Date().getTime();
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            var hoursMinutes = hours * 60;
            var totalMinutes = minutes + hoursMinutes;
            // Output the result in an element with id="time-remaining-div"
            document.getElementById("time-remaining-div").innerHTML = totalMinutes + "m " + seconds + "s ";
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/update-timer/{{$testDetails['testType']}}",
                type: 'post',
                data: {
                    test_id: "{{$testData['id']}}",
                    category: "{{$questionData['category']}}",
                    time_remaining: distance,
                    current_question_time_spent: current_question_time_spent,
                },
                success: function(data) {
                    // Perform operation on return value
                    console.log(data);
                    window.typeset && window.typeset();
                }
            });
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("time-remaining-div").innerHTML = "EXPIRED";
                window.location.href = "/pause-test/{{$testDetails['testType']}}/{{$testData['id']}}";
            }
        }, 1000);
    </script>
</body>
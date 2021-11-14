<x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <link rel="stylesheet" type="" href="{{ asset('css/main_test.css') }}">

        <div class="main" >
            <div class="d-flex justify-content-between align-items-center">
                <div class="main-head">GMAT TEST </div>
                <img src="{{ asset('images/test/logo_white.png') }}" width="220px" height="10px" class="">
                <div class="text-right">
                    <div class="d-flex">
                        <img src="{{ asset('images/test/time.svg') }}" width="18px" height="18px" class="" style="margin-bottom: 0.1rem;">
                        <div class="time_remaining">Time Remaining 60:99</div>
                    </div>
                    <div class="ques_out_of">2 of 31</div>
                </div>
            </div>
            <div class="ques-container">
                <div class="section-tab">
                    <div>Section 1 - Quantitative Reasoning</div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center pr-2" style="border-right: 1px solid #87a1cb;"><img src="{{ asset('images/test/flag.svg') }}" class="section-tab-img"> Flag for Review</div>
                        <div class="d-flex align-items-center"><img src="{{ asset('images/test/white_board.svg') }}" class="section-tab-img">  Whiteboard</div>
                    </div>
                </div>
                {{-- <div style="padding: 1.8rem">
                    <div class="question">
                        This Will be question
                    </div>
                    <div class="mt-4 ml-4 d-flex align-items-center">
                        <input class="" type="radio" id="opt-1" name="subjects[]" value="">
                        <label for="opt-1" class="mb-0 pl-3 radio-row-label"> Option 1</label>
                    </div>
                </div> --}}

                <div class="question_split">
                    <div class="question_split-left">
                        <div class="question">
                            This Will be question
                        </div>
                    </div>
                    <div>
                        <div class="mt-4 ml-4 d-flex align-items-center">
                            <input class="" type="radio" id="opt-1" name="subjects[]" value="">
                            <label for="opt-1" class="mb-0 pl-3 radio-row-label"> Option 1</label>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="lower_head_container">
                            <img src="{{ asset('images/test/information.svg') }}" width="16px" height="16px" class="white-img">
                            <div class="lower_heads">Help</div>
                        </div>
                        <div class="lower_head_container">
                            <img src="{{ asset('images/test/pause.svg') }}" width="16px" height="16px" class="white-img">
                            <div class="lower_heads">Pause Exam</div>
                        </div>

                        <div class="lower_head_container">
                            <img src="{{ asset('images/test/logout.svg') }}" width="18px" height="15px" class="white-img">
                            <div class="lower_heads">End Exam</div>
                        </div>

                    </div>
                    <div class="next_container">
                        <div class="next" data-toggle="modal" data-target="#exampleModal">Next</div>
                        <img src="{{ asset('images/test/arrow.svg') }}" width="18px" height="15px" class="next-img white-img">
                    </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: 545px; margin:5.75rem auto;">
                    <div class="modal-content ques-modal-content">
                        <div class="modal-header ques-modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Answer Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="padding: 1rem 1.4rem;">
                            Click YES to confirm your answer and continue to the next question.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary no-btn modal-btns" data-dismiss="modal">NO</button>
                            <button type="button" class="btn btn-primary yes-btn modal-btns">YES</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="{{ asset('js/questions.js') }}" defer></script>

</x-app-layout>

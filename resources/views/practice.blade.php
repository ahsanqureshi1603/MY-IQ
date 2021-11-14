@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
<x-app-layout>
        <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }}
                </h2>
        </x-slot>

        <link rel="stylesheet" type="" href="{{URL::asset('/css/dashboard.css') }}">
        <link rel="stylesheet" type="" href="{{URL::asset('/css/dashboard/practice.css') }}">


        <div class="d-flex">
                <div class="d-dash-left">
                        <div class="d-left-sections js-left-sections">
                                <div class="dark-circle">
                                        <img src="{{ asset('images/dashboard/learn.svg') }}" class="d-left-img">
                                </div>
                                <div class="d-left-heads">Learn</div>
                        </div>
                        <div class="d-left-selected js-left-sections">
                                <div class="dark-circle">
                                        <img src="{{ asset('images/dashboard/practice.svg') }}" class="d-left-img">
                                </div>
                                <div class="d-left-heads">Practice</div>
                        </div>
                        <div class="d-left-sections js-left-sections">
                                <div class="dark-circle">
                                        <img src="{{ asset('images/dashboard/test.svg') }}" class="d-left-img">
                                </div>
                                <div class="d-left-heads">Test</div>
                        </div>
                        <div class="d-left-sections js-left-sections">
                                <div class="dark-circle">
                                        <img src="{{ asset('images/dashboard/learn.svg') }}" class="d-left-img">
                                </div>
                                <div class="d-left-heads">My Test Reports</div>
                        </div>
                        <div class="d-left-sections js-left-sections">
                                <div class="dark-circle">
                                        <img src="{{ asset('images/dashboard/test report.svg') }}" class="d-left-img">
                                </div>
                                <div class="d-left-heads">Profile</div>
                        </div>
                </div>

                <div class="d-dash-right">
                        @include('dashboard.js-practice-toggle',['verbalSubjectQuestions','mathSubjectQuestions'])
                </div>
        </div>

        <script src="{{ asset('js/dashboard.js') }}" defer></script>


</x-app-layout>
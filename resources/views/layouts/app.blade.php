<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
	    <link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')}}">  
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        {{-- <link rel="icon" type="" href={{ URL::asset('http://127.0.0.1:8000/public/css/dashboard.css')}}> --}}

        {{-- <link rel="stylesheet" type="" href="{{ asset('css/dashboard.css') }}"> --}}
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Arimo&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">



        {{-- Home --}}
      

    

        <link rel="stylesheet" href="{{ asset('css/addQuestion.css') }}">


        @livewireStyles

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="https://cdn.tiny.cloud/1/ke4yqser8xy363101bkqai3amxlldc6w8t46hszog4596q9h/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://www.wiris.net/demo/plugins/app/WIRISplugins.js?viewer=image"></script>



    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->
            {{-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                    <h1>as</h1>
                </div>
            </header> --}}

            <!-- Page Content -->
            <main style="padding-top: 89px;">
                {{ $slot }}
            </main>
        </div>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.6/MathJax.js?config=TeX-MML-AM_HTMLorMML"></script> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        {{-- Home --}}

    

        <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
        <script src="{{ asset('js/showQuestion.js')}}"></script>
        <script src="{{ asset('js/addQuestion.js')}}"></script> 
        <script src="{{ asset('js/editor.js')}}"></script>
        @stack('modals')

        @livewireScripts
    </body>
</html>

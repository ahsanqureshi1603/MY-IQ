<p>Instructions</p>
<!-- {{print('<pre>' . print_r($testData, true) . '</pre>')}} -->

<a href="/unpause-test/{{$testData->id}}">Start Next Category</a>




<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        p {
            text-align: center;
            font-size: 60px;
            margin-top: 0px;
        }
    </style>
</head>

<body>
    <p id="demo"></p>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Set the date we're counting down to
        // var countDownDate = (new Date().getTime()) + "{{$testData->math_time_remaining}}";
        // var countDownDate = (new Date("{{$testData->test_start_time}}").getTime()) + (1000 * 100 * 10);
        var timeRemaining = parseInt("{{$testData->pause_time_remaining}}");

        var countDownDate = (new Date().getTime()) + (timeRemaining);
        // alert(countDownDate);
        // Update the count down every 1 second
        var x = setInterval(function() {
            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/update-timer',
                type: 'post',
                data: {
                    test_id: "{{$testData->id}}",
                    category: "pause",
                    time_remaining: distance,
                },
                success: function(data) {
                    // Perform operation on return value
                    console.log(data);
                    // alert(data);
                }
            });
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
                window.location.href = "/unpause-test/{{$testData->id}}";
            }
        }, 1000);
    </script>

</body>
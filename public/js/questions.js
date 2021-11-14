let startTimeInterval;
// Set the date we're counting down to
var countDownDate = (new Date().getTime()) + (timeRemaining);
var timerPaused = 0;
var now;
// set remainingTime when click on pause button;
let stopTime;
let playTime;

// play timer when function load;
(function () {
    timeInterval();
})();
// 
function timeInterval() {
    // Update the count down every 1 second
    startTimeInterval = setInterval(interval, 1000);
    timeInterval.startTimeInterval = startTimeInterval;
}

// Interval
function interval() {
    current_question_time_spent = current_question_time_spent + 1;
    // alert(current_question_time_spent)
    document.getElementById("question-time-spent").value = current_question_time_spent;
    console.log(current_question_time_spent);
    now = new Date().getTime();
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    var hoursMinutes = hours * 60;
    var totalMinutes = minutes + hoursMinutes;
    document.getElementById("time-remaining-div").innerHTML = totalMinutes + "m " + seconds + "s ";
    // Output the result in an element with id="time-remaining-div"
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `/update-timer/${testType}`,
        type: 'post',
        data: {
            test_id: testId,
            category: category,
            time_remaining: distance,
            current_question_time_spent: current_question_time_spent,
        },
        success: function (data) {
            // Perform operation on return value
            window.typeset && window.typeset();
        }

    });
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(startTimeInterval);
        document.getElementById("time-remaining-div").innerHTML = "EXPIRED";
        window.location.href = `/pause-test/${testType}/${testId}`;
    }
}

// stop timer
function pauseTimeInterval(e) {
    clearInterval(startTimeInterval);
    stopTime = now;
    $(e).attr({
        'onClick': 'playTimeInterval(this)',
        'value': 'Play Exam'
    });
}

// play timer
function playTimeInterval(e) {
    startTimeInterval = setInterval(interval, 1000);
    playTime = new Date().getTime();
    let pauseTime = playTime - stopTime;
    countDownDate = countDownDate + pauseTime;
    $(e).attr({
        'onClick': 'pauseTimeInterval(this)',
        'value': 'Pause Exam'
    });
}

$('.js-toggle-flag').on('click', function () {
    $(this).children().toggleClass('white-img flag-unselected')
    if ($("input[name='flagged']").val() == 1) {
        $("input[name='flagged']").val('0');
    } else
        $("input[name='flagged']").val('1');

})

$('.js-toggle-submit').on('click', function () {
    let mainContainer = $(this).closest('.practice-question-container');
    let length = $(mainContainer).find('input[name="answer_id"]:checked').length;
    if (length > 0) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/submit-practice-test",
            type: 'post',
            data: {
                test_id: $("input[name='test_id']").val(),
                question_id: $("input[name='question_id']").val(),
                answer_id: $("input[name='answer_id']").val(),
                current_question_number: $("input[name='current_question_number']").val(),
                flagged: $("input[name='flagged']").val(),
                test_type: 'practice',
            },
            success: function (data) {
                // Perform operation on return value
                console.log(data);
            }
        });
        $('.js-view-explaination-container').toggleClass('d-block d-none');
        $('.main').css({
            'height': 'auto',
            'padding': '1rem 2.7rem 0 1.5rem'
        });
        $('body').css({
            'overflow-y': 'auto'
        });
        $("html, body").animate({
            scrollTop: $('.main').height()
        }, 1000);
        $(this).hide();
        let queOutOf = $('.ques_out_of').data('total');
        let currQue = $('.ques_out_of').data('curr');
        if (currQue !== queOutOf) {
            $('#nextBtn').toggleClass('d-none d-block');
        } else {
            $('.finish_form').toggleClass('d-none d-block');
        }
    }
});

$('.option-cont').on('click', function () {
    $(this).closest('.practice-question-container').find('.js-toggle-submit').addClass('active');
})

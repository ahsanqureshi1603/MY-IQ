const DefaultsChecks = (cat) => {
    $('.js-opt-btn').removeClass('unselected-opt-btn')
    $('.js-opt-btn').prev().prop('checked', false);
    $('.js-default-option').addClass('selected-opt-btn')
    $('.js-default-option').prev().prop('checked', true);
    $(`.checkbox-row-input[name="question_type[]"]`).prop('checked', false);
    $(`.checkbox-row-input[name="question_type[]"][value="all_${cat}"]`).prop('checked', true);

    $("input[data-subjects='subjects']").each(function (params) {
        console.log(cat);
        if ($(this).closest('.subject-option-container').hasClass('js-' + cat + '-subs')) {
            console.log('yes')
            $(this).prop('checked', true)
        } else
            $(this).prop('checked', false)
    })

}

$(document).ready(function () {
    DefaultsChecks('verbal')
    // $(document).on('click', 'input[name="difficulty[]"]', 'input[name="question_pool[]"]', function() {      
    //   $('input[type="checkbox"]').not(this).prop('checked', false);      
    // });

    $(document).on('click', 'input[name="question_pool"]', function () {
        $(this).not(this).prop('checked', false);
    });

    $('.js-left-sections').on("click", function () {
        $('.js-left-sections').removeClass('d-left-selected')
        $('.js-left-sections').addClass('d-left-sections')

        var i = $('.d-left-sections').index(this)

        $($('.d-left-sections')[i]).toggleClass('d-left-sections d-left-selected')
    })

    $('.js-test-type').on("click", function () {
        if (!$(this).hasClass('selected-test-type')) {

            $('.js-test-type').removeClass('selected-test-type')
            $('.js-test-type').addClass('test-type')

            var i = $('.js-test-type').index(this)

            $($('.js-test-type')[i]).toggleClass('selected-test-type')
            let categoryValue = $(this).siblings().attr('value');
            if (categoryValue == 'math') {
                $('.js-verbal-subs').toggleClass('d-none d-block')
                $('.js-verbal-ques').toggleClass('d-none d-block')
                $('.js-quant-subs').toggleClass('d-none d-block')
                $('.js-math-ques').toggleClass('d-none d-block')
                DefaultsChecks('quant')
            } else if (categoryValue == 'verbal') {
                $('.js-quant-subs').toggleClass('d-none d-block')
                $('.js-math-ques').toggleClass('d-none d-block')
                $('.js-verbal-subs').toggleClass('d-none d-block')
                $('.js-verbal-ques').toggleClass('d-none d-block')
                DefaultsChecks('verbal')
            }
        }

    })


    $('input[name="question_type[]"]').on('click', function () {
        // console.log('clicked')
    })

    $('#js-clear-all').on("click", function () {
        $("input[data-subjects=subjects]:checkbox").prop('checked', false);
    })

    $('#js-sel-all').on("click", function () {
        let activeContainer = $(this).closest('.subj-container').find('.subject-option-container.d-block');
        $(activeContainer).find("input[data-subjects=subjects]:checkbox").prop('checked', true);
    })

    // change keypress paste textInput input
    $(".js-practice-input").on('keypress ', function () {
        // $("input[name='time_limit']").change(function() {
        if ($(this).hasClass('js-enter-min')) {
            $(this).attr('name', 'time_limit')
            $('.js-opt-btn-limit').each(function () {
                $(this).siblings().removeAttr('name');
                // console.log($(this).siblings().attr('name'))
            })
            $('.js-opt-btn-limit').removeClass('selected-opt-btn')
            $('.js-opt-btn-limit').addClass('unselected-opt-btn')
        } else {
            $(this).attr('name', 'number_of_questions')

            $('.js-opt-btn-no-of-ques').each(function () {
                $(this).siblings().removeAttr('name');
                // console.log($(this).siblings().attr('name'))
                $('.js-opt-btn-no-of-ques').removeClass('selected-opt-btn')
                $('.js-opt-btn-no-of-ques').addClass('unselected-opt-btn')
            })
        }
        $('#will-have-questions').hide()
    });

    $('.js-opt-btn').on('click', function () {
        let value = $(this).prev().attr('value');
        let name = $(this).prev().attr('name');
        if (value == 'all_verbal' || value == 'all_quant') {
            $(this).closest('.js-option-container').find('.checkbox-row-input').prop('checked', false);
            $(this).closest('.js-option-container').find('.js-opt-btn').removeClass('selected-opt-btn');
            $(this).addClass('selected-opt-btn');
            $(this).prev().attr('checked', 'checked');
        } else if (name == 'question_type[]') {
            let category = $(this).closest('.js-option-container').attr('data-cat');
            if (category == 'quant') {
                $(this).closest('.js-option-container').find('.checkbox-row-input[value="all_quant"]').prop('checked', false);
                $(this).closest('.js-option-container').find('.checkbox-row-input[value="all_quant"]').next().removeClass('selected-opt-btn');
            } else if (category == 'verbal') {
                $(this).closest('.js-option-container').find('.checkbox-row-input[value="all_verbal"]').prop('checked', false);
                $(this).closest('.js-option-container').find('.checkbox-row-input[value="all_verbal"]').next().removeClass('selected-opt-btn');
            }
            $(this).prev().attr('checked', 'checked');
            $(this).addClass('selected-opt-btn');
        } else {
            $(this).closest('.js-option-container').find('.checkbox-row-input').prop('checked', false);
            $(this).closest('.js-option-container').find('.js-opt-btn').removeClass('selected-opt-btn');
            $(this).addClass('selected-opt-btn');
            $(this).prev().prop('checked', true);
        }
    })

});

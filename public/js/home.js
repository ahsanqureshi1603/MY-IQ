$(document).ready(function () {
    //    Carousel config 
    var swiper = new Swiper('#features-carousel', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        loop: true,
        slideClass: "feature-slide",
        threshold: 15,
        coverflowEffect: {
            rotate: 20,
            stretch: 0,
            depth: 30,
            modifier: 1,
            slideShadows: true,
        },
        navigation: {
            nextEl: '.feature-slider-next-btn',
            prevEl: '.feature-slider-prev-btn',
        },
    });


    var swiper = new Swiper('.happy-clients-carousel', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.happy-clients-swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.clients-slider-next-btn',
            prevEl: '.clients-slider-prev-btn',
        },
    });

});
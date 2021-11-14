<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }
    </style>

</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0 head-top">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
            @endif
        </div>
        @endif

    </div>
</body>


{{-- Carousel lib styles--}}
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
{{-- Animate on scroll lib styles --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

<section class="header">
    <div class="main-heading-container">
        <h1 class="main-heading h1-heading">Want to get a 720+ GMAT?</h1>
        <p class="main-sub-text sub-text">Ace your exam preparation with 100+ hours live sessions, 10000+ sample <br> questions, and unlimited mock tests.</p>
        <p>&nbsp;</p>
        <p class="cta-heading sub-text"><strong>Which exam are you planning to take up?</strong></p>
        <div class="cta-btns-container">
            <div class="cta-btn-container">
                <div class="cta-btn gmat-btn"><button>GMAT</button></div>
            </div>
            <div class="cta-btn-container">
                <div class="cta-btn gre-btn"><button>GRE</button></div>
            </div>
        </div>
    </div>
    <div class="get-started-container">
        <div class="get-started-lhs">
            <h2 class="get-started-heading h2-heading">Get Started For Free!</h2>
            <p class="get-started-sub-heading sub-heading">Mock Tests + Live Classes+ Prep plan + Premium Doubt Support – All for Free!</p>
        </div>
        <div class="get-started-rhs">
            <div class="signup-btn-container">
                <button class="signup-btn">Sign Up Today</button>
            </div>
        </div>
    </div>
</section>

<section class="our-work-container">
    <div class="group-heading group-heading-mark">
        <h2 class="h2-heading our-work-heading">Our Work Speaks for Us</h2>
    </div>
    <div class="group-container-4">
        <div class="our-work-content">
            <div class="our-work-img">
                <img src="{{url('/images/home/our-work-0-compressed.jpg')}}">
            </div>
            <div class="our-work-details">
                <h4 class="our-work-main-text">720</h4>
                <div class="our-work-sub-text">Average Reported GMAT Score of our Users</div>
            </div>
        </div>
        <div class="our-work-content">
            <div class="our-work-img">
                <img src="{{url('/images/home/our-work-1-compressed.jpg')}}">
            </div>
            <div class="our-work-details">
                <h4 class="our-work-main-text">90%</h4>
                <div class="our-work-sub-text">of our Users Reported Scoring 700 or Higher on the GMAT</div>
            </div>
        </div>
        <div class="our-work-content">
            <div class="our-work-img">
                <img src="{{url('/images/home/our-work-2-compressed.jpg')}}">
            </div>
            <div class="our-work-details">
                <h4 class="our-work-main-text">2000</h4>
                <div class="our-work-sub-text">Number of Successful Students</div>
            </div>
        </div>
        <div class="our-work-content">
            <div class="our-work-img">
                <img src="{{url('/images/home/our-work-3-compressed.jpg')}}">
            </div>
            <div class="our-work-details">
                <h4 class="our-work-main-text">46</h4>
                <div class="our-work-sub-text">Cumulative years of teaching experience of our tutors</div>
            </div>
        </div>
    </div>
</section>



<section class="features">
    <div class="group-heading group-heading-mark padding-t-30 margin-b-0">
        <h2 class="h2-heading features">Features</h2>
    </div>

    <!-- Slider main container -->
    <div class="swiper-container" id="features-carousel">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide feature-slide">
                <div class="item feature-item-container">
                    <div class="feature-image-container">
                        <img src="https://mgtestprep.com/blog/wp-content/uploads/2020/11/support-scaled.jpg" alt="Feature">
                    </div>
                    <div class="feature-deatils-container">
                        <h4 class="feature-details-heading">In-Depth Analytics</h4>
                        <div class="feature-details">
                            <p><span>Learn what is the best way FOR YOU with </span>Our Personalised Approach that studies the way you think and optimizes your strengths</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide feature-slide">
                <div class="item feature-item-container">
                    <div class="feature-image-container">
                        <img src="https://mgtestprep.com/blog/wp-content/uploads/2020/11/support-scaled.jpg" alt="Feature">
                    </div>
                    <div class="feature-deatils-container">
                        <h4 class="feature-details-heading">In-Depth Analytics</h4>
                        <div class="feature-details">
                            <p><span>Learn what is the best way FOR YOU with </span>Our Personalised Approach that studies the way you think and optimizes your strengths</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide feature-slide">
                <div class="item feature-item-container">
                    <div class="feature-image-container">
                        <img src="https://mgtestprep.com/blog/wp-content/uploads/2020/11/support-scaled.jpg" alt="Feature">
                    </div>
                    <div class="feature-deatils-container">
                        <h4 class="feature-details-heading">In-Depth Analytics</h4>
                        <div class="feature-details">
                            <p><span>Learn what is the best way FOR YOU with </span>Our Personalised Approach that studies the way you think and optimizes your strengths</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide feature-slide">
                <div class="item feature-item-container">
                    <div class="feature-image-container">
                        <img src="https://mgtestprep.com/blog/wp-content/uploads/2020/11/support-scaled.jpg" alt="Feature">
                    </div>
                    <div class="feature-deatils-container">
                        <h4 class="feature-details-heading">In-Depth Analytics</h4>
                        <div class="feature-details">
                            <p><span>Learn what is the best way FOR YOU with </span>Our Personalised Approach that studies the way you think and optimizes your strengths</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide feature-slide">
                <div class="item feature-item-container">
                    <div class="feature-image-container">
                        <img src="https://mgtestprep.com/blog/wp-content/uploads/2020/11/support-scaled.jpg" alt="Feature">
                    </div>
                    <div class="feature-deatils-container">
                        <h4 class="feature-details-heading">In-Depth Analytics</h4>
                        <div class="feature-details">
                            <p><span>Learn what is the best way FOR YOU with </span>Our Personalised Approach that studies the way you think and optimizes your strengths</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide feature-slide">
                <div class="item feature-item-container">
                    <div class="feature-image-container">
                        <img src="https://mgtestprep.com/blog/wp-content/uploads/2020/11/support-scaled.jpg" alt="Feature">
                    </div>
                    <div class="feature-deatils-container">
                        <h4 class="feature-details-heading">In-Depth Analytics</h4>
                        <div class="feature-details">
                            <p><span>Learn what is the best way FOR YOU with </span>Our Personalised Approach that studies the way you think and optimizes your strengths</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev feature-slider-prev-btn"></div>
        <div class="swiper-button-next feature-slider-next-btn"></div>


    </div>
</section>
<section class="why-choose-us">
    <div class="group-heading ">
        <h2 class="h2-heading why-choose-us-heading">Why Choose Us</h2>
        <p class="why-choose-us-subheading">Understand How We’re Changing the Way Students Prepare for the GMAT.</p>
    </div>
    <div class="why-choose-us-details">
        <div class="group-container-2">
            <div class="details-container">
                <h2 class="h2-heading details-heading">Learn From the Best!</h2>
                <p class="details-sub-text sub-text">Get counselled directly by top coaches with cumulative experience of 46 years of teaching over 1000+ students. Individual attention from the most experienced teachers in test prep keeps you engaged—and accountable.</p>
            </div>
            <div class="details-img-container">
                <img src="{{url('/images/home/why-us (2).jpg')}}" alt="Why us">
            </div>
        </div>

        <div class="group-container-2">
            <div class="details-img-container">
                <img src="{{url('/images/home/why-us (4).jpg')}}" alt="Why us">
            </div>
            <div class="details-container">
                <h2 class="h2-heading details-heading">More Personalized Approach</h2>
                <p class="details-sub-text sub-text">Study via a mix of<br>– Detailed Live Classes<br>– In depth video resources<br>– Unlimited Practise Tests<br>– Detailed Query resolution support<br>– A detailed Test Prep Plan&nbsp;<br>……all customized to your needs&nbsp;</p>
            </div>
        </div>

        <div class="group-container-2">
            <div class="details-container">
                <h2 class="h2-heading details-heading">24/7 Expert Live Support</h2>
                <p class="details-sub-text sub-text">We’ve got your back at every step of your journey. Get Solution to all of your exam-related problems from our experts whenever you want.<br>Post in our Forum or send us your queries on Whatsapp</p>
            </div>
            <div class="details-img-container">
                <img src="{{url('/images/home/why-us (3).jpg')}}" alt="Why us">
            </div>
        </div>

        <div class="group-container-2">
            <div class="details-img-container">
                <img src="{{url('/images/home/why-us (5).jpg')}}" alt="Why us">
            </div>
            <div class="details-container">
                <h2 class="h2-heading details-heading">Unlimited Practise Questions</h2>
                <p class="details-sub-text sub-text">Test your skills with unlimited number of practise tests<br>Take sectional tests<br>Adaptive Mocks<br>or Timed challenges Test your skills when you want and get detailed analytics on what you can do to improve </p>
            </div>
        </div>


        <div class="group-container-2">
            <div class="details-container">
                <h2 class="h2-heading details-heading">Community Support</h2>
                <p class="details-sub-text sub-text">Practise together and stay accountable. Test yourself regularly and work with peers.Take daily accountablity challenges and challenge your peers to see where you stand. </p>
            </div>
            <div class="details-img-container">
                <img src="{{url('/images/home/why-us (1).jpg')}}" alt="Why us">
            </div>
        </div>
    </div>
</section>



<section class="happy-clients">
    <div class="group-heading ">
        <h2 class="h2-heading happy-clients-heading">From Our Happy Clients</h2>
    </div>
    <div class="swiper-container happy-clients-carousel">
        <div class="swiper-wrapper happy-clients-owl-carouse">
            <div class="swiper-slide item happy-clients-item">
                <h4 class="item-title">Tarun Bellani</h4>
                <div class="content">Mitul’s teaching is way different from others. And I qualify to say this from my own experience. I have benefited a lot till date as he is helping me in clearing my concepts, improving my techniques and has changed my approach towards answering GMAT questions. I could feel the difference from the first class itself.<p></p>
                    <p>Kudos to Mitul Gada &amp; Associates!</p>
                </div>
            </div>
            <div class="swiper-slide item happy-clients-item">
                <h4 class="item-title">Tarun Bellani</h4>
                <div class="content">Mitul’s teaching is way different from others. And I qualify to say this from my own experience. I have benefited a lot till date as he is helping me in clearing my concepts, improving my techniques and has changed my approach towards answering GMAT questions. I could feel the difference from the first class itself.<p></p>
                    <p>Kudos to Mitul Gada &amp; Associates!</p>
                </div>
            </div>
            <div class="swiper-slide item happy-clients-item">
                <h4 class="item-title">Tarun Bellani</h4>
                <div class="content">Mitul’s teaching is way different from others. And I qualify to say this from my own experience. I have benefited a lot till date as he is helping me in clearing my concepts, improving my techniques and has changed my approach towards answering GMAT questions. I could feel the difference from the first class itself.<p></p>
                    <p>Kudos to Mitul Gada &amp; Associates!</p>
                </div>
            </div>
            <div class="swiper-slide item happy-clients-item">
                <h4 class="item-title">Tarun Bellani</h4>
                <div class="content">Mitul’s teaching is way different from others. And I qualify to say this from my own experience. I have benefited a lot till date as he is helping me in clearing my concepts, improving my techniques and has changed my approach towards answering GMAT questions. I could feel the difference from the first class itself.<p></p>
                    <p>Kudos to Mitul Gada &amp; Associates!</p>
                </div>
            </div>
            <div class="swiper-slide item happy-clients-item">
                <h4 class="item-title">Tarun Bellani</h4>
                <div class="content">Mitul’s teaching is way different from others. And I qualify to say this from my own experience. I have benefited a lot till date as he is helping me in clearing my concepts, improving my techniques and has changed my approach towards answering GMAT questions. I could feel the difference from the first class itself.<p></p>
                    <p>Kudos to Mitul Gada &amp; Associates!</p>
                </div>
            </div>
            <div class="swiper-slide item happy-clients-item">
                <h4 class="item-title">Tarun Bellani</h4>
                <div class="content">Mitul’s teaching is way different from others. And I qualify to say this from my own experience. I have benefited a lot till date as he is helping me in clearing my concepts, improving my techniques and has changed my approach towards answering GMAT questions. I could feel the difference from the first class itself.<p></p>
                    <p>Kudos to Mitul Gada &amp; Associates!</p>
                </div>
            </div>
            <div class="swiper-slide item happy-clients-item">
                <h4 class="item-title">Tarun Bellani</h4>
                <div class="content">Mitul’s teaching is way different from others. And I qualify to say this from my own experience. I have benefited a lot till date as he is helping me in clearing my concepts, improving my techniques and has changed my approach towards answering GMAT questions. I could feel the difference from the first class itself.<p></p>
                    <p>Kudos to Mitul Gada &amp; Associates!</p>
                </div>
            </div>

        </div>
        <!-- Add Pagination -->
        <div class="happy-clients-swiper-pagination"></div>

        <div class="swiper-button-prev clients-slider-prev-btn"></div>
        <div class="swiper-button-next clients-slider-next-btn"></div>
    </div>
    <div class="view-all-reviews">
        <a href="">View All Reviews</a>
    </div>
</section>

<section class="cta-container">
    <div class="group-heading">
        <h2 class="h2-heading cta-heading">Which test are you Crushing on today?</h2>
    </div>
    <div class="cta-btns-container which-test-btns">
        <div class="cta-btn-container">
            <div class="cta-btn gmat-btn"><button>GMAT</button></div>
        </div>
        <div class="cta-btn-container">
            <div class="cta-btn gre-btn"><button>GRE</button></div>
        </div>
    </div>
</section>

<article class="try-free-banner">
    <div class="banner-bg-half"></div>
    <div class="group-heading">
        <h2 class="h2-heading try-free-banner-heading">TRY US FREE FOR 7 DAYS!</h2>
    </div>
    <div class="signup-btn-container">
        <button class="signup-btn">Sign Up Today</button>
    </div>
</article>

<footer>
    <div class="footer-section-1">
        <div class="footer-logo">
            <img src="{{url('/images/home/mgtestprep-ss.png')}}" alt="Banner">
        </div>
        <div class="footer-mail">
            <img src="{{url('/images/home/email.png')}}" alt="email">
            <a style="color: black;" href="mailto:info@mgtestprep.com">info@mgtestprep.com </a>
        </div>
        <div class="footer-social">
            <div class="social"><img src="{{url('/images/home/Facebook-Icon.png')}}" alt="social icon"></div>
            <div class="social"><img src="{{url('/images/home/Twitter.png')}}" alt="social icon"></div>
            <div class="social"><img src="{{url('/images/home/linkedin.png')}}" alt="social icon"></div>
            <div class="social"><img src="{{url('/images/home/instagram-1.png')}}" alt="social icon"></div>
            <div class="social"><img src="{{url('/images/home/youtube-1.png')}}" alt="social icon"></div>
        </div>
    </div>
    <div class="footer-section-2">
        <div class="footer-sub-heading">
            <h4>MG TestPrep</h4>
        </div>
        <div class="menu-services-container menu-container">
            <ul id="menu-services" class="menu">
                <li id="menu-item-912" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-912"><a href="https://mgtestprep.com/blog/gmat/">GMAT</a></li>
                <li id="menu-item-913" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-913"><a href="https://mgtestprep.com/blog/gre/">GRE</a></li>
                <li id="menu-item-911" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-911"><a href="https://mgtestprep.com/blog/testimonials/">Testimonials</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-section-3">
        <div class="footer-sub-heading">
            <h4>Account</h4>
        </div>
        <div class="menu-account-container menu-container">
            <ul id="menu-account" class="menu">
                <li id="menu-item-709" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-709"><a href="https://mgtestprep.com/blog/login/">Login</a></li>
                <li id="menu-item-707" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-707"><a href="https://mgtestprep.com/blog/faqs/">FAQs</a></li>
                <li id="menu-item-708" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-708"><a href="https://mgtestprep.com/blog/contact-us/">Contact Us</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-section-4">
        <div class="footer-book-heading">Want to work with us ?</div>
        <div class="book-cta"><a href="" class="btn footer__btn" target="_blank" rel="noopener noreferrer"> Book an Appointment</a></div>
    </div>
</footer>
<article class="copiright">
    <div class="copiright-grid">
        <div>Copyright © 2020 MG TestPrep. All rights reserved.</div>
        <div>Terms & Conditions </div>
        <div>Privacy Policy</div>
    </div>

</article>
{{-- Carousel lib scrtpt--}}
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
{{-- Animate on scroll lib script --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('js/home.js')}}"></script>
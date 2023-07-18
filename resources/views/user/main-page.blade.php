<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script>
        window.NREUM || (NREUM = {});
        NREUM.info = {
            "beacon": "bam.nr-data.net",
            "errorBeacon": "bam.nr-data.net",
            "licenseKey": "1ad55597d3",
            "applicationID": "2536259",
            "transactionName": "clhcFxdZCVRTSxgTBVZSQUwWXgpP",
            "queueTime": 0,
            "applicationTime": 288,
            "agent": ""
        }
    </script>
    <meta name="description" content="{{ config('app.name') }}" />
    <meta name="keywords" content={{ config('app.name') }}">
    <meta property="og:title" content={{ config('app.name') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>{{ config('app.name') }}</title>
    <!--[if lte IE 7]><script src="/assets/lte-ie7-ceb763da1bde4df6f6c0af5900157978077df0765e1cd426dd0d499f75bc0e6e.js"></script><![endif]-->
    <script
        src="{{ asset('assets/modernizr-2.0.6.min-aeb0af4c8ddec601badcf770a5409f155443791838945ac1087cb7bbde9dad5a.js') }}">
    </script>
    <link rel="stylesheet" media="all"
        href="{{ asset('assets/application-b6d07872d2ff763651a4ccec6b8667d8e06bac3fd96f1396300197749ed51f39.css') }}" />
    <link rel="stylesheet" media="screen"
        href="{{ asset('assets/web-home-bb1d2a578dc8bcf5917e630d4449fcaac53f881872e29040ba719a6e81be05c0.css') }}" />
    <!--[if IE 8]><link rel="stylesheet" media="all" href="/assets/ie-139291a5bb4ab2173e95e9b5bc0d5fb882d845cdaf4ce46db9aff762d93c5bde.css" /><![endif]-->

    <script src="{{ asset('assets/application-06ec9be474f0937930d3aa4066be918b4666e08f6d4e299c0cbd8c8ec008f545.js') }}">
    </script>







</head>

<body id="homepage_content" class="home-page new">
    <!-- <div id="oneYearAnniv"></div> -->
    <img class="home-bg"
        src="https://arabic-mooc-staging.s3.amazonaws.com/uploads/rwaq_image_params/home_background.jpg" />
    <div class="home-page-wrapper">
        <!-- Cover begin -->
        <div class="rwaq-header">
            <div class="container">
                <div class="row flex flex-row justify-content-between">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-4 ">
                        @include('user.layouts.logo')

                    </div>
                    @guest

                        <div class="col-lg-10 col-md-10 col-sm-9 col-8 pr-4">
                            <div class="float-sm-left actions pt-4">
                                <a class="site-btn btn browse py-2 px-4 mx-1" href="{{ route('courses.all') }}">تصفح
                                    المواد</a>
                                <a class="site-btn btn call-to-action py-2 px-4 mx-1" id="signup-id" data-toggle="modal"
                                    role="button" href="#" data-target="#signup-modal"
                                    title="انضم ل{{ config('app.name') }} الآن!">انضم ل{{ config('app.name') }}!</a>
                                <a class="site-btn btn btn-secondary py-2 px-4 mx-1" id="sign-id" data-toggle="modal"
                                    href="#" data-target="#signin-modal" title="قم بتسجيل الدخول">دخول</a>
                            </div>
                        </div>
                    @endguest
                    @auth


                        @include('user.layouts.navbar')

                        <script>
                            $('.menu-icon').click(function() {
                                $('.dropdown-menu').css('visibility', 'visible');
                            })
                        </script>
                    @endauth
                </div>
            </div>
        </div>
        <!--end rwaq-header-->

        <div class="rwaq-hero">
            <div class="container p-0" style="box-sizing: content-box;">
                <div class="row">
                    <div class="col-xs-12 mx-4 mx-sm-auto">
                        <div class="intro clearfix">
                            <h1 class="intro-main-title text-dark">
                                {{ config('app.name') }} - المنصة العربية للتعليم المفتوح
                            </h1>
                            <p class="intro-sub-title text-dark h3">
                                مواد أكاديمية مجانية باللغة العربية في شتى المجالات والتخصصات
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-9 col">
                        <img class="hero-image img-fluid" style="display: inline;"
                            src="https://arabic-mooc-staging.s3.amazonaws.com/uploads/rwaq_image_params/home.png" />
                    </div>

                </div>
            </div>
            <!--end rwaq-hero-->

            <div class="rwaq-courses clearfix mt-5">
                <div class="container" id="home-courses">
                    <h1 class="title text-dark">
                        مواد {{ config('app.name') }}
                        <span class="small">
                            ({{ $courses_count }})
                        </span>
                    </h1>
                    <p class="intro-sub-title text-dark text-center h3">

                    </p>
                    <!-- to do course total -->


                    <div class="courses-section-row" id="upcoming_courses">
                        <div class="courses-section-title clearfix">
                            <h5 class="text-right">المواد المرتقبة</h5>
                            <a title="تصفح المزيد من المواد المرتقبة" class="tool-tip"
                                href="{{ route('courses.all') }}">المزيد . .</a>
                            <i></i>
                        </div>
                        <div class="courses-slider">
                            <div class="owl-carousel home-courses-list" id="carouselOne">
                                @foreach ($upcoming_courses as $course)
                                    <div class="item">
                                        <div class="owl-img position-relative border view view-tenth">
                                            <h4 class="text-right"> <a
                                                    href="{{ route('courses.show', $course) }}">{{ $course->name }}</a>
                                            </h4>
                                            <span class="course-cat">{{ $course->name }}</span>
                                            <div class="owl-img-container overflow-hidden rounded-top">
                                                <img class="img-fluid w-100 h-100"
                                                    src="{{ route('user.get.thmbinal', $course) }}">
                                            </div>
                                            <div class="mask text-right">
                                                <p class="MsoNormal" dir="RTL"
                                                    style="direction:rtl;unicode-bidi:embed;"><span
                                                        dir="LTR"> </span>
                                                </p>
                                                <p class="MsoNormal" dir="RTL"
                                                    style="direction:rtl;unicode-bidi:embed;">...</p>
                                                <p class="readmore">
                                                    <a id="1359_title" href="{{ route('courses.show', $course) }}">تعرف
                                                        على
                                                        تفاصيل
                                                        المادة ...</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="owl-body border border-top-0 bg-light rounded-bottom">
                                            <div class="row p-3 no-gutters clearfix vertical-view one-instructor">
                                                <div class="row lecturer-block text-right">
                                                    <div class="d-inline-block px-2 border-left">
                                                        <a class="lecturer-photo"
                                                            href="{{ route('instructor.page', $course->instructor) }}">
                                                            <img class="owl-body-img img-fluid rounded-circle"
                                                                src="{{ isset($course->instructor->avatar) && $course->instructor->avatar != '' ? route('instructor.avatar', $course->instructor) : asset('default-logo.png') }}">
                                                        </a>
                                                    </div>
                                                    <div class="lecturer-data d-inline-block mr-2">
                                                        <a title="أ.ليث الغول"
                                                            href="{{ route('instructor.page', $course->instructor) }}">
                                                            <span>{{ $course->instructor->name }}</span>
                                                        </a>
                                                        <p title="مهندس برمجيات ومطور بلوك تشین">
                                                            {{ $course->instructor->job }}</p>
                                                    </div>
                                                </div>


                                            </div>
                                            <p class="subject-time text-right">
                                                <i class="site-icons icon-calendar mt-1 f2"></i>
                                                <strong>{{ $course->continous_status }}</strong>
                                                تبدأ {{ $course->date_from_to }}

                                            </p>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div> <!-- end "courses-section-row -->
                    <div class="courses-section-row">
                        <div class="courses-section-title clearfix">
                            <h5 class="text-right">المواد الحالية</h5>
                            <a title="تصفح المزيد من المواد الحالية" class="tool-tip"
                                href="{{ route('courses.all') }}">المزيد . .</a>
                            <i></i>
                        </div>
                        <div class="courses-slider">
                            <div class="owl-carousel home-courses-list" id="carouselTwo">
                                @foreach ($current_courses as $course)
                                    <div class="item">
                                        <div class="owl-img position-relative border view view-tenth">
                                            <h4 class="text-right"> <a
                                                    href="{{ route('courses.show', $course) }}">{{ $course->name }}</a>
                                            </h4>
                                            <span class="course-cat">القانون</span>
                                            <div class="owl-img-container overflow-hidden rounded-top">
                                                <img class="img-fluid w-100 h-100"
                                                    src="{{ route('get.thumbinal.course', $course) }}">
                                            </div>

                                        </div>
                                        <div class="owl-body border border-top-0 bg-light rounded-bottom">
                                            <div class="row p-3  staff-images grid-view grid-view2">

                                                <div class="lecturer-block col-12 tool-tip" data-placement="bottom">
                                                    <a class="lecturer-photo m-auto d-block"
                                                        href="{{ route('instructor.page', $course->instructor) }}">
                                                        <img class="owl-body-img img-fluid rounded-circle"
                                                            src="{{ isset($course->instructor->avatar) && $course->instructor->avatar != '' ? route('instructor.avatar', $course->instructor) : asset('default-logo.png') }}">
                                                    </a>
                                                    <div class="lecturer-data text-center">
                                                        <a
                                                            href="{{ route('instructor.page', $course->instructor) }}">
                                                            <span>{{ $course->instructor->name }}</span>
                                                        </a>
                                                    </div>
                                                </div>




                                            </div>
                                            <p class="subject-time text-right">
                                                <i class="site-icons icon-calendar mt-1 f2"></i>
                                                تبدأ {{ $course->date_from_to }}

                                            </p>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>


                    <div class="clearfix">
                        <div class="centered-buttons d-sm-flex justify-content-center">
                            <a class="site-btn call-to-action mb-2 order-sm-2 mx-1" data-toggle="modal"
                                role="button" href="#signup-modal" title="اشترك و ابدأ الدراسة الآن" id="sign-up-2"
                                rel="nofollow">انضم إلى طلاب
                                {{ config('app.name') }}
                                الآن</a>
                            <a class="site-btn grey-button text-white mb-2 order-sm-1 mx-1"
                                href="{{ route('courses.all') }}">تصفح جميع المواد</a>
                        </div>
                    </div>

                </div> <!-- end class="columns-3" -->
            </div>



            <div class="rwaq-board">
                <div class="container">
                    <h1 class="title text-dark">منصة {{ config('app.name') }}</h1>
                    <p class="intro-sub-title text-dark text-center h3">

                    </p>
                    <div class="row">

                        <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
                            <div class='item clearfix'>
                                <div class='top'>
                                    <img src='/assets/home/clapboard.png' loading='lazy' />
                                    <div class='desc text-dark'>
                                        نعتني بأدق التفاصيل وقت التسجيل مع المحاضرين لتكون المواد المصورة ذات جودة عالية
                                        تشجع الطالب على المشاهدة والمواصلة. كل محاضرة تخضع للمونتاج الاحترافي، ويتم
                                        نشرها على شكل عدد من المقاطع القصيرة لأجل التسهيل على الطالب المتابعة والتركيز.
                                    </div>
                                </div>
                                <h3 class='sub-title text-dark'>محاضرات مرئية</h3>
                            </div>
                        </div>

                        <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
                            <div class='item clearfix'>
                                <div class='top'>
                                    <img src='/assets/home/calculator.png' loading='lazy' />
                                    <div class='desc text-dark'>
                                        للتأكد من استيعاب الطالب لمضمون المحاضرات، سيجد تمارين تفاعلية تحتوي على
                                        سؤال/أسئلة تدور حول المقطع مع تصحيح فوري لإجاباته. بالإضافة إلى التمارين
                                        التفاعلية، هناك واجبات ومهام أسبوعية يقوم بتهيئتها المحاضر أو فريق عمل المحتوى
                                        وتشكل نسبة من درجة النجاح في المادة بالإضافة إلى الاختبار النهائي.
                                    </div>
                                </div>
                                <h3 class='sub-title text-dark'>تمارين تفاعلية</h3>
                            </div>
                        </div>

                        <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
                            <div class='item clearfix'>
                                <div class='top'>
                                    <img src='/assets/home/ribbon.png' loading='lazy' />
                                    <div class='desc text-dark'>
                                        بعض المواد سيُمنح للطالب المنضم لها شهادة إكمال بعد تجاوزه الاختبار النهائي.
                                        نأمل مع مرور الوقت في المستقبل القريب عقد اتفاقية مع جهة أكاديمية للإشراف ومنح
                                        الشهادات بإسمها.
                                    </div>
                                </div>
                                <h3 class='sub-title text-dark'>شهادات إكمال</h3>
                            </div>
                        </div>

                        <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
                            <div class='item clearfix'>
                                <div class='top'>
                                    <img src='/assets/home/colorwheel.png' loading='lazy' />
                                    <div class='desc text-dark'>
                                        لقاء دوري مباشر مع المحاضر يجيب فيه على أسئلة الطلاب، كما أنه في صفحة كل مقطع من
                                        كل محاضرة سيجد الطالب مكان للسؤال والمناقشة مع المدرس والطلاب الآخرين حول مضمون
                                        المقطع.إضافة إلى ذلك يوجد قسم للمناقشات العامة حول المادة.
                                    </div>
                                </div>
                                <h3 class='sub-title text-dark'>مجتمع تعليمي</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--end rwaq-board-->

            <div class="rwaq-students">
                <div class="container">
                    <h1 class="title text-light">طلاب {{ config('app.name') }}</h1>
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="row item text-right">
                                <div class="col-3 px-1">
                                    <img class="img-fluid" src="https://www.rwaq.org//grey.gif"
                                        data-original="/assets/home/profle-7fc36db536b83e9d1c332c70d7ef85c3ff44e863d5db85ad4bba32155c19c25b.png">
                                </div>
                                <div class="col-9">
                                    <h3 class="sub-title text-light"> الطالب الجامعي</h3>
                                    <p class="text-light">تنمية وزيادة حصيلته المعرفية في مجال تخصصه الدراسي بالانضمام
                                        لمواد ذات علاقة بما يدرسه في الجامعة، ويدرّسها عبر {{ config('app.name') }}
                                        مجاناً نخب أكاديمية
                                        عربية متميزة</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="row item text-right">
                                <div class="col-3 px-1">
                                    <img class="img-fluid" src="https://www.rwaq.org//grey.gif"
                                        data-original="/assets/home/briefcase-c57dd45a7db81a6284c3318ba9925e4bbb075f1921a429534efcd7905dd0c486.png">
                                </div>
                                <div class="col-9">
                                    <h3 class="sub-title text-light">الموظف /العامل</h3>
                                    <p class="text-light">في وقت فراغه بإمكانه دراسة مواد تساعده في تطوير ذاته في مجال
                                        عمله وتخصصه الحالي أو حتى في مجال آخر يرغب في اكتساب مهارات جديدة فيه.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="row item text-right">
                                <div class="col-3 px-1">
                                    <img class="img-fluid" src="https://www.rwaq.org//grey.gif"
                                        data-original="/assets/home/key-d12afb608c20c9f75a5f03fb018326d99e96fa7c249d16de64f3b31a2b055c1a.png">
                                </div>
                                <div class="col-9">
                                    <h3 class="sub-title text-light">الباحث عن العمل</h3>
                                    <p class="text-light">لديه الكثير من الوقت وبعض الفضول الإيجابي، ربما تعلّم شيء
                                        جديد في تخصص معين يثير اهتمامه ويساعده في تطوير مهاراته، ويفتح له آفاق جديدة
                                        للدخول في الحياة العملية.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="row item text-right">
                                <div class="col-3 px-1">">
                                    <img class="img-fluid" src="https://www.rwaq.org//grey.gif"
                                        data-original="/assets/home/booklet-a97174de7703e71a89d481c285f3b01da8f1fbb06ca9a7ffe8cdbf505c1aa8fc.png">
                                </div>
                                <div class="col-9">
                                    <h3 class="sub-title text-light">الباحث عن المعرفة</h3>
                                    <p class="text-light">يستمتع بالتعلم والاستزادة المعرفية لذاتها، لديه فضول استكشاف
                                        معرفي في تخصصه العملي أو حتى تخصص جديد لا يعمل فيه ولم يدرسه في الجامعة من قبل،
                                        يسعى للعلم ويبحث عن المعرفة لذاتها ولملئ فضوله ونهمه.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="clearfix">
                        <div class="centered-buttons">
                            <a class="site-btn btn text-white call-to-action btn-lg" data-toggle="modal"
                                role="button" href="#signup-modal" title="انضم ل{{ config('app.name') }} الآن!"
                                id="signup-id1" rel="nofollow">انضم إلى
                                طلاب {{ config('app.name') }} الآن</a>
                        </div>
                    </div>

                </div>
            </div>
            <!--end rwaq-students-->


            <!--end rwaq-press-->


            <!--end rwaq-mobile-->

            <div id="subscribe-block">
                <div id="mc_embed_signup" class="subscribe-block">
                    <div class="news-letters">
                        <i class="site-icons icon-mail"></i>
                        <div class="news-letters-info">
                            <div class="subscribe-title">اشترك في قائمة {{ config('app.name') }} البريدية</div>
                            <div class="help-block d-block">
                                فور التحاقك بالقائمة البريدية فسوف يصلك بريد الكتروني بكل ما هو جديد في
                                <strong>{{ config('app.name') }}</strong>
                            </div>
                        </div>
                    </div>
                    @if (session()->has('msg'))
                        <p style="float: right" class="text-success">
                            {{ session('msg') }}
                        </p>
                    @endif
                    <form action="{{ route('subscribe') }}" method="post">
                        @csrf
                        <input placeholder="اكتب البريد الإلكترونى" type="email" required name="email"
                            class="form-control mt-3">
                        <button class="btn btn-primary my-2" type="submit">اشترك الآن</button>
                    </form>
                </div>
            </div>


            <!-- Contact begin -->
            <div id="contact" class="container-fluid home-section">
                <div class="row home-row">
                    <div class="col-md-7 footer-nav">
                        <ul class="clearfix">
                            <li><a href="{{ url('/') }}">الرئيسية</a></li>
                            <li><a href="{{ route('courses.all') }}">تصفح المواد</a></li>
                            <li><a href="{{ route('terms') }}">سياسة الخصوصية</a></li>
                        </ul>

                        <ul class="clearfix">
                            <li><a target="_blank" href="{{ route('instructor.register') }}">انضم كمحاضر</a>
                            </li>

                        </ul>

                        <div class="copyright">
                            <p>جميع الحقوق محفوظة © {{ config('app.name') }}</p>
                        </div>
                    </div>
                    @include('user.layouts.connect')

                </div>
            </div>
        </div>
    </div>
    <!-- Contact end -->


    @include('user.layouts.signup')
    @include('user.layouts.signin')
    @include('user.layouts.password-modal')


    <script>
        $(document).ready(function() {
            $('a').on('click', function(event) {
                event.preventDefault();
                var url = $(this).attr('href');
                $.get(url, function(data) {
                    console.log(url)
                    if (url == '#' || url == 'javascript:void(0)') {
                        $('section.center').html(data);
                        event.preventDefault();
                    } else {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>

    <script>
        $(function() {
            $('.tool-tip').tooltip('hide');
        });
    </script>
    <link rel="stylesheet" media="screen"
        href="{{ asset('assets/owel-carousel-f7a1f939abb04ad357a672a848f42b8e0932587a43ef81cff465da91e3474c85.css') }}" />

    <script>
        $(document).ready(function() {

            $('#remember_password_id').click(function() {
                $('#password-modal').addClass('show')
                $('#password-modal').addClass('fade')
                $('#password-modal').css('display', 'block')

            });

            $('.close-modal').click(function() {
                $('#password-modal').removeClass('show')
                $('#signin-modal').removeClass('show')
                $('#signup-modal').removeClass('show')
                $('#password-modal').css('display', 'none')
                $('#signin-modal').css('display', 'none')
                $('#signup-modal').css('display', 'none')

            })

        });

        $(window).resize(function() {
            $('#homepage_content').css('height', $(window).height());
        });

        if (!$('#carouselTwo > .owl-wrapper-outer').length) { // to avoid reexecution when visiting from browser back button
            $("#carouselTwo").owlCarousel(slider_options());
        }

        if (!$('#carouselOne > .owl-wrapper-outer').length) { // to avoid reexecution when visiting from browser back button
            $("#carouselOne").owlCarousel(slider_options());
        }

        function slider_options() {
            return {
                items: 3, //3 items above 1000px browser width
                itemsDesktop: [1000, 3], //5 items between 1000px and 901px

                // Navigation
                navigation: true,
                navigationText: [
                    "<i class='icon-chevron-left icon-white'></i>",
                    "<i class='icon-chevron-right icon-white'></i>"
                ],

                // Direction
                startPosition: -1,
                autoPlayDirection: "rtl",
                afterAction: rtlCallback,
                beforeInit: rtlSwapItems,

                // Responsive
                itemsDesktopSmall: [900, 2], // 3 items betweem 900px and 601px
                itemsTablet: [600, 1], //2 items between 600 and 0;
                itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
            }
        }

        function rtlSwapItems(el) {
            el.children().each(function(i, e) {
                $(e).parent().prepend($(e));
            })
        }

        function rtlCallback(el) {
            var pagination = el.find('.owl-pagination');
            var numbers = pagination.find('.owl-numbers');
            var pages = pagination.find('.owl-page');
            var numbersLenght = numbers.length;

            pages.each(function(i, e) {
                var $e = $(e);
                if ($e.hasClass('active')) {
                    $e.siblings().andSelf().removeClass('hide-page')
                    $e.prev().prevAll().addClass('hide-page');
                    $e.next().nextAll().addClass('hide-page');
                }
            });

            if (numbers.eq(0).data('owl-flipped') === true) {
                return false
            }
        }
    </script>
</body>

</html>

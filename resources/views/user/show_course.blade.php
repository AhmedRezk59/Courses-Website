<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en" prefix="og: http://ogp.me/ns#">
<!--<![endif]-->

<!-- Mirrored from www.rwaq.org/courses/agile-project-management1 by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Jul 2023 11:38:50 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $course->name }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ config('app.name') }} {{ $course->discription }}" />
    <meta property="og:title" content="{{ $course->name }}" />

    <meta property="og:description" content="{{ config('app.name') }}" />

    <link rel="stylesheet" media="screen"
        href="{{ asset('assets/organizations-6c972d2e136900c44de0779b806edff105f6c9ee069a368922dd7b8ffb4142fd.css') }}" />
    <link rel="stylesheet" media="screen"
        href="{{ asset('assets/wall-e1aaa40f098fbd22582c5295e7aa6fde0e9f4870239adf68f9bee66710e76951.css') }}" />
    <link rel="stylesheet" media="screen"
        href="{{ asset('assets/messages-7890ff8c8f0110866d8a3e3d519e5cbb9a35b1055f03e7802469ea9430e526ba.css') }}" />
    <link rel="stylesheet" media="all"
        href="{{ asset('assets/application-b6d07872d2ff763651a4ccec6b8667d8e06bac3fd96f1396300197749ed51f39.css') }}" />
    <!--[if IE 8]><link rel="stylesheet" media="all" href="/assets/ie-139291a5bb4ab2173e95e9b5bc0d5fb882d845cdaf4ce46db9aff762d93c5bde.css')}}" /><![endif]-->


    <!--[if lte IE 7]><script src="/assets/lte-ie7-ceb763da1bde4df6f6c0af5900157978077df0765e1cd426dd0d499f75bc0e6e.js"></script><![endif]-->
    <script
        src="{{ asset('assets/modernizr-2.0.6.min-aeb0af4c8ddec601badcf770a5409f155443791838945ac1087cb7bbde9dad5a') }}.js">
    </script>
    <script src="{{ asset('assets/application-06ec9be474f0937930d3aa4066be918b4666e08f6d4e299c0cbd8c8ec008f545.js') }}"
        data-turbolinks-track="true"></script>

    <script
        src="{{ asset('assets/jquery-ui/sortable-867af190e9fb82832ed6661881b4d0a34f0f64c299d3cf8b98d2198a2b1fa4c5') }}.js">
    </script>
</head>

<body class="rtl">

    <div class="container-fluid">
        <div class="row">
            <div class="subject-cover">
                <div class="cover-img" repeat scroll center bottom transparent;>

                </div>
                <div class="page-header">
                    <div class="header-inner">
                        <div class="clearfix">
                            <h1 class="brand small-logo">
                                @include('user.layouts.logo')

                            </h1>
                        </div>
                    </div>
                </div>


                <div class="content-cover mobile-disable">
                    <div class="cover-content change-top">
                        <div class="cover-content-inner">

                            <div class="side-block">
                                <!-- side block start -->
                                <div class='final-details-for-couse-info'>
                                    <div class='price-and-pay-and-join'>
                                        @if (auth()->check())

                                            @if (!auth()->user()->own($course->id))

                                                @if ($course->is_paid == true)
                                                    <p class='price-side-bar mb-1'>{{ $course->final_price }}
                                                        {{ $currency_name }}
                                                    </p>
                                                    <form action="{{ route('join.pay', $course) }}" method="post">
                                                        @csrf
                                                        <button class="btn btn-primary w-100  btn-lg "
                                                            type="submit">التحق
                                                            بالمادة الآن!</button>
                                                    </form>
                                                    <br>
                                                    <form action="{{ route('join.pay.wallet', $course) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-primary w-100  btn-lg "
                                                            type="submit">ادفع باستخدام المحافظ الإلكترونية</button>
                                                    </form>
                                                @else
                                                    <form method="post"
                                                        action="{{ route('join.donot.pay', $course) }}">
                                                        @csrf
                                                        <button class="btn btn-primary w-100  btn-lg "
                                                            type="submit">!التحق
                                                            بالمادة
                                                            الآن</button>
                                                    </form>
                                                @endif
                                            @else
                                                <a href="{{ route('courses.course.contents', $course->id) }}"
                                                    class="btn btn-primary w-100  btn-lg " type="submit">زيارة محتوى
                                                    المادة</a>
                                            @endif
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-primary w-100  btn-lg "
                                                type="submit">تسجيل الدخول لتتمكن من الالتحاق</a>
                                        @endif


                                    </div>
                                    <hr>
                                    <div class='details-info-for-course'>
                                        <p class='details-info-for-course-title'> يتضمن حتى الآن </p>
                                        <p class="details-info-for-course-include">{{ $course->lessons_count }} محاضرة
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cover-info">
                    <div class="cover-info-content">
                        <h2 class="subject-title"><a
                                href="{{ route('courses.show', $course) }}">{{ $course->name }}</a></h2>
                        <div class="subject-instructor">
                            <div class="send-instructor">
                                <p>
                                    <a
                                        href="{{ route('instructor.page', $course->instructor) }}">{{ $course->instructor->name }}</a>
                                </p>
                            </div>
                        </div>

                        <p class="subject-date">
                            {{ $course->date_from_to }}
                        </p>
                        @guest

                            <div class="cover-actions-container mb-2">
                                <div class="cover-actions">
                                    <a class="text-white" data-toggle="modal" role="button" id="signin-id"
                                        href="#signin-modal" rel="nofollow">دخول</a>
                                    <a class="site-btn btn call-to-action small-btn" data-toggle="modal" role="button"
                                        id="signup-id" href="#signup-modal" rel="nofollow">انضم
                                        ل{{ config('app.name') }}
                                        الآن!</a>
                                </div>
                            </div>
                        @endguest

                    </div>
                </div>



            </div>


            <div class="wrapper">
                <div class="wrapper-inner">
                    <div class="main">



                        <div class="page-content">
                            <div id='flash_messages'>

                            </div>
                            <div id="course_show">
                                <div id="flash_errors" class="field_with_errors"></div>


                                <div id='organization' class="course-show-page mobile-padding organization-dev">

                                    <div class="page-title lec-title position-relative">
                                        <h2 class="mb-2 w-75 pl-3">{{ $course->name }}</h2>
                                        <div class="top-control">




                                        </div>
                                    </div>




                                    <div class="video  widescreen">

                                        <video width="700" height="450"
                                            src="{{ route('user.get.trailer', $course) }}" frameborder="0"
                                            allowfullscreen controls preload="metadata"></video>

                                    </div>

                                    <div class="row subject-action no-gutters">
                                        <div class="col-md-8">
                                            <div class=" clearfix">
                                                <p class="subject-date">
                                                    {{ $course->date_from_to }}
                                                </p>
                                                <div id='social' class="addthis_toolbox addthis_default_style ">
                                                    <a class="addthis_button_preferred_1"></a>
                                                    <a class="addthis_button_preferred_2"></a>
                                                    <a class="addthis_button_preferred_3"></a>
                                                    <a class="addthis_button_compact"></a>
                                                    <a id='counter'
                                                        class="addthis_counter addthis_bubble_style"></a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            @if (auth()->check())
                                                @if (!auth()->user()->own($course->id))
                                                    @if ($course->is_paid == true)
                                                        <form action="{{ route('join.pay', $course) }}"
                                                            method="post">
                                                            @csrf
                                                            <button class="btn btn-primary w-100  btn-lg "
                                                                type="submit">التحق
                                                                بالمادة الآن!<button>
                                                        </form>
                                                    @else
                                                        <form method="post"
                                                            action="{{ route('join.donot.pay', $course) }}">
                                                            @csrf
                                                            <button class="btn btn-primary w-100  btn-lg "
                                                                type="submit">!التحق
                                                                بالمادة
                                                                الآن<button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <a href="{{ route('courses.course.contents', $course->id) }}"
                                                        class="btn btn-primary w-100  btn-lg ">زيارة محتوى
                                                        المادة</a>
                                                @endif
                                            @else
                                                <a href="{{ route('login') }}" class="btn btn-primary w-100  btn-lg "
                                                    type="submit">تسجيل الدخول لتتمكن من الالتحاق</a>
                                            @endif


                                        </div>

                                    </div>


                                    <div class="course-content">
                                        <div class="container-fluid lecture_desc info-item " id="summary_truncated">
                                            <p class="text-wrap">

                                                <strong><span
                                                        style="color:#666666;font-family:Nassim Arabic Regular , Geeza Pro , Arial , Helvetica , sans-serif;"><span
                                                            style="font-size:18px;">{{ $course->description }}</span></strong>
                                            </p>
                                        </div>

                                        <div id="instructors" class="container-fluid instructor-info info-item pr-0">
                                            <div class="item-title">
                                                <h5 class="mb-0"> <i class="icon-user-4  site-icons"
                                                        aria-hidden="true"></i>عن المحاضر</h5>
                                            </div>


                                            <div class="row mb-3 pb-5 border-bottom">
                                                <div class="col-4 col-sm-2 instructor-image clearfix m-auto">
                                                    <a href="{{ route('instructor.page', $course->instructor) }}"
                                                        class="tool-tip" title="اذهب إلى صفحة المحاضر">
                                                        <img class="img-fluid"
                                                            src="{{ isset($course->instructor->avatar) && $course->instructor->avatar != false ? route('instructor.avatar', $course->instructor) : asset('default-logo.png') }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="col-12 col-sm-10 instructor-details">
                                                    <a class="user-link tool-tip"
                                                        href="{{ route('instructor.page', $course->instructor) }}"
                                                        title="اذهب إلى صفحة المحاضر">
                                                        {{ $course->instructor->name }}
                                                    </a>
                                                    <p class="text-center text-sm-right"> </p>

                                                    <div id="bio_2221606_truncated">
                                                        <p>{{ $course->instructor->job }}</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="container-fluid subject-content-info info-item">
                                            <div class="item-title">
                                                <h5>الفئة المستهدفة</h5>
                                            </div>
                                            <div class="row-fluid">
                                                {!! $course->target_audience !!}
                                            </div>
                                        </div>
                                        <div class="container-fluid subject-content-info info-item">
                                            <div class="item-title">
                                                <h5>المنهج</h5>
                                            </div>
                                            <div class="row-fluid">
                                                {!! $course->curriculum !!}
                                            </div>
                                        </div>
                                        <div class="container-fluid subject-content-info info-item">
                                            <div class="item-title">
                                                <h5>المخرجات</h5>
                                            </div>
                                            <div class="row-fluid">
                                                {!! $course->outputs !!}
                                            </div>
                                        </div>


                                    </div>
                                </div>




                            </div>

                        </div>
                    </div>
                    @include('user.layouts.footer')

                </div>
            </div>
        </div>
    </div>



    @include('user.layouts.signup')
    @include('user.layouts.signin')
    @include('user.layouts.password-modal')



    <script
        src="{{ asset('assets/jquery-ui/accordion-32228d165e0cb045646cab62fcafa105485f700c438f0876dcf4145656514b87.js') }}">
    </script>


    <script>
        $('.menu-icon').click(function() {
            $('.dropdown-menu').css('visibility', 'visible');
        })
    </script>


</body>

</html>

<html>
<!--<![endif]-->

<head>
    <link rel="stylesheet" media="screen"
        href="/assets/organizations-6c972d2e136900c44de0779b806edff105f6c9ee069a368922dd7b8ffb4142fd.css">
    <link rel="stylesheet" media="screen"
        href="/assets/wall-e1aaa40f098fbd22582c5295e7aa6fde0e9f4870239adf68f9bee66710e76951.css">
    <link rel="stylesheet" media="screen"
        href="/assets/messages-7890ff8c8f0110866d8a3e3d519e5cbb9a35b1055f03e7802469ea9430e526ba.css">
    <link rel="stylesheet" media="all"
        href="/assets/application-b6d07872d2ff763651a4ccec6b8667d8e06bac3fd96f1396300197749ed51f39.css">
    <!--[if IE 8]><link rel="stylesheet" media="all" href="/assets/ie-139291a5bb4ab2173e95e9b5bc0d5fb882d845cdaf4ce46db9aff762d93c5bde.css" /><![endif]-->

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!--[if lte IE 7]><script src="/assets/lte-ie7-ceb763da1bde4df6f6c0af5900157978077df0765e1cd426dd0d499f75bc0e6e.js"></script><![endif]-->
    <script src="/assets/modernizr-2.0.6.min-aeb0af4c8ddec601badcf770a5409f155443791838945ac1087cb7bbde9dad5a.js"></script>
    <script src="/assets/application-06ec9be474f0937930d3aa4066be918b4666e08f6d4e299c0cbd8c8ec008f545.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.0.6/jquery.mousewheel.min.js"></script>
    <script src="/assets/jquery-ui/sortable-867af190e9fb82832ed6661881b4d0a34f0f64c299d3cf8b98d2198a2b1fa4c5.js"></script>



    <script src="/assets/easypiechart.min-e8055c46307f7e18708f1c27c7f56728b33e8a9a62e02e817ed2986cdf11c688.js"></script>



    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $instructor->name }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ config('app.name') }} - المنصة العربية للتعليم المفتوح">
    <meta name="keywords"
        content="تعليم ,تدريس ,مواد ,مواد ,{{ config('app.name') }}, MOOC, online courses, online education, elearning">
</head>

<body class="rtl pc">


    <div class="container-fluid">
        <div class="row">
            <div class="subject-cover">
                <div class="cover-img"></div>
                <div class="page-header">
                    <div class="header-inner">
                        <div class="clearfix">
                            <h1 class="brand small-logo">
                                @include('user.layouts.logo')

                            </h1>
                            @include('user.layouts.navbar')
                        </div>
                    </div>
                </div>

                <div class="cover-info cover-user">
                    <div class="cover-info-content">
                        <div class="user-small user_cover">
                            <a class="user-link_cover" href="/users/rezk59315-20170918232832">
                                @if (!isset(auth()->user()->avatar))
                                    <img src="{{ asset('default-logo.png') }}" style="display: inline;">
                                @else
                                    <img src="{{ route('get.avatar', auth()->user()) }}" style="display: inline;">
                                @endif
                                <span>{{ $instructor->name }}</span>
                            </a> <span class="subject-date text-white"> </span>
                        </div>
                    </div>
                </div>

            </div>



            <div class="wrapper">
                <div class="wrapper-inner">
                    <div class="main">

                        <div class="page-content">
                            <div id="flash_messages">

                            </div>
                            <div class="mobile-padding profile-page-content">

                                <div class="page-title border-0">
                                    <h4>
                                        <i class="icon-user-4 float-right site-icons prof-icon ml-1"></i>
                                        {{ $instructor->name }}
                                    </h4>
                                    <p class="job-des">{{ $instructor->job }}</p>
                                </div>


                                <div class="container info-item">
                                    <div class="bio">
                                        <div class="row">
                                            <div class="col col-lg-4 instructor-image clearfix">
                                                <img class="img-fluid w-50 mx-5 profile-img"
                                                    src="{{ isset($instructor->avatar) && $instructor->avatar != '' ? route('instructor.get.thumbinal', $instructor->id) : asset('default-logo.png') }}"
                                                    style="display: inline;">

                                            </div>
                                            <div class="col-lg-8">
                                                <div class="bio-show-more mt-3">
                                                    <div class="bio-text-expanded">

                                                        {{ $instructor->description }}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid info-item courses-list-grid mt-4">
                                    <div class="item-title">
                                        <h5>أقوم بتدريس</h5>
                                    </div>
                                    <div class="row courses-list usr-profile">
                                        @foreach ($instructor->courses as $course)
                                            <div class="col-sm-4 mb-3">
                                                <div class="course-pic position-relative">
                                                    <h4 class="courses-list-card-header"> <a class="text-white f3"
                                                            href="{{ route('courses.show', $course) }}">{{ $course->name }}</a>
                                                    </h4>
                                                    <span class="course-cat">علوم الحاسب والرّقمنة</span>
                                                    <div class="course-pic-container">
                                                        <img class="img-fluid w-100"
                                                            src="{{ route('user.get.thmbinal', $course) }}"
                                                            style="display: inline;">
                                                    </div>
                                                </div>
                                                <div class="course-info p-0 border bg-light">
                                                    <div
                                                        class="row pt-3 no-gutters no-gutters clearfix vertical-view one-instructor   ">
                                                        <div class="row no-gutters lecturer-block px-0">
                                                            <a class="lecturer-photo col-md-4 p-0"
                                                                href="{{ route('instructor.page', $instructor->id) }}">
                                                                <img class="lecturer-dp img-fluid mx-2"
                                                                    src="{{ isset($instructor->avatar) && $instructor->avatar != '' ? route('instructor.get.thumbinal', $instructor->id) : asset('default-logo.png') }}"
                                                                    style="display: inline;">
                                                            </a>
                                                            <div class="lecturer-data col-md-8 ">
                                                                <a title="أ.ليث الغول"
                                                                    href="{{ route('instructor.page', $instructor->id) }}">
                                                                    <span>{{ $instructor->name }}</span>
                                                                </a>
                                                                <p title="مهندس برمجيات ومطور بلوك تشین">
                                                                    {{ $instructor->job }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="subject-time mb-0">
                                                        <i class="site-icons pull-right icon-calendar mx-2 pt-1"></i>
                                                        {{ $course->date_from_to }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach

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
    <script>
        $('.menu-icon').click(function() {
            $('.dropdown-menu').css('visibility', 'visible');
        })
    </script>
</body>

</html>

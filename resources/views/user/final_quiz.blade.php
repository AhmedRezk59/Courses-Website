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
    <link rel="icon" type="image/x-icon" href="{{ asset('website-logo.jpeg') }}">


    <!--[if lte IE 7]><script src="/assets/lte-ie7-ceb763da1bde4df6f6c0af5900157978077df0765e1cd426dd0d499f75bc0e6e.js"></script><![endif]-->
    <script src="/assets/modernizr-2.0.6.min-aeb0af4c8ddec601badcf770a5409f155443791838945ac1087cb7bbde9dad5a.js"></script>
    <script src="/assets/application-06ec9be474f0937930d3aa4066be918b4666e08f6d4e299c0cbd8c8ec008f545.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.0.6/jquery.mousewheel.min.js"></script>
    <script src="/assets/jquery-ui/sortable-867af190e9fb82832ed6661881b4d0a34f0f64c299d3cf8b98d2198a2b1fa4c5.js"></script>




    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title> {{ $course->name }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ config('app.name') }} - المنصة العربية للتعليم المفتوح">
    <meta name="keywords"
        content="تعليم ,تدريس ,مواد ,مواد ,{{ config('app.name') }}, MOOC, online courses, online education, elearning, Customer_Care3">
    @livewireStyles
</head>

<body class="rtl pc">


    <div class="container-fluid">
        <div class="row">
            <div class="subject-cover">
                <div class="cover-img" style="background-image:url({{ route('user.get.thmbinal', $course->id) }})"
                    repeat="" scroll="" center="" bottom="" transparent;=""></div>
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



                <div class="cover-info">
                    <div class="cover-info-content">
                        <h2 class="subject-title"><a
                                href="{{ route('courses.course.contents', $course->id) }}">{{ $course->name }}</a></h2>
                        <div class="subject-instructor">
                            <!-- <strong>:</strong> -->
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

                    </div>
                </div>



            </div>

            <div class="wrapper">
                <div class="wrapper-inner">
                    <div class="main">



                        <div class="page-content">


                            <div class="page-content">


                                <div id="wall" class="mobile-padding lecture-page-content">
                                    <div class="page-title lec-title position-relative">
                                        <h2 class="w-75 pl-3">الإختبار النهائى</h2>

                                    </div>



                                    <div class="course-content">

                                        <div id="mark-as-read-div">
                                            <div class="subject-action complete-task read-action-dev clearfix mt-3">
                                                <livewire:complete-final-quiz :course="$course" :questions="$questions"/>


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





    @livewireScripts

</body>

</html>

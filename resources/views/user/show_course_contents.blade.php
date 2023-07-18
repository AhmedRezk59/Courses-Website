<html
    class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths"
    lang="en" prefix="og: http://ogp.me/ns#"
    data-useragent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82">
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
    <meta property="og:title" content="المحتويات - العناية بالعملاء (عملاء مدى الحياة)">
    <meta property="og:type" content="website">
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
                                    <a href="{{ route('instructor.page', $course->instructor) }}"><i
                                            class="icon-envelope site-icons tool-tip" title=""
                                            href="{{ route('instructor.page', $course->instructor) }}"
                                            data-original-title="راسل المحاضر"></i></a>&nbsp;
                                    <a
                                        href="{{ route('instructor.page', $course->instructor) }}">{{ $course->instructor->name }}</a>
                                </p>
                            </div>
                        </div>

                        <p class="subject-date">
                            {{ $course->date_from_to }}
                        </p>
                        <div class="cover-actions-container">
                        </div>
                    </div>
                </div>



            </div>

            <livewire:course-contents :course="$course" />
        </div>
    </div>

    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script>
        $(function() {
            $('a.disabled-links').attr('href', 'javascript:void(0)')
            $('form.disabled-links input:submit').attr('disabled', 'true')
        });
    </script>
    <script src="/assets/jquery-ui/accordion-32228d165e0cb045646cab62fcafa105485f700c438f0876dcf4145656514b87.js"></script>
    <script>
        $('a.disabled-links').attr('href', 'javascript:void(0)')
        $('a.disabled-links').attr('data-confirm', '')
        $('form.disabled-links input:submit').attr('disabled', 'true')
        $('form.disabled-links input:submit').attr('data-confirm', '')
    </script>
    <script src="/assets/jquery-ui/accordion-32228d165e0cb045646cab62fcafa105485f700c438f0876dcf4145656514b87.js"></script>
    <script>
        $('a.disabled-links').attr('href', 'javascript:void(0)')
        $('form.disabled-links input:submit').attr('disabled', 'true')
    </script>





    @livewireScripts

</body>

</html>

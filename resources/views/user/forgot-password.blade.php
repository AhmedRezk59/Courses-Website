<html
    class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths"
    lang="en" prefix="og: http://ogp.me/ns#"
    data-useragent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79">
<!--<![endif]-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>دخول - {{ config('app.name') }}</title>
    <meta name="description" content="{{ config('app.name') }} - المنصة العربية للتعليم المفتوح">
    <meta name="keywords"
        content="تعليم ,تدريس ,مواد ,مواد ,{{ config('app.name') }}, MOOC, online courses, online education, elearning">
    <meta property="og:title" content="دخول">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <meta property="og:description" content="{{ config('app.name') }} - المنصة العربية للتعليم المفتوح">
    <link rel="icon" type="image/x-icon" href="{{ asset('website-logo.jpeg') }}">

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
    <script src="{{ asset('assets/application-06ec9be474f0937930d3aa4066be918b4666e08f6d4e299c0cbd8c8ec008f545.js') }}"
        data-turbolinks-track="true"></script>

    <script src="/assets/jquery-ui/sortable-867af190e9fb82832ed6661881b4d0a34f0f64c299d3cf8b98d2198a2b1fa4c5.js"></script>




</head>

<body class="rtl pc" data-new-gr-c-s-check-loaded="14.1033.0" data-gr-ext-installed="">


    <div class="loader" id="loader" style="display:none;"></div>
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
                        </div>
                    </div>
                </div>


            </div>


            <div class="wrapper">
                <div class="wrapper-inner">
                    <div class="main">

                        <div class="page-content">
                            <div class="mobile-padding">
                                <div class="well form_container registration-forms login-form">
                                    <h5 class="form-title mb-3">
                                        <i class="icon-key-2 site-icons"></i>دخول
                                    </h5>

                                    <form class="form-horizontal" id="new_user" action="{{ route('password.email') }}"
                                        accept-charset="UTF-8" method="post">
                                        @csrf
                                        <ul class="list-unstyled mt-3">

                                            <li>
                                                <div class="form-group">

                                                    <div class="d-flex">
                                                        <label for="inputEmail">البريد الإلكتروني</label>
                                                        <abbr class="req">*</abbr>
                                                    </div>
                                                    <input autofocus="autofocus" id="inputEmail" class="form-control"
                                                        type="email" value="{{ old('email') }}" name="email"
                                                        required>
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger"
                                                        style="margin-right: 30px !important" />
                                                    <x-auth-session-status class="mb-4 text-success"
                                                        :status="session('status')" />

                                                </div>
                                            </li>
                                        </ul>

                                        <div class="form-group text-left full-width-controls">
                                            <a class="btn btn-link" href="/">إلغاء</a>
                                            <button type="submit" class="btn btn-primary small-btn">ارسال
                                                التعليمات</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <script type="text/javascript"></script>
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

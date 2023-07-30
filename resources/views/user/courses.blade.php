<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>تصفح المواد - {{ config('app.name') }}</title>
    <meta name="description" content="{{ config('app.name') }} - المنصة العربية للتعليم المفتوح">
    <meta name="keywords"
        content="تعليم ,تدريس ,مواد ,مواد ,{{ config('app.name') }}, MOOC, online courses, online education, elearning">
    <meta property="og:url" content="{{ config('app.url') }}">

    <meta property="og:description" content="{{ config('app.name') }} - المنصة العربية للتعليم المفتوح">

    <link rel="stylesheet" media="screen"
        href="{{ asset('assets/organizations-6c972d2e136900c44de0779b806edff105f6c9ee069a368922dd7b8ffb4142fd.css') }}">
    <link rel="stylesheet" media="screen"
        href="{{ asset('assets/wall-e1aaa40f098fbd22582c5295e7aa6fde0e9f4870239adf68f9bee66710e76951.css') }}">
    <link rel="stylesheet" media="screen"
        href="{{ asset('assets/messages-7890ff8c8f0110866d8a3e3d519e5cbb9a35b1055f03e7802469ea9430e526ba.css') }}">
    <link rel="stylesheet" media="all"
        href="{{ asset('assets/application-b6d07872d2ff763651a4ccec6b8667d8e06bac3fd96f1396300197749ed51f39.css') }}">
    <!--[if IE 8]><link rel="stylesheet" media="all" href="/assets/ie-139291a5bb4ab2173e95e9b5bc0d5fb882d845cdaf4ce46db9aff762d93c5bde.css" /><![endif]-->
    <link rel="icon" type="image/x-icon" href="{{ asset('website-logo.jpeg') }}">

    @livewireStyles
    <!--[if lte IE 7]><script src="/assets/lte-ie7-ceb763da1bde4df6f6c0af5900157978077df0765e1cd426dd0d499f75bc0e6e.js"></script><![endif]-->
    <script
        src="{{ asset('assets/modernizr-2.0.6.min-aeb0af4c8ddec601badcf770a5409f155443791838945ac1087cb7bbde9dad5a.js') }}">
    </script>
    <script
        src="{{ asset('assets/jquery-ui/sortable-867af190e9fb82832ed6661881b4d0a34f0f64c299d3cf8b98d2198a2b1fa4c5.js') }}">
    </script>
    <script src="{{ asset('assets/application-06ec9be474f0937930d3aa4066be918b4666e08f6d4e299c0cbd8c8ec008f545.js') }}">
    </script>

</head>

<body class="rtl pc">

    @php
        $settings = DB::table('website_settings')->select('courses_cover')->first();
    @endphp

    <div class="container-fluid">
        <div class="row">
            <div class="subject-cover">
                <div class="cover-img" style="background-image: url({{isset($settings->courses_cover) ? asset('images/' . $settings->courses_cover) : 'https://arabic-mooc-staging.s3.amazonaws.com/uploads/rwaq_image_params/sidebar.jpeg'}})"></div>
                
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
                @auth

                    <div class="cover-info cover-user">
                        <div class="cover-info-content">
                            <div class="user-small user_cover">
                                <a class="user-link_cover" href="{{ route('user.page') }}">

                                    @if (!isset(auth()->user()->avatar))
                                        <img src="{{ asset('default-logo.png') }}" style="display: inline;">
                                    @else
                                        <img src="{{ route('get.avatar', auth()->user()) }}" style="display: inline;">
                                    @endif
                                    <span>{{ auth()->user()->name }}</span>
                                </a> <span class="subject-date text-white"> </span>
                            </div>
                        </div>
                    </div>
                @endauth

            </div>
            <div class="content-cover cover-filter">
                <div class="cover-content overthrow mCustomScrollbar _mCS_1">
                    <div class="mCustomScrollBox mCS-light-thin" id="mCSB_1"
                        style="position:relative; height:100%; overflow:hidden; max-width:100%;">
                        <div class="mCSB_container" style="position:relative; top:0;">
                            <div class="cover-content-inner">
                                <div class="search-container">
                                    <div class="search-field">
                                        @livewire('search-courses-name')
                                    </div>
                                </div>

                                @livewire('filter-courses-price')
                                @livewire('filter-courses-categories')

                            </div>
                        </div>
                        <div class="mCSB_scrollTools" style="position: absolute; display: block; opacity: 0;">
                            <div class="mCSB_draggerContainer">
                                <div class="mCSB_dragger" style="position: absolute; height: 358px; top: 0px;"
                                    oncontextmenu="return false;">
                                    <div class="mCSB_dragger_bar" style="position: relative; line-height: 358px;">
                                    </div>
                                </div>
                                <div class="mCSB_draggerRail"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="wrapper">
                <div class="wrapper-inner">
                    <div class="main">

                        @livewire('filtered-courses')
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
    @livewireScripts
</body>

</html>

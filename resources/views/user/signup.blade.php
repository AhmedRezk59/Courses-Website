<html>
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
    <script src="/assets/jquery-ui/sortable-867af190e9fb82832ed6661881b4d0a34f0f64c299d3cf8b98d2198a2b1fa4c5.js"></script>
    <script src="{{ asset('assets/application-06ec9be474f0937930d3aa4066be918b4666e08f6d4e299c0cbd8c8ec008f545.js') }}"
        data-turbolinks-track="true"></script>

    <script>
        $('.menu-icon').click(function() {
            $('.dropdown-menu').css('visibility', 'visible');
        })
    </script>


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

                                    <form class="form-horizontal" id="new_user" action="{{ route('register') }}"
                                        accept-charset="UTF-8" method="post">
                                        @csrf
                                        <div class="border border-sm-0 p-3 bg-white">
                                            <div class="form-group">
                                                <div class="d-flex">
                                                    <label for="inputNameForm">الاسم الاول</label>
                                                    <abbr class="req">*</abbr>
                                                </div>
                                                <input autofocus="autofocus" id="inputNameForm" class="form-control"
                                                    type="text" value="{{ old('first_name') }}" name="first_name" />
                                                <x-input-error :messages="$errors->get('first_name')" class="mt-2 text-danger"
                                                    style="margin-right: 30px !important" />

                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex">
                                                    <label for="inputNameForm">الاسم الأخير</label>
                                                    <abbr class="req">*</abbr>
                                                </div>
                                                <input autofocus="autofocus" id="inputNameForm" class="form-control"
                                                    type="text" value="{{ old('last_name') }}" name="last_name" />
                                                <x-input-error :messages="$errors->get('last_name')" class="mt-2 text-danger"
                                                    style="margin-right: 30px !important" />

                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex">
                                                    <label for="inputNameForm">رقم الهاتف</label>
                                                    <abbr class="req">*</abbr>
                                                </div>
                                                <input autofocus="autofocus" id="inputNameForm" class="form-control"
                                                    type="text" value="{{ old('phone_number') }}"
                                                    name="phone_number" />
                                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2 text-danger"
                                                    style="margin-right: 30px !important" />

                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex">
                                                    <label for="inputEmailForm">البريد الإلكتروني</label>
                                                    <abbr class="req">*</abbr>
                                                </div>
                                                <input id="inputEmailForm" class="form-control" type="email"
                                                    value="" name="email">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger"
                                                    style="margin-right: 30px !important" />
                                            </div>

                                            <div class="form-group">
                                                <div class="d-flex">
                                                    <label for="inputPasswordForm">كلمة المرور</label>
                                                    <abbr class="req">*</abbr>
                                                </div>
                                                <input id="inputPasswordForm" class="form-control" type="password"
                                                    name="password">
                                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger"
                                                    style="margin-right: 30px !important" />
                                            </div>

                                            <div>
                                                <div class="form-group">
                                                    <div class="d-flex">
                                                        <label for="inputPasswordConForm">تأكيد كلمة المرور</label>
                                                        <abbr class="req">*</abbr>
                                                    </div>
                                                    <input id="inputPasswordConForm" class="form-control"
                                                        type="password" name="password_confirmation">
                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger"
                                                        style="margin-right: 30px !important" />
                                                </div>
                                            </div>

                                            <div>
                                                <div class="form-group login-with-error-div">
                                                    <div class="d-flex">
                                                        <label for="user_شروط الاستخدام">شروط الاستخدام</label>
                                                        <abbr class="req">*</abbr>
                                                    </div>

                                                    <label class="form-check-label px-1">بإنشائك لهذا الحساب أنت توافق
                                                        على <a href="{{ route('terms') }}"> شروط استخدام
                                                        </a>المنصة</label>
                                                </div>
                                            </div>






                                            <p> لديك حساب؟
                                                <a class="links" aria-hidden="true" href="{{ route('login') }}"
                                                    role="button">دخول</a>
                                            </p>

                                        </div>

                                        <div class="form-group text-left mt-3">
                                            <a class="links btn btn-link text-secondary" href="/">إلغاء</a>
                                            <input type="submit" name="commit" value="اشترك"
                                                class="site-btn btn btn-primary" id="sign_up_form"
                                                data-disable-with="اشترك">
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

</body>

</html>

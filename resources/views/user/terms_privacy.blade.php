<html
    class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths"
    lang="en" prefix="og: http://ogp.me/ns#"
    data-useragent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.82">
<!--<![endif]-->

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <link rel="stylesheet" media="screen"
        href="/assets/organizations-6c972d2e136900c44de0779b806edff105f6c9ee069a368922dd7b8ffb4142fd.css"
        data-turbolinks-track="true">
    <link rel="stylesheet" media="screen"
        href="/assets/wall-e1aaa40f098fbd22582c5295e7aa6fde0e9f4870239adf68f9bee66710e76951.css"
        data-turbolinks-track="true">
    <link rel="stylesheet" media="screen"
        href="/assets/messages-7890ff8c8f0110866d8a3e3d519e5cbb9a35b1055f03e7802469ea9430e526ba.css"
        data-turbolinks-track="true">
    <link rel="stylesheet" media="all"
        href="/assets/application-b6d07872d2ff763651a4ccec6b8667d8e06bac3fd96f1396300197749ed51f39.css"
        data-turbolinks-track="true">
    <!--[if IE 8]><link rel="stylesheet" media="all" href="/assets/ie-139291a5bb4ab2173e95e9b5bc0d5fb882d845cdaf4ce46db9aff762d93c5bde.css" /><![endif]-->
    <link rel="icon" type="image/x-icon" href="{{ asset('website-logo.jpeg') }}">


    <!--[if lte IE 7]><script src="/assets/lte-ie7-ceb763da1bde4df6f6c0af5900157978077df0765e1cd426dd0d499f75bc0e6e.js"></script><![endif]-->
    <script src="/assets/modernizr-2.0.6.min-aeb0af4c8ddec601badcf770a5409f155443791838945ac1087cb7bbde9dad5a.js"
        data-turbolinks-track="true"></script>
    <script src="/assets/application-06ec9be474f0937930d3aa4066be918b4666e08f6d4e299c0cbd8c8ec008f545.js"
        data-turbolinks-track="true"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.0.6/jquery.mousewheel.min.js"></script>
    <script src="/assets/jquery-ui/sortable-867af190e9fb82832ed6661881b4d0a34f0f64c299d3cf8b98d2198a2b1fa4c5.js"
        data-turbolinks-track="true"></script>
    <script src="/assets/easypiechart.min-e8055c46307f7e18708f1c27c7f56728b33e8a9a62e02e817ed2986cdf11c688.js"></script>

    <script src="{{ asset('assets/application-06ec9be474f0937930d3aa4066be918b4666e08f6d4e299c0cbd8c8ec008f545.js') }}"
        data-turbolinks-track="true"></script>
    <script>
        $('.menu-icon').click(function() {
            $('.dropdown-menu').css('visibility', 'visible');
        })
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>سياسة الخصوصية - {{ config('app.name') }}</title>
    <meta name="description" content="{{ config('app.name') }} - المنصة العربية للتعليم المفتوح">
    <meta name="keywords"
        content="تعليم ,تدريس ,مواد ,مواد ,{{ config('app.name') }}, MOOC, online courses, online education, elearning">
    <meta property="og:title" content="سياسة الخصوصية">
    <meta property="og:type" content="website">
    <meta property="og:image"
        content="https://arabic-mooc-staging.s3.amazonaws.com/uploads/rwaq_image_params/main_og_image.jpg">
    <meta property="og:description" content="{{ config('app.name') }} - المنصة العربية للتعليم المفتوح">
    <meta name="csrf-param" content="authenticity_token">
    <meta name="csrf-token"
        content="kGPoLhrXVocbLpixJmIEzt1ONMPkGEmgDIe491smTtvvn7TFMGvoT9v5YApSSI0CwzWSR0vARN+zK2NpC3U7Rw==">
    <link rel="shortcut icon" href="https://arabic-mooc-staging.s3.amazonaws.com/uploads/rwaq_image_params/favicon.ico">
</head>

<body class="rtl pc">


    <div class="loader" id="loader" style="display:none;"></div>
    <img class="white-loading"
        src="/assets/loading-white-13bd94b0a31914938eac3711a14afde4ef145e6d389f968fdced5e00e416c424.gif">
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
                            @auth
                                @include('user.layouts.navbar')
                            @endauth
                        </div>
                    </div>
                </div>

                @auth

                    <div class="cover-info cover-user">
                        <div class="cover-info-content">
                            <div class="user-small user_cover">
                                <a class="user-link_cover" href="{{ route('user.page') }}">
                                    <img src="{{ isset(auth()->user()->avatar) ? route('get.avatar', auth()->user()->id) : asset('default-logo.png') }}"
                                        style="display: inline;">
                                    <span>{{ auth()->user()->name }}</span>
                                </a> <span class="subject-date text-white"> </span>
                            </div>
                        </div>
                    </div>
                @endauth

            </div>



            <div class="wrapper">
                <div class="wrapper-inner">
                    <div class="main">

                        <div class="page-content">
                            <div id="flash_messages">

                            </div>
                            <div class="static-content mobile-padding">
                                <h3 class="mobile">سياسة الخصوصية</h3>
                                <p>تمثل سياسة الخصوصية الحالية ("السياسة") خطوطنا الإرشادية الداخلية الخاصة بإدارة
                                    وموظفي ومتعاقدي {{ config('app.name') }} في سياق عمل الموقع الإلكتروني
                                    {{ config('app.url') }}،
                                    والتي تستتبع حقيقة
                                    أن المستخدمين سيقومون بتقديم ومشاركة معلومات معينة، يُعدّ بعضها شخصياً، بينما يعدّ
                                    البعض الآخر معلومات معلومة على المشاع (تعرف مجتمعة باسم "معلومات المستخدِم").</p>
                                <p>سيكون من المفيد أن نبدأ بتعريف ماهية هذه السياسة وما ليس منها. هذه السياسة هي مباديء
                                    إدارة و لائحة داخلية ننشرها بين رؤساء وموظفي ومديري ومزودي خدمات ومساهمي
                                    {{ config('app.name') }} وذلك
                                    لإعلامهم بما نعتبره أفعالا مقبولة أو غير مقبولة فيما يتعلق بالتعامل مع معلومات
                                    المستخدِم. تهدف هذه السياسة أيضاً إلى إخبارك بكيفية إدارتنا لجوانب معينة في موقعنا
                                    تقوم بتخزين معلومات المستخدِم، إلى جانب حقيقة أنك ربما – من خلال موقعنا – قد تتعامل
                                    مع الغير الذي قد يتواصل مع معلومات المستخدم.</p>
                                <p>هذه السياسة ليست اتفاقاً قانونياً مُلزِماً، أو تعهداً فردياً، أو بياناً أو ضماناً من
                                    أي نوع يتم إعطاؤه للمستخدمين، أو وكالات حكومية، أو أشخاص طبيعيين أو قانونيين من أي
                                    نوع أو صفة.</p>
                                <p>نحن نملك كل الحق وحرية التصرف والتقدير للبت في النتيجة الملائمة لوفاء أو خرق هذه
                                    السياسة من قِبل أصحاب الشأن فى مؤسستنا . كما نحتفظ أيضاً بحق الإبقاء على هذه النتائج
                                    كمادة سرية، أو جعلها معلومات علنية.</p>
                                <p>إن السبب وراء استقبالنا معلومات المستخدم هو تمكيننا من منح الخدمات عبر موقعنا
                                    لمستخدمينا النهائيين. تحتوي مثل هذه المعلومات، من ضمن ما تحتوي، على معلومات تمكننا
                                    من التعرف على عملائنا والتعامل معها وفقاً لأحكام القوانين ذات الصلة، مثل المعلومات
                                    المتعلقة بالعمر، والتي تجعلنا قادرين على تحديد مدى أهلية عميلنا للدخول في اتفاق ملزم
                                    قانونياً، والمعلومات المطلوبة لتمكين مستخدمينا من الدخول على موقعنا بصورة متكررة
                                    كاسم المستخدم وكلمة المرور، وكذلك عنوان البريد الإلكتروني والذي يتم استخدامه لإدارة
                                    حساب المستخدم، خاصةً في تلك الأحوال حين يتم نسيان أسماء الدخول وكلمات المرور، و
                                    المعلومات التي تمكننا من التعامل مع العميل؛ كوسيلة الدفع المفضلة، والمعلومات
                                    المطلوبة لتقديم الخدمات لعملائنا؛ كعنوان البريد الإلكتروني، والعنوان المادي، ورقم
                                    الهاتف المحمول، والتي تُستخدم جميعاً لإرسال الإيصالات والفواتير والمبالغ المالية.
                                </p>
                                <p>لا تتضمن معلومات المستخدم عامةً المعلومات التي نستنتجها، أو نجمعها، أو نستخلصها، سواء
                                    بأنفسنا أو من خلال استخدام مقدمي الخدمات من الغير. تعتمد مثل هذه المعلومات على تحليل
                                    البيانات التي نجمعها من مصادر عديدة مثل الإحصائيات والاستنتاجات. تحكمنا قواعد
                                    القوانين الواجبة للتطبيق فيما يتعلق بمعالجة البيانات الخاصة والشخصية لمستخدمي
                                    الإنترنت.</p>
                                <p>كقاعدة عامة، يتم معالجة معلومات المستخدم إلكترونياً وليست في متناول حاملي الأسهم في
                                    محيط العمل اليومي في شركتنا. وقد نقوم بمشاركة معلومات المستخدم مع الأشخاص المرتبطين
                                    بنا أو مع الغير. وننوه لمستخدمينا أننا نتعاون مع هيئات تطبيق وتنفيذ القانون ومع كل
                                    السلطات التي تمتلك الاختصاص القضائي لطلب معلومات المستخدم في سياق عمليات تنفيذ
                                    القانون والتحقيقات التي تخص الصالح العام والدعاوى المدنية والجنائية والسلامة العامة
                                    ومكافحة الجريمة.</p>
                                <p>سنتبع المعايير المقبولة بشكل عام فى هذا المجال لحماية معلومات المستخدم. وبالرغم من
                                    عدم وجود طريقة آمنة تماماً للنقل عبر الإنترنت أو للتخزين الإلكتروني، سنستمر في
                                    محاولتنا استخدام وتنفيذ الطرق المقبولة تجارياً لحماية معلومات المستخدم وذلك لضمان
                                    استمرار خدمتنا وخصوصية مستخدمينا.</p>
                                <p>تُعد معلومات المستخدم أصل رئيسي في معظم الأعمال المبنية على الإنترنت. و كشركة، قد
                                    نكون عرضة دائماً لمعاملات تتعلق بأصولنا وأسهمنا العادية بما في ذلك الاندماج،
                                    الانقسام، الاكتساب من قِبل الغير. وتعد معلومات المستخدم شيء رئيسي في التقييمات التي
                                    تحدث قبل هذه الأعمال وأحد الأصول الرئيسية المنقولة فور أن تحدث تلك المعاملات. سنضمن
                                    أن خلفاءنا القانونيين يتعاملون مع معلومات المستخدم بنفس الطريقة التي نتعامل بها،
                                    واستمرارهم في تطوير وتنفيذ الوسائل لحمايتها بشكل أفضل.</p>
                                <p>سيتم إعطاء مستخدمي خدمتنا اختيار تبديل معلومات المستخدم بشرط أن يكون التبديل قانونياً
                                    ولا يستتبع أي سلوك مخادع أو يطلب حذف نفسه تماماً. وسنمتثل لمثل هذه الطلبات بأفضل ما
                                    نستطيع ومتبعين في ذلك الحس التجاري السليم.</p>
                                <p>سيحتوي موقعنا على الأرجح على إعلانات أو وسائل أخرى تحوي روابط لمواقع أخرى. وعليه
                                    فإننا ننوه لمستخدمينا بأننا لا نعطي أي ضمان فيما يتعلق بسياسة مثل هذه المواقع الأخرى
                                    الخاصة بحماية واستخدام المعلومات الشخصية. نحن لا ولن نوصي بمميزات الحماية أو سياسة
                                    الخصوصية لأي من الغير باستثناء ما قمنا بفحصه بأنفسنا ، وفي هذه الحالات سنقدم هذه
                                    التوصية صراحة.</p>
                                <p>نذكّر مستخدمينا بأننا نستطيع التحكم في طرق عملنا فقط، بينما ستتعامل مباشرة مع مزودينا
                                    الذين ستكون لهم سياساتهم الخاصة لمعالجة معلوماتك. ينبغي عليك دائماً إبداء الحذر
                                    الواجب كلما أعطيتَ معلوماتك.</p>
                            </div>

                        </div>
                    </div>
                    @include('user.layouts.footer')

                </div>
            </div>
        </div>
    </div>








</body>

</html>

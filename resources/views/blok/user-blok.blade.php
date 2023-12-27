<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
<style>
     .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #c1c1c1, #c59035, #bf8200, #333456);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #c1c1c1, #c59035, #bf8200, #333456);
    }
</style>

</head>
<body style="background-image: url({{ asset('image/2.png') }}) ; ">
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header gradient-custom-2 h4 text-center">هذا الحساب محظور</div>
                    <h5 class="p-3 text-lg-end" dir="rtl">
                        هناك العديد من الأسباب التي يمكن أن تؤدي إلى حظر حساب مستخدم، ومنها:
<br>
1. انتهاك السياسات والقواعد: يمكن أن يؤدي انتهاك الشروط والأحكام للخدمة أو السلوك غير المقبول على المنصة إلى حظر الحساب. قد تشمل هذه الانتهاكات الإساءة، التحريض على العنف، العنصرية، النشاط غير القانوني، والترويج للكراهية.
<br>
2. الرسائل غير المرغوب فيها والترويج للسبام: إذا كان المستخدم يرسل رسائل غير مرغوب فيها بشكل مستمر أو يقوم بإرسال رسائل سبام (رسائل غير مرغوب فيها بكميات كبيرة)، فقد يتم حظر حسابه.
<br>
3. التلاعب والغش: إذا كان المستخدم يقوم بالتلاعب بنظام المنصة أو يستخدم طرق غش للحصول على مزايا غير مشروعة، فقد يتم حظر حسابه.
<br>
4. سلوك مزعج أو مضايقة الآخرين: إذا قام المستخدم بالتحرش أو المضايقة للآخرين على المنصة، فقد يتم فرض الحظر على حسابه.
<br>
تختلف سياسات الحظر والعقوبات من منصة لأخرى، وربما يتم تطبيق الحظر على الفور في بعض الحالات الخطيرة. في الحالات الأخرى، يمكن أن يتم منح المستخدم فرصة للاستئناف أو الاحتجاج قبل تنفيذ الحظر النهائي.

بصفة عامة، فإن الحظر يهدف إلى المساهمة في خلق بيئة آمنة ومريحة للمستخدمين على المنصات الرقمية. ومع ذلك، يجب أن يتم تطبيق الحظر بشكل عادل ووفقاً للسياسات المحددة، مع إتاحة فرصة للمستخدمين للاحتجاج أو تصحيح سلوكهم إذا كان هناك سوء فهم أو سوء تفاهم.

                    </h5>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>

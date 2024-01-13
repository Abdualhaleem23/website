@extends('layouts.app')

@section('content')

<style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #c1c1c1, #c59035, #bf8200, #333456);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #c1c1c1, #c59035, #bf8200, #333456);
    }

    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }

</style>
<section class="h-100 gradient-form " style="">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black mb-5">
                    <div class="row g-0 shadow-lg">
                        <div class="col-lg-6 shadow-lg">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img class="rounded-5" src="{{ asset('image/CommunityLogo.png') }}" style="width: 185px;" alt="logo">
                                    <h3 class="mt-1 mb-5 pb-1 h2">موقع الاسترشادي لطلبة الثانويه</h3>
                                </div>

                                <form method="POST" class="col-lg-10 mx-auto" action="{{ route('login') }}" dir="rtl">
                                    <h5 class=" ">تسجيل الدخول</h5>
@csrf
                                    <div class="form-outline mb-4">
                                        <input type="email" id="form2Example11" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" name="email" required />
                                        <label class="form-label" for="form2Example11">باريد الالكتروني</label>
                                        @error('email')
                                        <p class="text-danger text-center mt-0" role="alert">
                                            <strong>{{ $message }} </strong>
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" class="form-control @error('email') is-invalid @enderror" name="password" required />
                                        <label class="form-label" for="password">كلمة المرور</label>
                                        @error('email')
                                        <p class="text-danger text-center mt-0" role="alert">
                                            <strong>{{ $message }} </strong>
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 w-100" type="submit"> دخول</button>
                                        @if (Route::has('password.request'))
                                        <a class="text-muted" href="{{ route('password.request') }}">
                                            نسيت كلمة المرور ؟
                                        </a>
                                        @endif
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">ليس لدي حساب ؟</p>
                                        <a  href="{{ route('register') }}" class="btn btn-outline-danger"> انشاء حساب جديد</a>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 shadow d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4" dir="rtl">
                                <h4 class="mb-4 text-center h2">موقع الاسترشادي لطلبة الثنوية </h4>
                                <p class=" mb-0 text-end h5 text-justify  ">
                                    كثير من لطلبة يجدون صعوبة في معرفة الطريقة الأمثل لتحقيق النجاح الأكاديمي والتفوق في مجالاتهم الدراسية المختلفة. لذلك، يأتي موقع استرشادي للطلاب لتوفير المعلومات والإرشاد اللازم لهم لتحقيق أهدافهم الأكاديمية.
                                </p>
                                <p class=" mb-0 text-end h5 text-justify">
                                    يعتبر موقع استرشادي للطلاب مصدرًا شاملاً يوفر المشورة والموارد التعليمية للطلبة في كافة مستوياتهم التعليمية، بدءًا من المدارس الابتدائية وحتى المرحلة الجامعية. يهدف الموقع إلى مساعدة لطلبة على فهم المناهج الدراسية، وتنمية مهاراتهم الأكاديمية، وتطوير استراتيجيات الدراسة الفعالة.
                                </p>
                                <p class=" mb-0 h5 text-justify text-end">
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
{{-- -


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card shadow">
                <div class="card-header text-center h3 bg-white ">تسجيـــــل الدخــــول </div>

                <div class="card-body px-6 row">
                    <form method="POST" class="col-lg-10 mx-auto" action="{{ route('login') }}">
@csrf
<div class="row mb-3 mt-3">
    <div class="mb-3 input-group">
        <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <label style="font-size: 16px" class="input-group-text font-bold bg-light">باريد الالكتروني</label>
    </div>
    @error('email')
    <span class="text-danger text-center mt-0" role="alert">
        <strong>{{ $message }} </strong>
    </span>
    @enderror
</div>
<div class="row mb-3">
    <div class="mb-3 input-group">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="email">
        <label style="font-size: 16px" class="input-group-text">كلمة المرور </label>
    </div>
    @error('password')
    <span class="text-danger text-center mt-0" role="alert">
        <strong>{{ $message }} </strong>
    </span>
    @enderror
</div>


<div class="row mb-0">
    <div class="col-md-8  mx-auto">
        <button type="submit" class="btn btn-primary btn-sm w-100 ">
            موافـق
        </button>
        <a href="{{ route('register') }}" class="btn btn-secondary mt-3 btn-sm w-100 ">
            ليس لدي حساب
            <a>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif

    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>



--}}

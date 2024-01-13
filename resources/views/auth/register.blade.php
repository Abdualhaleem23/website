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
<section class="h-100 gradient-form shadow-lg" >
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black mb-5">
                    <div class="row g-0 shadow-lg">
                        <div class="col-lg-12 shadow d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <div class="text-center">
                                    <img class="rounded-5" src="{{ asset('image/CommunityLogo.png') }}" style="width: 185px;" alt="logo">
                                    <h3 class="mt-1 mb-5 pb-1">موقع الاسترشادي لطلب الثانويه</h3>
                                </div>
                                <p class=" mb-0 text-end h5 text-justify  " dir="rtl">
                                    كثير من لطلبة يجدون صعوبة في معرفة الطريقة الأمثل لتحقيق النجاح الأكاديمي والتفوق في مجالاتهم الدراسية المختلفة. لذلك، يأتي موقع استرشادي للطلاب لتوفير المعلومات والإرشاد اللازم لهم لتحقيق أهدافهم الأكاديمية.
                                </p>
                                <p class=" mb-0 text-end h5 text-justify" dir="rtl">
                                    يعتبر موقع استرشادي للطلاب مصدرًا شاملاً يوفر المشورة والموارد التعليمية للطلبة في كافة مستوياتهم التعليمية، بدءًا من المدارس الابتدائية وحتى المرحلة الجامعية. يهدف الموقع إلى مساعدة لطلبة على فهم المناهج الدراسية، وتنمية مهاراتهم الأكاديمية، وتطوير استراتيجيات الدراسة الفعالة.
                                </p>
                                <p class=" mb-0 text-end">
                                </p>

                            </div>
                        </div>
                        <div class="col-lg-12  shadow-lg">
                            <div class="card-body  p-md-5 mx-md-4">



                                <form method="POST" class="col-lg-11 mx-auto row" action="{{ route('register') }}" dir="rtl">
                                    <h4 class=" text-center mb-3 col-lg-12">انشاء حساب جديد </h4>
                                    @csrf
                                    <div class="form-outline col-lg-12 mb-4">
                                        <h5 class="form-label" for="form2Example11"> اسم واللقب</ا>
                                        <input type="text" id="form2Example11" class=" form-control @error('name') is-invalid @enderror"value=" {{ old('name') }}" name="name" required />

                                        @error('name')
                                        <p class="text-danger text-center mt-0" role="alert">
                                            <strong>{{ $message }} </strong>
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="form-outline col-lg-6 mb-4">
                                        <h5 class="form-label" for="form2Example11">تاريخ الميلاد </h5>
                                        <input type="date" id="form2Example11" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}" name="age" required />

                                        @error('email')
                                        <p class="text-danger text-center mt-0" role="alert">
                                            <strong>{{ $message }} </strong>
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="form-outline col-lg-6 mb-4">
                                        <h5 class="form-label" for="form2Example11"> تخصص</h5>

                                        <select id="form2Example11" class="form-control @error('specialty') is-invalid @enderror" name="specialty" value="{{ old('specialty') }}" required>
                                            <option> اختيار التخصص</option>
                                            <option value="1"> علمي</option>
                                            <option value="2">ادبي</option>
                                        </select>

                                        @error('specialty')
                                        <p class="text-danger text-center mt-0" role="alert">
                                            <strong>{{ $message }} </strong>
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="form-outline col-lg-6 mb-4">
                                        <h5 class="form-label" for="form2Example11"> سنة التخرج</h5>
                                        <input type="text" id="form2Example11" class="form-control @error('graduation') is-invalid @enderror" name="graduation" value="{{ old('graduation') }}" required />

                                        @error('email')
                                        <p class="text-danger text-center mt-0" role="alert">
                                            <strong>{{ $message }} </strong>
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="form-outline col-lg-6 mb-4">
                                        <h5 class="form-label" for="form2Example11">باريد الالكتروني</h5>
                                        <input type="email" id="form2Example11" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" name="email" required />

                                        @error('email')
                                        <p class="text-danger text-center mt-0" role="alert">
                                            <strong>{{ $message }} </strong>
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="form-outline col-lg-6 mb-4">
                                        <h5 class="form-label" for="password">كلمة المرور</h5>
                                        <input type="password" id="password" class="form-control @error('email') is-invalid @enderror" name="password" required />

                                        @error('email')
                                        <p class="text-danger text-center mt-0" role="alert">
                                            <strong>{{ $message }} </strong>
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="form-outline col-lg-6 mb-4">
                                        <h5 class="form-label" for="password">تأكيد كلمة المرور</h5>
                                        <input type="password" id="password_confirmation" class="form-control @error('email') is-invalid @enderror" name="password_confirmation" required />
                                    </div>
                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 w-100" type="submit"> دخول</button>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2"> لدي حساب ؟</p>
                                        <a href="{{ route('login') }}" class="btn btn-outline-danger"> تسجيل الدخول</a>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

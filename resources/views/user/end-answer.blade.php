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

</style>
<div class="container">
    <div class="container-xl px-4 mt-4 ">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header text-center gradient-custom-2 h4">
                        <img class="rounded-5" src="{{ asset('image/CommunityLogo.png') }}" style="width: 185px;" alt="logo">
                        <h4 class="mt-2 w-100 ">  تهانينا لقد انتهينا </h4>
                    </div>
                    <div class="text-center my-2">
                        <h4 >تنبية</h4>
                        <h5>سيتم تنبيهك بنتيجة من قبل المرشدين علي باريدك الالكتروني </h5>
                        <h5>ان كنت متأكد من ان قد اجبت بشكل صحيح علي الاسأله السابقه انقر علي انتهاء</h5>
                        <a href="{{ route('student-end-answer') }}" class="btn btn-sm btn-primary w-50 my-2"> انتهاء</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

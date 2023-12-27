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
<div class="container-xl px-4 mt-4 ">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- Change password card-->
            <div class="card mb-4">
                <div class="card-header text-center gradient-custom-2 h4">تغير كلمة المرور </div>
                <div class="card-body" dir="rtl">
                    <form action="{{ route('update-password') }}">
                        <!-- Form Group (current password)-->
                        @if(session('msg'))
                        <div class=" alert w-100 alert-info text-center h5">
                            {{session('msg') }}
                        </div>
                        @endif
                        <div class="mb-3">
                            <label class="h4 mb-1" for="currentPassword">كلمة المرور القديمة</label>
                            <input name="password_old" class="form-control" id="currentPassword" type="password" placeholder="***************">
                        </div>
                        <!-- Form Group (new password)-->
                        <div class="mb-3">
                            <label class="h4 mb-1" for="newPassword">كلمة السر الجديدة </label>
                            <input name="password" class="form-control" id="newPassword" type="password" placeholder="***************">
                        </div>
                        <!-- Form Group (confirm password)-->
                        <div class="mb-3">
                            <label class="h4 mb-1" for="confirmPassword">تأكيد كلمة المرور</label>
                            <input name="re_password" class="form-control" id="confirmPassword" type="password" placeholder="***************">
                        </div>
                       <div class="text-center">
                        <button  class="btn btn-primary mx-auto w-50" type="submit">حفــظ</button>
                       </div>
                    </form>
                </div>
            </div>
            <!-- Security preferences card-->
        </div>
    </div>
</div>

@endsection

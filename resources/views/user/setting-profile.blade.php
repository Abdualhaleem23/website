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
    <div class="container-xl px-4 mt-4  py-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0 shadow">
                    <h4 class="card-header text-center  gradient-custom-2">الموقع الاسترشادي للطلاب ثناوية</h4>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2 w-100"  src="{{ asset('image/CommunityLogo.png') }}" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">مرحبا بك يمكنك تعديل البيانات الخاصه بك  ....<br> الرجاء كتابة البيانات بشكل صحيح</div>
                        <!-- Profile picture upload button-->
                        <a href="{{ route('re-password-user') }}" class="btn btn-sm btn-primary w-100">تغيركلمة المرور</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4 shadow">
                    <h4 class="card-header text-center bg-white card-header text-center  gradient-custom-2">بيانات الحساب </h4>
                    <div class="card-body">
                        <form dir="rtl" class=" text-center " action="{{ route('update-profile') }}">
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <h5 class="text-center mb-1" for="inputUsername">اسم واللقب</h5>
                                <input required class="form-control" name="name" id="inputUsername" type="text" placeholder="" value="{{ Auth::user()->name }}">
                                @error('name')
                                <p class="text-danger text-center mt-0" role="alert">
                                    <strong>{{ $message }} </strong>
                                </p>
                                @enderror
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <h5 class="text-center mb-1" for="inputFirstName"> سنة التخرج</h5>
                                    <input required class="form-control" name="graduation" id="inputFirstName" type="text" value="{{ Auth::user()->graduation }}" >
                                    @error('graduation')
                                    <p class="text-danger text-center mt-0" role="alert">
                                        <strong>{{ $message }} </strong>
                                    </p>
                                    @enderror
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <h5 class="text-center mb-1" for="inputFirstName">  تخصص</h5>
                                    <select required id="form2Example11" class="form-control @error('specialty') is-invalid @enderror" name="specialty" value="{{ old('specialty') }}" required>
                                        <option value="0"> اختيار التخصص</option>
                                        <option value="1"> علمي</option>
                                        <option value="2">ادبي</option>
                                    </select>
                                    @if(session('specialty'))
                                    <p class="text-danger text-center mt-0" role="alert">
                                        <strong>{{session('specialty')}} </strong>
                                    </p>
                                    @endif
                                    @error('specialty')
                                    <p class="text-danger text-center mt-0" role="alert">
                                        <strong>{{ $message }} </strong>
                                    </p>
                                    @enderror
                                </div>
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3 p-2">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <h5 class="text-center mb-1" for="inputOrgName">تاريخ الميلاد</h5>
                                    <input required class="form-control" value="{{ Auth::user()->age }}" id="inputOrgName" type="date" name="age">
                                    @error('age')
                                    <p class="text-danger text-center mt-0" role="alert">
                                        <strong>{{ $message }} </strong>
                                    </p>
                                    @enderror
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <h5 class="text-center mb-1" for="inputLocation">تاريخ الانضمام </h5>
                                    <input required class="form-control" disabled value="{{ Auth::user()->created_at }}" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA">
                                  
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="text-center mb-3 p-2">
                                <label class="small mb-1" for="inputEmailAddress">Email </label>
                                <input required class=" text-center form-control" disabled value="{{ Auth::user()->email }}" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com">
                            </div>
@csrf
                            <button type="submit" class="btn btn-primary mb-3 w-75 mx-auto" type="button"> حفظ التغير</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

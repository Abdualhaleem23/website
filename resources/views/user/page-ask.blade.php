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
                        <h4 class="mt-2 w-100 ">اجابه عن اسأله </h4>

                    </div>
                    <form action="{{ route('student-ask-answer') }}"  class="card-body">
                        <div>
                            <div class="input-group mt-3">
                                <input type="text"   class="form-control text-center" disabled value="{{ $ask[$page-1] }}" />
                                <label class="input-group-text"> :{{ $page }}سؤال </label>
                            </div>
                            <input type="hidden" value="{{ $ask[$page-1] }}" name="ask"/>
                            <input type="hidden" value="{{ Auth::user()->id }}" name="student_id"/>
                            <input type="hidden" value="{{ $ask_id[$page-1] }}" name="ask_id" />

                            <div class="input-group mt-3">

                                <div class="input-group mt-2">
                                    <div style="background: rgb(57, 44, 231)" class="input-group-text">
                                        <input class="form-check-input mt-0" type="checkbox"  value="true" name="ans1">
                                    </div>
                                    <input type="text" disabled value="{{$res->res1}}" class="form-control text-center">
                                    <label class="input-group-text">جواب 1 </label>
                                </div>

                                <div class="input-group mt-2">
                                    <div style="background: rgb(57, 44, 231)" class="input-group-text">
                                        <input class="form-check-input mt-0" type="checkbox"  value="true" name="ans2">
                                    </div>
                                    <input type="text" disabled value="{{$res->res2}}" class="form-control text-center" >
                                    <label class="input-group-text">جواب 2 </label>
                                </div>

                                <div class="input-group mt-2">
                                    <div style="background: rgb(57, 44, 231)" class="input-group-text">
                                        <input class="form-check-input mt-0" type="checkbox"  value="true" name="ans3">
                                    </div>
                                    <input type="text" disabled value="{{$res->res3}}" class="form-control text-center">
                                    <label class="input-group-text">جواب 3 </label>
                                </div>

                            </div>
                            <input type="hidden" value="{{ ($page+1) }}" name="number_ask">
                            <div class=" mt-3 text-center">
                               <button type="submit" class="btn btn-sm btn-outline-primary w-50" > التالي </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
<section class="h-100 gradient-form shadow-lg">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black mb-5">
                    <div class="row g-0 shadow-lg">
                        <div class="col-lg-12 shadow align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-2 ">
                                <div class="text-center">
                                    <h3 class="mt-1  pb-1 text-center">
                                        <p>اجابة الطالب</p>
                                        <p class="">{{ $student->name }}</p>
                                        <p>{{ $student->email }}</p>
                                    </h3>
                                </div>


                            </div>
                        </div>
                        <div class="container p-3">
                            <div class="w-100 text-center">
                                @if(session('msg'))
                                <div class="alert alert-success">
                                    {{ session('msg') }}
                                </div>
                                @endif
                                <h3 class="">
                                    <span class="badge bg-secondary ">درجات المقرارات الدراسي </span>
                                    <span class="badge bg-secondary ">@if( $student->specialty == 1)تخصص علمي@elseif($student->specialty == 0) @endif </span>
                                    <span class="badge bg-secondary ">سنة التخرج : {{ $student->graduation }} </span>
                                </h3>
                            </div>

                            @forelse($data as $value)
                            <h5 class="my-2 text-center">{{ $value->name }}</h5>
                            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="{{ @round( ($value->grades /$value->d1 ) ,3)*100}}" aria-valuemin="0" aria-valuemax="{{ $value->d1  }}">
                                <div class="progress-bar bg-success" style="width: {{ @round( ($value->grades /$value->d1 ) ,3)*100}}%"> {{ @round( ($value->grades /$value->d1 ) ,3)*100}}%</div>
                            </div>
                            @empty

                            @endforelse
                            <hr>
                            <div class="w-100 text-center">
                                <h3 class="">
                                    <span class="badge bg-secondary w-100"> اجوبة الاسأله </span>
                                </h3>
                            </div>
                            <hr>

                            <div class="mt-1">
                                <?php $num =1 ?>
                                @forelse($answer as $value)
                                <hr>
                                <div class=" mb-1 text-end" dir="rtl">
                                    <h4 class="p-1"><span class=" badge bg-warning">سأل رقم :{{ $num++}}</span> : {{ $value->ask  }}</h4>
                                    <h4 class="p-1"> <span class="badge bg-success">جواب : </span>
                                         @if($value->answer == 0 )
                                         <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                          </svg>


                                         @elseif($value->answer == 1 )
                                         <svg style="color: rgb(1, 179, 1)" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022"/>
                                          </svg>
                                         @endif


                                        </h4>
                                    </div>
                                    <?php  $f=0?>
                                    @forelse ($data2 as $item)
                                    @if($item->ask_id = $value->ask_id)
                                    <?php $f++?>

                                    <div class="input-group mt-2 ">

                                        @if($f == 1)

                                        <div style="background: rgb(57, 44, 231)" class="input-group-text">
                                            <input class="form-check-input mt-0" @if($value->answer_id == 1) checked @endif type="checkbox"  value="true" name="ans1">
                                        </div>
                                        <input type="text"  disabled value="{{$item->res1}}" class="form-control text-center" name="res1">
                                        <label class="input-group-text">جواب 1 </label>
                                        @elseif ($f == 2)
                                        <div style="background: rgb(57, 44, 231)" class="input-group-text">
                                            <input class="form-check-input mt-0" @if($value->answer_id == 2) checked @endif type="checkbox"  value="true" name="ans2">
                                        </div>
                                        <input type="text" disabled value="{{$item->res2}}" class="form-control text-center" name="res2">
                                        <label class="input-group-text">جواب 2 </label>
                                        @elseif ($f == 3)
                                        <div style="background: rgb(57, 44, 231)" class="input-group-text">
                                            <input class="form-check-input mt-0" @if($value->answer_id == 3) checked @endif type="checkbox"  value="true" name="ans3">
                                        </div>
                                        <input type="text" disabled value="{{$item->res3}}" class="form-control text-center" name="res3">
                                        <label class="input-group-text">جواب 3 </label>
                                        @endif


                                    </div>
                                    @endif
                                    @empty

                                    @endforelse


                                @empty

                                @endforelse
                            </div>
                            <div class="w-100 text-center mt-3">
                                <h3 class="">
                                    <span class="badge bg-secondary w-100 ">  ارسال اجابة </span>
                                </h3>
                            </div>
                           <form action="{{ route('guide-send-email') }}">
                            <div class="mt-3 shadow-lg p-2">
                                <div class="input-group" >
                                    <textarea name="text" class="form-control text-end" style="height: 250px" required dir="rtl"></textarea>
                                    <label class="input-group-text">نص الاجابه</label>
                                </div>
                                <input type="hidden" name="email" value="{{ $student->email }}">
                                <input type="hidden" name="name" value="{{ $student->name }}">
                                <input type="hidden" name="id_student" value="{{ $student->id }}">
                                <div class="text-center my-3">
                                    <button type="submit" class="btn btn-sm btn-primary w-50"> ارسال الاجابة</button>
                                </div>
                            </div>
                           </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

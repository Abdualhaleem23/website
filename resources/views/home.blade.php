@extends('layouts.app')

@section('content')
<div class="">
    <div class="container">
        <section style="">
            <div class="container py-5">

                <div class="row">
                    <div class="col-lg-4 ">
                        <div class="card mb-4 shadow">
                            <div class="card-body text-center">
                                <img src="{{ asset('image/CommunityLogo.png') }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3"> {{ Auth::user()->role ." : ". Auth::user()->name }}</h5>
                                <p class="text-muted mb-1 ">تاريخ الانضمام : {{ Auth::user()->created_at }}</p>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <a href="{{ route('setting-profile') }}" class=" mb-2 btn  btn-primary w-100 text-center">تعديل بيانات الحساب</a>
                                    </li>
                                    @if(Auth::user()->role == 'admin')
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <a href="{{ route('setting-app') }}" class="mb-2 btn btn-sm btn-primary w-100 text-center ">تعديل بيانات الموقع</a>
                                    </li>
                                    @endif
                                    @if(Auth::user()->role == 'guide')
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <a href="{{ route('guide-student') }}" class="mb-2 btn btn-sm btn-primary w-100 text-center"> طلاب ينتظرون الاجابه</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <a href="{{ route('guide-student-not') }}" class="mb-2 btn btn-sm btn-primary w-100 text-center">طلاب تم الاجابه عليهم </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4 shadow-lg">
                            <div class="card-body" dir="rtl">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0 h4">اسم واللقب</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0 h4">{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0 h4">باريد الكتروني</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0 h4">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                @if(Auth::user()->role == 'user')
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0 h4">تاريخ الميلاد</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0 h4">{{ Auth::user()->age }}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0 h4">تخصص </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0 h4" >@if(Auth::user()->specialty == 1) علمي @elseif(Auth::user()->specialty == 2) ادبي@endif }}</p>
                                    </div>
                                </div>
                                <hr>
                                @endif
                                @if(Auth::user()->role == 'user')
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0 h4">سنة التخرج</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0 h4">{{ Auth::user()->graduation }}</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">

                            @if(Auth::user()->role == 'guide')

                            <div class="col-md-12">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4 text-center h4"><span class="text-primary font-italic me-1"> الطلبة المستكملين الاجراء </span>
                                        </p>
                                        <hr>


                                        <section id="team" class="team_area section-padding">
                                            <div class="container">
                                                <h2 class="title_spectial text-center">ينتظرون الاجابه</h2>
                                                <hr>
                                                <div class="row text-center ">
                                                    @forelse($Student as $value)
                                                    @if(App\Http\Controllers\HomeController::student_answer_send($value->student_id) == 0)
                                                    <div class="col-lg-4 shadow-lg col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                                                        <div class="our-team">
                                                            <div class="single-team">
                                                                <img src="{{ asset('image/CommunityLogo.png') }}" class="img-fluid" alt="">
                                                                <h3>{{ $value->name }}</h3>
                                                                <p>{{ $value->graduation .':'.$value->specialty }}</p>
                                                                <a class="btn btn-sm btn-primary my-2 w-100" href="{{ route('guide-answer-student',$value->student_id) }}">اجابة الطالب</a>
                                                            </div>

                                                        </div>
                                                        <!--- END OUR TEAM -->
                                                    </div>
                                                    <!--- END COL -->

                                                    @else

                                                    @endif



                                                    @empty

                                                    @endforelse
                                                </div>
                                                <!--- END ROW -->
                                                <hr>

                                            </div>
                                            <!--- END CONTAINER -->
                                        </section>

                                        <section id="team" class="team_area section-padding">
                                            <div class="container">
                                                <h2 class="title_spectial text-center h4">تم الاجابه عليهم</h2>
                                                <hr>
                                                <div class="row text-center ">
                                                    @forelse($Student as $value)
                                                    @if(App\Http\Controllers\HomeController::student_answer_send($value->student_id) == 0)

                                                    @else
                                                    <div class="col-lg-4 shadow-lg col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                                                        <div class="our-team">
                                                            <div class="single-team">
                                                                <img src="{{ asset('image/CommunityLogo.png') }}" class="img-fluid" alt="">
                                                                <h3>{{ $value->name }}</h3>
                                                                <p>{{ $value->graduation .':'.$value->specialty }}</p>
                                                                <a class="btn btn-sm btn-primary my-2 w-100" href="{{ route('guide-answer-student',$value->student_id) }}">اجابة الطالب</a>
                                                            </div>
                                                        </div>
                                                        <!--- END OUR TEAM -->
                                                    </div>
                                                    <!--- END COL -->

                                                    @endif



                                                    @empty

                                                    @endforelse
                                                </div>
                                                <!--- END ROW -->
                                                <hr>

                                            </div>
                                            <!--- END CONTAINER -->
                                        </section>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(Auth::user()->role == 'user')

                            <div class="col-md-12">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4 text-center"><span class="text-primary font-italic me-1 h4"> مقرارات التخصص</span>
                                        </p>
                                        <hr>

                                        @forelse($data as $value)

                                        <h5 class="my-2 text-center">{{ $value->name }}</h5>

                                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="{{ @round(App\Http\Controllers\HomeController::grades($value->id) /  $value->d1,3)*100}}" aria-valuemin="0" aria-valuemax="{{ $value->d1  }}">
                                            <div class="progress-bar bg-success" style="width: {{ @round(App\Http\Controllers\HomeController::grades($value->id) /  $value->d1,3) * 100}}%"> {{ @round(App\Http\Controllers\HomeController::grades($value->id) /  $value->d1,3) * 100}}%</div>
                                        </div>

                                        <hr>
                                        @empty

                                        @endforelse

                                        <div class="text-center">
                                            <button class="btn btn-sm btn-primary mt-2 w-25" data-bs-toggle="modal" data-bs-target="#exampleModalss">اضافة </button>
                                        </div>

                                        <div class="modal fade" id="exampleModalss" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $value->name }}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('student-add-grades') }}" class="modal-body">
                                                        <?php $cont_rows=0; ?>
                                                         @forelse($data as $value)
                                                        <div class="my-3 input-group">
                                                            <?php $cont_rows++; ?>
                                                            <input class="form-control" max="{{ $value->d1 }}" type="number" name="grades{{ $cont_rows }}" />
                                                            <label class="input-group-text " dir="rtl"> ادخل درجة المقرر {{ $value->name }}</label>
                                                            <input type="hidden" required name="cores_id{{$cont_rows}}" value="{{ $value->id }}">
                                                            <input type="hidden" name="student_id{{ $cont_rows}}" value="{{ Auth::user()->id}}">
                                                            <input type="hidden" name="count" value="{{ $cont_rows}}">
                                                        </div>
                                                        @empty

                                                        @endforelse
                                                        <div class="text-center">
                                                            <button class="btn btn-primary btn-sm w-50">اضافة</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        @if(App\Http\Controllers\HomeController::grades_end())
                                        @if(App\Http\Controllers\HomeController::is_end_answer() == 1)
                                        <a href="{{ route('student-ask-page',1) }}" class="btn btn-sm btn-warning"> اعادة اجابة علي الاساله</a>
                                        @else
                                        <a href="{{ route('student-ask-page',1) }}" class="btn btn-sm btn-success"> متابعه واجابة علي بعض الاساله</a>
                                        @endif
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

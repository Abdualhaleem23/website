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
                                        اجابة الطالب
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4 text-center"><span class="text-primary font-italic me-1"> الطلاب المستكملين الاجراء </span>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

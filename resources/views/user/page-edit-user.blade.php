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

    .card {
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }

    .avatar-md {
        height: 5rem;
        width: 5rem;
    }

    .fs-19 {
        font-size: 19px;
    }

    .primary-link {
        color: #314047;
        -webkit-transition: all .5s ease;
        transition: all .5s ease;
    }

    a {
        color: #02af74;
        text-decoration: none;
    }

    .bookmark-post .favorite-icon a,
    .job-box.bookmark-post .favorite-icon a {
        background-color: #da3746;
        color: #fff;
        border-color: danger;
    }

    .favorite-icon a {
        display: inline-block;
        width: 30px;
        height: 30px;
        font-size: 18px;
        line-height: 30px;
        text-align: center;
        border: 1px solid #eff0f2;
        border-radius: 6px;
        color: rgba(173, 181, 189, .55);
        -webkit-transition: all .5s ease;
        transition: all .5s ease;
    }


    .candidate-list-box .favorite-icon {
        position: absolute;
        right: 22px;
        top: 22px;
    }

    .fs-14 {
        font-size: 14px;
    }

    .bg-soft-secondary {
        background-color: rgba(116, 120, 141, .15) !important;
        color: #74788d !important;
    }

    .mt-1 {
        margin-top: 0.25rem !important;
    }

</style>
<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-10 mx-auto">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header gradient-custom-2 h4 text-center"> مستخدمين الموقع</div>

                <div>
                    <section class="section">
                        <div class="container">
                            <div class="align-items-center text-center row my-3">
                                <div class="col-lg-12">
                                    <div class="mb-3 mb-lg-0">
                                        <h6 class="fs-16 mb-0">
                                          <span class="badge bg-soft-secondary fs-14 mt-1 mx-1 ">  <span>ادمن </span>   : <span>{{ App\Http\Controllers\HomeController::user_web('admin') }}</span></span>
                                           <span class="badge bg-soft-secondary fs-14 mt-1 mx-1 ">  <span> مرشدين</span> : <span>{{ App\Http\Controllers\HomeController::user_web('Guide') }}</span></span>
                                            <span class="badge bg-soft-secondary fs-14 mt-1 mx-1 "><span> الطلاب </span> : <span>{{ App\Http\Controllers\HomeController::user_web('user') }}</span></span>

                                        </h6>
                                    </div>
                                </div>
                            </div>
                            @forelse($data as $value)

                            <div class="mb-3">
                                <div class="candidate-list-box card mt-4 candidate-list @if($value->blok == 0) bg-warning @endif">
                                    <div class="p-4 card-body ">
                                        <div class="align-items-center row">
                                            <div class="col-auto">
                                                <div class="candidate-list-images">
                                                    <a href="#"><img src="{{ asset('image/CommunityLogo.png') }}" alt="" class="avatar-md img-thumbnail rounded-circle" /></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="candidate-list-content mt-3 mt-lg-0">
                                                    <h5 class="fs-19 mb-0">
                                                        <a class="primary-link" href="#">{{ $value->name }}</a><span class="badge bg-success ms-1"><i class="mdi mdi-star align-middle"></i>{{ $value->role }}</span>
                                                    </h5>
                                                    <p class="text-muted mb-2">@if($value->specialty == 1) تخصص علمي {{ 'سنة:' . $value->graduation }} @elseif($value->specialty ==2) تخصص ادبي {{ 'سنة:' . $value->graduation }} @endif </p>
                                                    <ul class="list-inline mb-0 text-muted">
                                                        <li class="list-inline-item">{{ $value->email }}</li>
                                                        <li class="list-inline-item text-muted"><span>تاريخ الانضمام</span> {{ $value->created_at }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                                                    <span class="badge bg-soft-secondary fs-14 mt-1"><a href="{{ route('setting-role-user',$value->id) }}">User - مستخدم</a></span>
                                                    <span class="badge bg-soft-secondary fs-14 mt-1"><a href="{{ route('setting-role-admin',$value->id) }}">Admin - ادمن</a></span>
                                                    <span class="badge bg-soft-secondary fs-14 mt-1"><a href="{{ route('setting-role-Guide',$value->id) }}">Guide - مرشد</a></span>
                                                    @if($value->blok == 1)
                                                    <span class="badge bg-soft-secondary fs-14 mt-1"><a class="text-danger" href="{{ route('setting-user-blok',$value->id) }}">حظر الحساب</a></span>

                                                    @elseif($value->blok == 0)
                                                    <span class="badge bg-soft-secondary fs-14 mt-1"><a class="text-success" href="{{ route('setting-user-unblok',$value->id) }}">رفع الحظر الحساب</a></span>

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="favorite-icon">
                                            <a href="#"><i class="mdi mdi-heart fs-18"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty

                            @endforelse
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

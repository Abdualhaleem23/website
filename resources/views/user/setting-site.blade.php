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
    <section class="py-6 bg-light-primary">
        <div class="container ">
            <div class="row justify-content-center text-center mb-4 gradient-custom-2 p-3 ">
                <div class="col-xl-6 col-lg-8 col-sm-10">
                    <h2 class="font-weight-bold">مرحبــــــا بك <br>{{ Auth::user()->name }}</h2>
                    <p class="text-muted mb-0 fw-bold">يمكنك تعديل علي بيانات الموقع لذالك كن حريصا في اختيار اعداداتك </p>
                </div>
            </div>

            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 text-center justify-content-center px-xl-6 aos-init aos-animate" data-aos="fade-up">
                <a href="{{ route('setting-corses') }}" class="col my-3 btn bg-white bg-opacity-50 p-3 mx-2">
                    <div class="card border-hover-primary hover-scale shadow-lg">
                        <div class="card-body">
                            <div class="text-primary mb-2">

                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 2h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m6 0v3H6V2m6 0a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1M5 5h8m-5 5h5m-8 0h.01M5 14h.01M8 14h5" />
                                </svg>

                            </div>
                            <h6 class="font-weight-bold mb-3 h5">مقرارات دراسية</h6>
                            <p class="text-muted mb-0">اضافه وتعديل مقرارات الدراسية </p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('setting-ask-add') }}" class="col my-3 btn bg-white bg-opacity-50 p-3 mx-2">
                    <div class="card border-hover-primary hover-scale shadow-lg">
                        <div class="card-body">
                            <div class="text-primary mb-2">

                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"/>
                                    <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"/>
                                    <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"/>
                                  </svg>


                            </div>
                            <h6 class="font-weight-bold mb-3 h5"> اضافة اسأله </h6>
                            <p class="text-muted mb-0">اضافه وتعديل  الاسأله للمقرارات الدراسية  </p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('setting-user-edit') }}" class="col my-3 btn bg-white bg-opacity-50 p-3 mx-2">
                    <div class="card border-hover-primary hover-scale shadow-lg">
                        <div class="card-body">
                            <div class="text-primary mb-2">

                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 2h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m6 0v3H6V2m6 0a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1M5 5h8m-5 5h5m-8 0h.01M5 14h.01M8 14h5" />
                                </svg>

                            </div>
                            <h6 class="font-weight-bold mb-3 h5"> المستخدمين</h6>
                            <p class="text-muted mb-0">   تعديل المستخدمين وتعديل صلاحيتهم </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</div>
@endsection

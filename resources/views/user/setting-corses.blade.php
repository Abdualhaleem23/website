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
<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header gradient-custom-2 h4 text-center">اضافة المقرارات الدراسية</div>
                @if(session('msg'))
                <div class="alert alert-info text-center h5 ">
                    {{ session('msg') }}
                </div>
                @endif
                <div class="card-body">
                    <form class="text-center" action="{{ route('setting-add-corses') }}">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="h5  mb-1" for="inputUsername">اسم المقرر</label>
                            <input required class="form-control text-center" name="name_corses" id="inputUsername" type="text">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="h5 mb-1" for="inputFirstName">اجمالي درجة المقرر</label>
                                <input required class="form-control text-center" name="d1" id="inputFirstName" type="number" placeholder="">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="h5 mb-1" for="inputLastName">درجة النجاح في المقرر</label>
                                <input required class="form-control text-center" name="d2" id="inputLastName" type="number" placeholder="">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-12">
                                <label class="h5 mb-1" for="inputOrgName">تخصص </label>
                                <select required id="form2Example11" class="form-control text-center @error('specialty') is-invalid @enderror" name="specialty" value="{{ old('specialty') }}" required>
                                    <option value="0"> اختيار التخصص</option>
                                    <option value="1"> علمي</option>
                                    <option value="2">ادبي</option>
                                </select>

                                @error('specialty')
                                <p class="text-danger text-center mt-0" role="alert">
                                    <strong>{{ $message }} </strong>
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary w-50 " type="submit">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container bg-white bg-opacity-75 p-4">
        <div class="mt-5">
            @forelse($data as $value)


            <div class=" shadow-lg d-style p-3  btn-brc-tp border-2 bgc-white btn-outline-blue btn-h-outline-blue btn-a-outline-blue w-100 my-2 mx-2 py-3 shadow-sm">
                <!-- Basic Plan -->
                <div class="row align-items-center mx-auto">
                    <div class="col-12 col-md-4 mx-auto">
                        <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                        {{$value->name}} : (@if($value->class_corses ==1)
                            <span>علمي</span>
                            @else
                            <span>ادبي</span>
                        @endif)
                        </h4>

                        <div class="text-secondary-d1 text-120">
                            <span class=" h5 ">{{ $value->d1 }} </span>
                            <span class="h5"> / </span>
                            <span class=" h5 ">{{ $value->d2 }} </span>
                        </div>
                    </div>

                    <ul class="mx-auto list-unstyled mb-0 col-12 col-md-4 text-dark-l1 text-90 text-left my-4 my-md-0">


                        <li class="mt-25 mt-2">
                            <button class="btn btn-sm btn-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $value->id }}">
                               تعديل
                            </button>
                        </li>

                        <li class="mt-25 mt-2">
                            <a href="{{ route('setting-delete-corses',$value->id) }}" class="btn btn-sm btn-danger w-100">
                                حذف
                             </a>
                        </li>
                    </ul>


                </div>

            </div>
            <!-- Modal -->
<div class="modal fade" id="exampleModal{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $value->name }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="text-center" action="{{ route('setting-update-corses') }}">
                <!-- Form Group (username)-->

                <div class="mb-3">
                    <label class="h5  mb-1" for="inputUsername">اسم المقرر</label>
                    <input required class="form-control text-center" name="name_corses" id="inputUsername" type="text">
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-3">
                    <!-- Form Group (first name)-->
                    <div class="col-md-6">
                        <label class="h5 mb-1" for="inputFirstName">اجمالي درجة المقرر</label>
                        <input required class="form-control text-center" name="d1" id="inputFirstName" type="number" placeholder="">
                    </div>
                    <!-- Form Group (last name)-->
                    <div class="col-md-6">
                        <label class="h5 mb-1" for="inputLastName">درجة النجاح في المقرر</label>
                        <input required class="form-control text-center" name="d2" id="inputLastName" type="number" placeholder="">
                    </div>
                </div>
                <!-- Form Row        -->
                <div class="row gx-3 mb-3">
                    <!-- Form Group (organization name)-->
                    <div class="col-md-12">
                        <label class="h5 mb-1" for="inputOrgName">تخصص </label>
                        <select required id="form2Example11" class="form-control text-center @error('specialty') is-invalid @enderror" name="specialty" value="{{ old('specialty') }}" required>
                            <option value="0"> اختيار التخصص</option>
                            <option value="1"> علمي</option>
                            <option value="2">ادبي</option>
                        </select>

                        <input type="hidden" name="id" value="{{ $value->id }}">
                        @error('specialty')
                        <p class="text-danger text-center mt-0" role="alert">
                            <strong>{{ $message }} </strong>
                        </p>
                        @enderror
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary w-50 " type="submit">حفظ</button>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>
            @empty

            @endforelse
        </div>
    </div>
</div>


@endsection

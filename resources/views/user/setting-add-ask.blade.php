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
<div>
    <div class="container">
        <div class="container-xl px-4 mt-4 ">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div>
                        @forelse($data as $value)
                        <div
                            class="container shadow-lg px-2 py-3 border my-2 rounded-5 text-center  @if($value->show_hide == 1) bg-white @else bg-warning @endif  ">
                            <h4 class=""> {{ $value->ask }}</h4>
                            <h5> @if($value->classes == 1) تخصص علمي @else تخصص الادبي @endif </h5>
                            <p class="text-muted"> {{ $value->created_at }}</p>
                            <div class="d-flex justify-content-around">
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal{{ $value->id }}"
                                    class="btn btn-sm btn-primary  w-25">تعديل</button>
                                <a href="{{ route('setting-ask-delete',$value->id) }}"
                                    class="btn btn-sm btn-danger w-25 ">حذف</a>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal{{ $value->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">{{ $value->ask
                                            }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('setting-ask-update') }}" class="p-2">
                                            <input type="hidden" name="id" value="{{ $value->id }}">
                                            <div class="input-group mt-2">
                                                <input type="text" value="{{$value->ask}}" class="form-control text-center" name="ask">
                                                <label class="input-group-text">سأل </label>
                                            </div>
                                            <div class="input-group mt-2">
                                                <select type="text" class="form-control text-center" name="classes">

                                                    <option @if($value->classes == 1) selected @endif value="1"> علمي
                                                    </option>
                                                    <option @if($value->classes == 2) selected @endif value="2">ادبي
                                                    </option>
                                                </select>
                                                <label class="input-group-text">التخصص </label>
                                            </div>
                                            <div class="input-group mt-2">
                                                <select type="text" class="form-control text-center" name="type_ask">

                                                    <option @if($value->type_ask == 1) selected @endif value="1"> علوم
                                                        تطبيقية </option>
                                                    <option @if($value->type_ask == 2) selected @endif value="2"> علوم
                                                        إنسانية </option>
                                                </select>
                                                <label class="input-group-text">التخصصي </label>
                                            </div>
                                            @forelse ($data2 as $item)
                                            @if ($item->ask_id == $value->id )
                                            <div class="input-group mt-2">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" @if($item->ans1 == 1) checked @endif type="checkbox" value="true"
                                                        name="ans1">
                                                </div>
                                                <input type="text" class="form-control" name="res1" value="{{$item->res1}}">
                                                <label class="input-group-text">جواب 1 </label>
                                            </div>
                                            <div class="input-group mt-2">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" @if($item->ans2 == 1) checked @endif  type="checkbox" value="true"
                                                        name="ans2">
                                                </div>
                                                <input type="text" class="form-control" name="res2" value="{{$item->res2}}">
                                                <label class="input-group-text">جواب 2 </label>
                                            </div>
                                            <div class="input-group mt-2">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" @if($item->ans3 == 1) checked @endif  type="checkbox" value="true"
                                                        name="ans3">
                                                </div>
                                                <input type="text" class="form-control" name="res3" value="{{$item->res3}}">
                                                <label class="input-group-text">جواب 3 </label>
                                            </div>
                                            @endif

                                            @empty

                                            @endforelse

                                            <div class="input-group mt-2">
                                                <select type="text" class="form-control text-center" name="show_hide">

                                                    <option @if ($value->show_hide == 1 )
                                                        selected
                                                    @endif value="1"> اظهار</option>
                                                    <option  @if ($value->show_hide == 2 )
                                                           selected
                                                        @endif  value="2">اخفاء</option>
                                                </select>
                                                <label class="input-group-text">اظهار - اخفاء</label>
                                            </div>
                                            <div class="text-center mt-2">
                                                <button type="submit" class="btn btn-sm btn-primary w-50">تحديث
                                                </button>
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

                <div class="col-lg-6 mx-auto">
                    <!-- Change password card-->
                    <div class="card mb-4 ">
                        <div class="card-header text-center gradient-custom-2 h4">
                            <h4 class="mt-2 w-100 ">اضافة اسأله </h4>
                        </div>
                        <form action="{{ route('setting-ask-new') }}" class="p-2">
                            <div class="input-group mt-2">
                                <input type="text" class="form-control text-center" name="ask">
                                <label class="input-group-text">سأل </label>
                            </div>
                            <div class="input-group mt-2">
                                <select type="text" class="form-control text-center" name="classes">

                                    <option value="1"> علمي</option>
                                    <option value="2">ادبي</option>
                                </select>
                                <label class="input-group-text">تخصص </label>
                            </div>
                            <div class="input-group mt-2">
                                <select type="text" class="form-control text-center" name="type_ask" required>

                                    <option value="1"> علوم تطبيقية </option>
                                    <option value="2"> علوم إنسانية </option>
                                </select>
                                <label class="input-group-text">مجال التخصصي </label>
                            </div>
                            <div class="input-group mt-2">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" value="true" name="ans1">
                                </div>
                                <input type="text" class="form-control" name="res1">
                                <label class="input-group-text">جواب 1 </label>
                            </div>
                            <div class="input-group mt-2">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" value="true" name="ans2">
                                </div>
                                <input type="text" class="form-control" name="res2">
                                <label class="input-group-text">جواب 2 </label>
                            </div>
                            <div class="input-group mt-2">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" value="true" name="ans3">
                                </div>
                                <input type="text" class="form-control" name="res3">
                                <label class="input-group-text">جواب 3 </label>
                            </div>
                            <div class="input-group mt-2">
                                <select type="text" class="form-control text-center" name="show_hide">

                                    <option value="1"> اظهار</option>
                                    <option value="2">اخفاء</option>
                                </select>
                                <label class="input-group-text">اظهار - اخفاء </label>
                            </div>

                            <div class="text-center mt-3 ">
                                <button type="submit" class="btn btn-sm btn-primary w-50">اضافة </button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
@endsection

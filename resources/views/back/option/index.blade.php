@extends('back.index')
@section('webtitleadmin')
    تنظیمات سایت
@endsection
@section('content')





    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">

        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">تنظیمات سایت</span>

            </h3>

        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-0">
            <!--begin::Table-->
            <div class="table-responsive">


                <div class="col-12 col-md-12">
                    <form method="post" action="{{route('admin.option.logo',$options->id)}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">
                            {{-- سمت راست--}}
                            <div class="col-12 col-md-9">
                                <h5 class="text-danger">
                                    بخش کاراکترها
                                </h5>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>
                                            عنوان مربوط به کاراکترها
                                        </label>
                                        <input class="@error('titlechar') is-invalid @enderror form-control" type="text"
                                               name="titlechar" value="{{$options->titlechar}}"
                                               placeholder="عنوان کاراکترها">


                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>
                                            توضیحات مربوط به کاراکترها
                                        </label>
                                        <input class="@error('descriptionchar') is-invalid @enderror form-control"
                                               type="text" name="descriptionchar" value="{{$options->descriptionchar}}"
                                               placeholder="عنوان کاراکترها">


                                    </div>


                                </div>


                                <h5 class="text-danger">
                                    بخش ویدئو
                                </h5>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>
                                            عنوان مربوط به ویدئو
                                        </label>
                                        <input class="@error('titlevideo') is-invalid @enderror form-control"
                                               type="text" name="titlevideo" value="{{$options->titlevideo}}"
                                               placeholder="عنوان ویدئو">





                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>
                                            فیلم با فرمت mp4
                                        </label>
                                        <div class="row">

                                            <div class="col-12  form-group">

                                                <input type="file" name="video"
                                                       class="dropzone dropzone-default dz-clickable"
                                                       id="kt_dropzone_2" style="width: 100%">


                                                {{--  <input class="dropzone" id="dropzone" type="file" name="filename" >--}}
                                            </div>
                                            <hr>
                                            <div class="col-12">
                                            <span>

                                    <video width="100%" controls>
      <source src="{{url('/video/'.$options->video)}}" type="video/mp4">

      Your browser does not support HTML5 video.
    </video>



                        </span>

                                        </div>
                                        </div>


                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>
                                            تصویر روی فیلم
                                        </label>
                                        <div class="row">

                                            <div class="col-12  form-group">

                                                <input type="file" name="picvideo"
                                                       class="dropzone dropzone-default dz-clickable"
                                                       id="kt_dropzone_3" style="width: 100%">


                                                {{--  <input class="dropzone" id="dropzone" type="file" name="filename" >--}}
                                            </div>
                                            <div class="col-12">

                                    <span >
                            <img width="100%" src="{{url('/images/thumb/'.$options->picvideo)}}" class="h-75 align-self-end"
                                 alt="">
                        </span>


                                            </div>

                                        </div>


                                    </div>


                                </div>


                                <h5 class="text-danger">
                                    بخش دوره ها
                                </h5>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>
                                            عنوان مربوط به دوره ها
                                        </label>
                                        <input class="@error('titledore') is-invalid @enderror form-control" type="text"
                                               name="titledore" value="{{$options->titledore}}"
                                               placeholder="عنوان دوره ها">

                                        </span>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>
                                            توضیحات مربوط به دوره ها
                                        </label>
                                        <input class="@error('descriptiondore') is-invalid @enderror form-control"
                                               type="text" name="descriptiondore" value="{{$options->descriptiondore}}"
                                               placeholder="توضیحات مربوط به دوره ها">


                                    </div>


                                </div>


                                <h5 class="text-danger">
                                    بخش بلاگ
                                </h5>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>
                                            عنوان مربوط به بلاگ
                                        </label>
                                        <input class="@error('titleblog') is-invalid @enderror form-control" type="text"
                                               name="titleblog" value="{{$options->titleblog}}"
                                               placeholder="عنوان بلاگ">

                                        </span>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>
                                            توضیحات مربوط به بلاگ
                                        </label>
                                        <input class="@error('descriptionblog') is-invalid @enderror form-control"
                                               type="text" name="descriptionblog" value="{{$options->descriptionblog}}"
                                               placeholder="توضیحات بلاگ">


                                    </div>


                                </div>


                                <h5 class="text-danger">
                                    بخش آزمون ها
                                </h5>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>
                                            عنوان مربوط به آزمون ها
                                        </label>
                                        <input class="@error('titleazmoon') is-invalid @enderror form-control"
                                               type="text" name="titleazmoon" value="{{$options->titleazmoon}}"
                                               placeholder="عنوان آزمون ها">

                                        </span>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>
                                            توضیحات مربوط به آزمون ها
                                        </label>
                                        <input class="@error('descriptionazmoon') is-invalid @enderror form-control"
                                               type="text" name="descriptionazmoon"
                                               value="{{$options->descriptionazmoon}}"
                                               placeholder="توضیحات مربوط به آزمون ها">


                                    </div>


                                </div>


                                <h5 class="text-danger">
                                    بخش فوتر (پایین صفحه)
                                </h5>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>
                                            توضیحات زیر لوگو فوتر
                                        </label>
                                        <input class="@error('descriptionfooter') is-invalid @enderror form-control"
                                               type="text" name="descriptionfooter"
                                               value="{{$options->descriptionfooter}}" placeholder="توضیحات فوتر">

                                        </span>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>
                                            لینک اینستاگرام
                                        </label>
                                        <input class="@error('linkinstagram') is-invalid @enderror form-control"
                                               type="text" name="linkinstagram" value="{{$options->linkinstagram}}"
                                               placeholder="لینک اینستاگرام">


                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>
                                            قانون کپی رایت
                                        </label>
                                        <input class="@error('copyright') is-invalid @enderror form-control" type="text"
                                               name="copyright" value="{{$options->copyright}}" placeholder="کپی رایت">

                                        </span>
                                    </div>


                                </div>


                            </div>

                            <div class="col-12 col-md-3">
                                <h5 class="text-danger">
                                    لوگو
                                </h5>
                                <hr>
                                <div class="row">

                                    <div class="col-12  form-group">

                                        <input type="file" name="logo" class="dropzone dropzone-default dz-clickable"
                                               id="kt_dropzone_1">


                                        {{--  <input class="dropzone" id="dropzone" type="file" name="filename" >--}}
                                    </div>
                                    <div class="col-12">

                                    <span class="m-4">
                            <img width="100%" src="{{url('/images/thumb/'.$options->logo)}}" class="h-75 align-self-end"
                                 alt="">
                        </span>


                                    </div>

                                </div>
                            </div>


                            {{--  <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                                  <select class="custom-select-box form-control @error('slug') is-invalid @enderror">
                                      <option>نوع اشتراک</option>
                                      <option >عضویت عادی</option>
                                      <option>عضویت ویژه</option>

                                  </select>
                              </div>
          --}}


                            <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">

                                <button class="btn font-weight-bolder btn-sm btn-light-success px-5" type="submit"
                                        name="submit-form"><span class="txt">ذخیره تغییرات <i
                                                class="fa fa-angle-left"></i></span></button>
                            </div>

                        </div>
                    </form>
                </div>


            </div>


        </div>
        <!--end::Body-->
    </div>

@endsection
@extends('back.index')
@section('webtitleadmin')
    مدیریت تبلیغ
@endsection
@section('content')

    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">ویرایش تبلیغ</span>

            </h3>

        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-0">

            <form method="post" action="{{route('admin.adver.update',$adver->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">
                    {{-- سمت راست--}}
                    <div class="col-12 col-md-8">
                        <div class="row">


                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>عنوان تبلیغ</label>
                                <input class="@error('name') is-invalid @enderror form-control" type="text" name="name" value="{{$adver->name}}" placeholder="عنوان" >

                                </span>
                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>شعار تبلیغ</label>
                                <input class="@error('lid') is-invalid @enderror form-control" type="text" name="lid" value="{{$adver->lid}}" placeholder="شعار" >

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>نوشته روی دکمه</label>
                                <input class="@error('title_link') is-invalid @enderror form-control" type="text" name="title_link" value="{{$adver->title_link}}" placeholder="عنوان دکمه" >

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>لینک تبلیغ</label>
                                <input class="@error('link') is-invalid @enderror form-control" type="text" name="link" value="{{$adver->link}}" placeholder="لینک تبلیغ" >

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>رنگ پس زمینه</label>

                                <input class="@error('bgcolor') is-invalid @enderror form-control" value="{{$adver->bgcolor}}" name="bgcolor" id="example-color-input" type="color">

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label> رنگ پس زمینه دوم</label>

                                <input class="@error('bgcolor2') is-invalid @enderror form-control" value="{{$adver->bgcolor2}}" name="bgcolor2" id="example-color-input" type="color">

                                </span>
                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>وضعیت انتشار</label>
                                <select class="@error('status') is-invalid @enderror form-control"  name="status">

                                    <option value="1">منتشر شده</option>
                                    <option value="0" <?php if ($adver->status == 0) {
                                        echo "selected";
                                    }   ?>>منتشر نشده
                                    </option>
                                </select>
                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>جایگاه</label>
                                <select class="@error('place') is-invalid @enderror form-control"  name="place">

                                    <option value="1">جایگاه اول</option>
                                    <option value="0" <?php if ($adver->place == 0) {
                                        echo "selected";
                                    }   ?>>جایگاه دوم
                                    </option>
                                </select>
                            </div>























                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="row">

                            <div class="col-12  form-group">
                                <label>
                                    ابعاد استاندارد 800 در 533 پیکسل می باشد
                                </label>
                                <input type="file" name="image"  class="dropzone dropzone-default dz-clickable" id="kt_dropzone_1">




                                {{--  <input class="dropzone" id="dropzone" type="file" name="filename" >--}}
                            </div>
                            <div class="col-12">
                                <span class="m-4" >
                            <img width="100%" src="{{url('/images/adver/thumb/'.$adver->image)}}" class="h-75 align-self-end" alt="">
                        </span>
                                <hr>
                                <a class="btn btn-success btn-sm " href="{{url('/images/adver/'.$adver->image)}}">
                                    <i class="fa fa-folder"></i>
                                    دانلود کنید!
                                </a>
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
                        <button class="btn font-weight-bolder btn-sm btn-light-success px-5" type="submit" name="submit-form"><span class="txt">ذخیره تغییرات <i class="fa fa-angle-left"></i></span></button>
                    </div>

                </div>
            </form>


        </div>
        <!--end::Body-->
    </div>

@endsection

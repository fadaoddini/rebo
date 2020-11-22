@extends('back.index')
@section('webtitleadmin')
    مدیریت اسلایدر
@endsection
@section('content')

    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">ویرایش اسلایدر</span>

            </h3>

        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-0">

            <form method="post" action="{{route('admin.slider.update',$slider->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">
                    {{-- سمت راست--}}
                    <div class="col-12 col-md-8">
                        <div class="row">


                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>عنوان اسلایدر</label>
                                <input class="@error('name') is-invalid @enderror form-control" type="text" name="name" value="{{$slider->name}}" placeholder="عنوان" >

                                </span>
                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>شعار اسلایدر</label>
                                <input class="@error('lid') is-invalid @enderror form-control" type="text" name="lid" value="{{$slider->lid}}" placeholder="شعار" >

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>نوشته روی دکمه</label>
                                <input class="@error('title_link') is-invalid @enderror form-control" type="text" name="title_link" value="{{$slider->title_link}}" placeholder="عنوان دکمه" >

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>لینک اسلایدر</label>
                                <input class="@error('link') is-invalid @enderror form-control" type="text" name="link" value="{{$slider->link}}" placeholder="لینک اسلایدر" >

                                </span>
                            </div>























                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="row">

                            <div class="col-12  form-group">

                                <input type="file" name="image"  class="dropzone dropzone-default dz-clickable" id="kt_dropzone_1">




                                {{--  <input class="dropzone" id="dropzone" type="file" name="filename" >--}}
                            </div>
                            <div class="col-12">
                                <span class="m-4" >
                            <img width="100%" src="{{url('/images/slider/thumb/'.$slider->image)}}" class="h-75 align-self-end" alt="">
                        </span>
                                <hr>
                                <a class="btn btn-success btn-sm " href="{{url('/images/slider/'.$slider->image)}}">
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

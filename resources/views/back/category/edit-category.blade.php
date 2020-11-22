@extends('back.index')
@section('webtitleadmin')
    مدیریت دسته بندی ها
@endsection
@section('content')

    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">ویرایش دسته بندی</span>

            </h3>

        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-0">

            <form method="post" action="{{route('admin.cat.update',$category->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">



                    <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>
                                    عنوان
                                </label>
                                <input class="@error('name') is-invalid @enderror form-control" type="text" name="name"
                                       value="{{$category->name}}" placeholder="نام">

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>
                                    جایگاه (اعداد بزرگتر بالاتر قرار می گیرند)
                                </label>
                                <input class="@error('place') is-invalid @enderror form-control" type="text"
                                       name="place" value="{{$category->place}}" placeholder="جایگاه">

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>
                                    عنوان انگلیسی
                                </label>
                                <input class="@error('en_name') is-invalid @enderror form-control" type="text"
                                       name="en_name" value="{{$category->en_name}}" placeholder="title">

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>
                                    متاتگ (هر تگ را با یک کامای انگلیسی جدا کنید)
                                </label>
                                <input class="@error('metatag') is-invalid @enderror form-control" type="text"
                                       name="metatag" value="{{$category->metatag}}" placeholder="متاتگ">

                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="row">

                            <div class="col-12  form-group">
                                <label>
                                    ابعاد استاندارد 36 در 36 پیکسل می باشد
                                </label>
                                <input type="file" name="image"  class="dropzone dropzone-default dz-clickable" id="kt_dropzone_1">




                                {{--  <input class="dropzone" id="dropzone" type="file" name="filename" >--}}
                            </div>
                            <div class="col-12">
                                <span class="m-4" >
                            <img width="100%" src="{{url('/images/category/thumb/'.$category->image)}}" class="h-75 align-self-end" alt="">
                        </span>
                                <hr>
                                <a class="btn btn-success btn-sm " href="{{url('/images/category/'.$category->image)}}">
                                    <i class="fa fa-folder"></i>
                                    دانلود کنید!
                                </a>
                            </div>

                        </div>
                    </div>



                    <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                        <button class="btn font-weight-bolder btn-sm btn-light-danger px-5" type="submit" name="submit-form"><span class="txt">لغو <i class="fa fa-angle-left"></i></span></button>
                        <button class="btn font-weight-bolder btn-sm btn-light-success px-5" type="submit" name="submit-form"><span class="txt">ذخیره تغییرات <i class="fa fa-angle-left"></i></span></button>
                    </div>

                </div>
            </form>


        </div>
        <!--end::Body-->
    </div>

@endsection

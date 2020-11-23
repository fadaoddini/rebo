@extends('back.index')
@section('webtitleadmin')
    تبلیغ جدید
@endsection
@section('content')

    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark"> تبلیغ جدید</span>

            </h3>

        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-0">

            <form method="post" action="{{route('admin.adver.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">

                    {{-- سمت راست--}}
                    <div class="col-12 col-md-8">
                        <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                        <label>عنوان تبلیغ</label>
                        <input class="@error('name') is-invalid @enderror form-control" type="text" name="name" value="{{old('name')}}" placeholder="عنوان" >

                        </span>
                    </div>



                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                        <label>شعار تبلیغ</label>
                        <input class="@error('lid') is-invalid @enderror form-control" type="text" name="lid" value="{{old('lid')}}" placeholder="شعار" >

                        </span>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                        <label>نوشته روی دکمه</label>
                        <input class="@error('title_link') is-invalid @enderror form-control" type="text" name="title_link" value="{{old('title_link')}}" placeholder="عنوان دکمه" >

                        </span>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                        <label>لینک تبلیغ</label>
                        <input class="@error('link') is-invalid @enderror form-control" type="text" name="link" value="{{old('link')}}" placeholder="لینک تبلیغ" >

                        </span>
                    </div>




                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>رنگ پس زمینه</label>
                                <input class="@error('bgcolor') is-invalid @enderror form-control" value="{{old('bgcolor')}}" name="bgcolor" id="example-color-input" type="color">


                                </span>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>رنگ پس زمینه دوم</label>
                                <input class="@error('bgcolor2') is-invalid @enderror form-control" value="{{old('bgcolor2')}}" name="bgcolor2" id="example-color-input" type="color">


                                </span>
                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>وضعیت انتشار</label>
                                <select name="status" class="custom-select-box form-control @error('status') is-invalid @enderror">

                                    <option value="1">منتشر شده</option>
                                    <option value="0">منتشر نشده</option>

                                </select>
                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>جایگاه</label>
                                <select name="place" class="custom-select-box form-control @error('place') is-invalid @enderror">

                                    <option value="1">جایگاه اول</option>
                                    <option value="0">جایگاه دوم</option>

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





                            </div>

                        </div>
                    </div>






                    <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                        <button class="btn font-weight-bolder btn-sm btn-light-success px-5" type="submit" name="submit-form"><span class="txt">
                                ارسال اطلاعات
                                <i class="fa fa-angle-left"></i></span></button>
                    </div>

                </div>
            </form>


        </div>
        <!--end::Body-->
    </div>

@endsection

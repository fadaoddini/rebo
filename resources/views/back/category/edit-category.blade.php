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

            <form method="post" action="{{route('admin.cat.update',$category->id)}}">
                @csrf
                <div class="row clearfix">

                    <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                        <input class="@error('name') is-invalid @enderror form-control" type="text" name="name" value="{{$category->name}}" placeholder="نام" >

                        </span>
                    </div>

{{--
                    <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                        <input class="@error('slug') is-invalid @enderror form-control" type="text" name="slug" value="{{$category->slug}}" placeholder="نام مستعار" >

                        </span>
                    </div>--}}


                  {{--  <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                        <select class="custom-select-box form-control @error('slug') is-invalid @enderror">
                            <option>نوع اشتراک</option>
                            <option >عضویت عادی</option>
                            <option>عضویت ویژه</option>

                        </select>
                    </div>
--}}


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
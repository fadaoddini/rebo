@extends('back.index')
@section('webtitleadmin')
    پنل مدیریت کاربران
@endsection
@section('content')

    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">ویرایش کاربران</span>

            </h3>

        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-0">


            <form method="post" action="{{route('adminupadteprofile',$user->id)}}">
                @csrf
                <div class="row clearfix">

                    <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                        <input class="@error('name') is-invalid @enderror form-control" type="text" name="name" value="{{$user->name}}" placeholder="نام" >

                        </span>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                        <input class="@error('family') is-invalid @enderror form-control" type="text" name="family" value="{{$user->family}}" placeholder="نام خانوادگی" >


                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                        <p class="btn btn-light">
                            {{$user->email}}
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                        <input class="@error('mobile') is-invalid @enderror form-control" type="text" name="mobile" value="{{$user->mobile}}" placeholder="09123456789" >


                    </div>


                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                        <input class="@error('city') is-invalid @enderror form-control" type="text" name="city" value="{{$user->city}}" placeholder="تهران" >


                    </div>






                    <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                        <select class="custom-select-box form-control">
                            <option>نوع اشتراک</option>
                            <option>عضویت عادی</option>
                            <option>عضویت ویژه</option>

                        </select>
                    </div>

                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                        <label>کلمه عبور</label>
                        <span class="eye-icon flaticon-eye"></span>
                        <input class="@error('password') is-invalid @enderror form-control" type="password" name="password"  placeholder="کلمه عبور" >

                    </div>




                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <textarea name="description" class="form-control" placeholder="پیام شما">{{$user->description}}</textarea>
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

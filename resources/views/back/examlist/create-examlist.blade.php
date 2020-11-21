@extends('back.index')
@section('webtitleadmin')
    آزمون جدید
@endsection
@section('content')

    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark"> آزمون جدید</span>

            </h3>

        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-0">

            <form method="post" action="{{route('admin.examlist.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">

                    {{-- سمت راست--}}
                    <div class="col-12 col-md-8">
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>
                                    عنوان آزمون
                                </label>
                                <input class="@error('name') is-invalid @enderror form-control" type="text" name="name"
                                       value="{{old('name')}}" placeholder="عنوان">

                                </span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>
                                    مدت زمان پاسخ گویی (به دقیقه)
                                </label>
                                <input class="@error('timing') is-invalid @enderror form-control" type="text"
                                       name="timing" value="{{old('timing')}}" placeholder="مدت زمان پاسخ گویی">

                                </span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>
                                    امتیاز کامل آزمون
                                </label>
                                <input class="@error('score') is-invalid @enderror form-control" type="text"
                                       name="score" value="{{old('score')}}" placeholder="امتیاز کامل آزمون">

                                </span>
                            </div>

                            {{--<div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label >دسته بندی ها</label>

                                <div id="output"></div>

                                <select name="categories[]" class="form-control select2 @error('categories') is-invalid @enderror" id="kt_select2_3"  multiple="multiple">


                                    @foreach($categories as $cat_id => $cat_name)
                                        <option value="{{$cat_name}}">{{$cat_id}}</option>


                                    @endforeach

                                </select>

                            </div>
--}}

                        </div>
                    </div>


                    <div class="col-12 col-md-4">
                        <div class="row">

                            <div class="col-12  form-group">

                                <input type="file" name="images" class="dropzone dropzone-default dz-clickable"
                                       id="kt_dropzone_1">


                                {{--  <input class="dropzone" id="dropzone" type="file" name="filename" >--}}
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
                        <button class="btn font-weight-bolder btn-sm btn-light-danger px-5" type="submit"
                                name="submit-form"><span class="txt">لغو <i class="fa fa-angle-left"></i></span>
                        </button>
                        <button class="btn font-weight-bolder btn-sm btn-light-success px-5" type="submit"
                                name="submit-form"><span class="txt">
                                ارسال اطلاعات
                                <i class="fa fa-angle-left"></i></span></button>
                    </div>

                </div>
            </form>


        </div>
        <!--end::Body-->
    </div>

@endsection
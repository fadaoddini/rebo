@extends('back.index')
@section('webtitleadmin')
    سوال جدید
@endsection
@section('content')

    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark"> سوال جدید</span>

            </h3>

        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-0">

            <form method="post" action="{{route('admin.azmoon.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">

                    {{-- سمت راست--}}
                    <div class="col-12 col-md-8">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label>
                                    سوال خود را بنویسید
                                </label>
                                <input class="@error('name') is-invalid @enderror form-control" type="text" name="name"
                                       value="{{old('name')}}" placeholder="سوال">

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label>
                                    پاسخ A را بنویسید
                                </label>
                                <input class="@error('q1') is-invalid @enderror form-control" type="text" name="q1"
                                       value="{{old('q1')}}" placeholder="سوال">

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label>
                                    پاسخ B را بنویسید
                                </label>
                                <input class="@error('q2') is-invalid @enderror form-control" type="text" name="q2"
                                       value="{{old('q2')}}" placeholder="سوال">

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label>
                                    پاسخ C را بنویسید
                                </label>
                                <input class="@error('q3') is-invalid @enderror form-control" type="text" name="q3"
                                       value="{{old('q3')}}" placeholder="سوال">

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label>
                                    پاسخ D را بنویسید
                                </label>
                                <input class="@error('q4') is-invalid @enderror form-control" type="text" name="q4"
                                       value="{{old('q4')}}" placeholder="سوال">

                                </span>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label>
                                    جواب صحیح کدام گزینه است؟
                                </label>
                                <select name="res"
                                        class="custom-select-box form-control @error('res') is-invalid @enderror">
                                    <option value="q1">A</option>
                                    <option value="q2">B</option>
                                    <option value="q3">C</option>
                                    <option value="q4">D</option>

                                </select>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label>مربوط به آزمون</label>

                                <div id="output"></div>

                                <select name="examlists[]"
                                        class="form-control select2 @error('examlists') is-invalid @enderror"
                                        id="kt_select2_7" multiple="multiple">


                                    @foreach($examlists as $examlist_id => $examlist_name)
                                        <option value="{{$examlist_name}}">{{$examlist_id}}</option>


                                    @endforeach

                                </select>

                            </div>


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
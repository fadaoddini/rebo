@extends('back.index')
@section('webtitleadmin')
    مدیریت نظرات
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">ویرایش نظرات

                 <span class="text-dark small">
                     {
                     توسط :


                 <span class="text-primary small">

                                 {{Auth::user()->name}}

                     {{Auth::user()->family}}
                            </span>
     }
                </span>

</span>
            </h3>

        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-0">

            <form method="post" action="{{route('admin.comment.update',$comment->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">

                    {{-- سمت راست--}}
                    <div class="col-12 col-md-8">
                        <div class="row">



                            <div class="row col-12  rounded-sm py-4">




                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>متن نظر</label>
                                    <textarea class="textareatiny @error('body') is-invalid @enderror form-control"
                                              name="body">
{{$comment->body}}
                        </textarea>
                                </div>



                            </div>




                        </div>
                    </div>


                    {{-- سمت چپ--}}
                    <div class="col-12 col-md-4">
                        <div class="row">

                            <div class="row col-12 bg-dark-o-15 rounded-sm py-4">
                                <div class="col-lg-12 col-md-12 bg-dark-o-40 py-4 rounded-sm col-sm-12 form-group">
                                    <label>وضعیت انتشار</label>
                                    <select class="@error('status') is-invalid @enderror form-control"  name="status">

                                        <option value="1">منتشر شده</option>
                                        <option value="0" <?php if ($comment->status == 0) {
                                            echo "selected";
                                        }   ?>>منتشر نشده
                                        </option>
                                    </select>
                                </div>



                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                        <button class="btn font-weight-bolder btn-sm btn-light-danger px-5" type="submit"
                                name="submit-form"><span class="txt">لغو <i class="fa fa-angle-left"></i></span>
                        </button>
                        <button class="btn font-weight-bolder btn-sm btn-light-success px-5" type="submit"
                                name="submit-form"><span class="txt">ذخیره تغییرات <i
                                        class="fa fa-angle-left"></i></span></button>
                    </div>

                </div>
            </form>


        </div>
        <!--end::Body-->
    </div>

{{--    <script src="{{url('/admin/js/pages/crud/forms/widgets/select2.js')}}"></script>--}}

@endsection
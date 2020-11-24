@extends('back.index')
@section('webtitleadmin')
    مدیریت مناطق
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">ویرایش منطقه

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

            <form method="post" action="{{route('admin.mahdode.update',$mahdode->id)}}" >
                @csrf
                <div class="row clearfix">

                    {{-- سمت راست--}}
                    <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="card-title pt-5 border-bottom">
                                <h3 class="card-label">
                                    <span class="d-block text-success font-size-sm">
                                        <i class="icon text-success  flaticon-exclamation-square"></i>
                                        اطلاعات اولیه
                                    </span>

                                </h3>
                            </div>
                            <div class="row col-12 rounded-sm py-4">


                                <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                    <label>عنوان</label>
                                    <input class="@error('name') is-invalid @enderror form-control" type="text" name="name"
                                           value="{{$mahdode->name}}" placeholder="نام">

                                    </span>
                                </div>







                            </div>

                            <div class="card-title pt-5 border-bottom">
                                <h3 class="card-label">
                                    <span class="d-block text-success font-size-sm">
                                        <i class="icon text-success  flaticon-business"></i>
                                        اطلاعات ریالی


                                    </span>

                                </h3>
                            </div>
                            <div class="row col-12  rounded-sm py-4">

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label>قیمت ارسال ( تومان )</label>
                                    <input class="@error('price') is-invalid @enderror form-control" type="text" name="price"
                                           value="{{$mahdode->price}}" placeholder="3000">


                                    </span>
                                </div>




                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label>زمان تقریبی ارسال ( بر اساس دقیقه )</label>
                                    <input class="@error('timing') is-invalid @enderror form-control" type="text" name="timing"
                                           value="{{$mahdode->timing}}" >


                                    </span>
                                </div>


                            </div>




                        </div>
                    </div>


                    {{-- سمت چپ--}}
                    <div class="col-12 col-md-4">
                        <div class="row">

                            <div class="row col-12 bg-dark-o-15 rounded-sm py-4">
                                <div class="col-lg-12 col-md-12 bg-dark-o-40 py-4 rounded-sm col-sm-12 form-group">
                                    <label>وضعیت منطقه</label>
                                    <select class="@error('status') is-invalid @enderror form-control"  name="status">

                                        <option value="1">تحت پوشش</option>
                                        <option value="0" <?php if ($mahdode->status == 0) {
                                            echo "selected";
                                        }   ?>>خارج از سرویس دهی
                                        </option>
                                    </select>
                                </div>



                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">

                        <button class="btn font-weight-bolder btn-sm btn-light-success px-5" type="submit"
                                name="submit-form"><span class="txt">ذخیره تغییرات <i
                                        class="fa fa-angle-left"></i></span></button>
                    </div>

                </div>
            </form>


        </div>
        <!--end::Body-->
    </div>

    <script src="{{url('/admin/js/pages/crud/forms/widgets/select2.js')}}"></script>

@endsection

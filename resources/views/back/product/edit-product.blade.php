@extends('back.index')
@section('webtitleadmin')
    مدیریت محصولات
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">ویرایش محصول

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

            <form method="post" action="{{route('admin.product.update',$product->id)}}" enctype="multipart/form-data">
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
                                           value="{{$product->name}}" placeholder="نام">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" >
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
                                    <label>قیمت محصول ( تومان )</label>
                                    <input class="@error('price') is-invalid @enderror form-control" type="text" name="price"
                                           value="{{$product->price}}" placeholder="500000">


                                    </span>
                                </div>




                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label>درصد تخفیف ( پیش فرض 0 درصد )</label>
                                    <input class="@error('takhfif') is-invalid @enderror form-control" type="text" name="takhfif"
                                           value="{{$product->takhfif}}" placeholder="20">


                                    </span>
                                </div>


                            </div>



                            <div class="card-title pt-5 border-bottom">
                                <h3 class="card-label">
                                    <span class="d-block text-success font-size-sm ">
                                        <i class="icon text-success  flaticon-notes"></i>

                                        اطلاعات تکمیلی</span>

                                </h3>
                            </div>
                            <div class="row col-12  rounded-sm py-4">




                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>لید ( توضیح مختصری در رابطه با محصول بنویسید)</label>
                                    <input class="@error('lid') is-invalid @enderror form-control" type="text" name="lid"
                                           value="{{$product->lid}}" placeholder="لید را وارد کنید ">

                                    </span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>متن کامل</label>
                                    <textarea class="textareatiny @error('description') is-invalid @enderror form-control"
                                              name="description">
{{$product->description}}
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
                                        <option value="0" <?php if ($product->status == 0) {
                                            echo "selected";
                                        }   ?>>منتشر نشده
                                        </option>
                                    </select>
                                </div>





                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label >دسته بندی ها</label>

                                    <div id="output"></div>

                                    <select name="categories[]"
                                            class="form-control select2 @error('categories') is-invalid @enderror" id="kt_select2_3"
                                            multiple="multiple">


                                        @foreach($categories as $cat_name => $cat_id )

                                            <option value="{{$cat_id}}"


                                            <?php

                                                if (in_array($cat_id, $product->categories->pluck('id')->toArray())) echo "selected"


                                                ?>>
                                                {{$cat_name}}

                                            </option>


                                        @endforeach

                                    </select>

                                </div>







                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>موقعیت نمایش محصول ( عادی / ویژه )</label>

                                    <select class="@error('vije') is-invalid @enderror form-control"  name="vije">

                                        <option value="1">ویژه (نمایش در محل مخصوص)</option>
                                        <option value="0" <?php if ($product->status == 0) {
                                            echo "selected";
                                        }   ?>>عادی
                                        </option>
                                    </select>

                                </div>

                                <div class=" col-12 form-group">




                                    <input type="file" name="image"  >



                                    <div class="col-12">
                                <span class="m-4" >
                            <img width="100%" src="{{url('/images/product/thumb/'.$product->image)}}" class="h-75 align-self-end" alt="">
                        </span>

                                    </div>



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

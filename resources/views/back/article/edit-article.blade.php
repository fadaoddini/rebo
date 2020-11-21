@extends('back.index')
@section('webtitleadmin')
    مدیریت دسته بندی ها
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">ویرایش دسته بندی

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

            <form method="post" action="{{route('admin.article.update',$article->id)}}" enctype="multipart/form-data">
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
                                           value="{{$article->name}}" placeholder="نام">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" >
                                    </span>
                                </div>


                                {{--<div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                    <label>نام مستعار</label>
                                    <input class="@error('slug') is-invalid @enderror form-control" type="text" name="slug"
                                           value="{{$article->slug}}" placeholder="نام مستعار">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                    </span>
                                </div>--}}




                                <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                    <label>نام دبیر</label>
                                    <input class="@error('teacher') is-invalid @enderror form-control" type="text" name="teacher"
                                           value="{{$article->teacher}}" placeholder="نام دبیر">


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
                                    <label>قیمت دوره ( تومان )</label>
                                    <input class="@error('price') is-invalid @enderror form-control" type="text" name="price"
                                           value="{{$article->price}}" placeholder="500000">


                                    </span>
                                </div>




                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <label>درصد تخفیف ( پیش فرض 0 درصد )</label>
                                    <input class="@error('takhfif') is-invalid @enderror form-control" type="text" name="takhfif"
                                           value="{{$article->takhfif}}" placeholder="20">


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
                                    <label>لید ( توضیح مختصری از مطلب که مفهومی کلی از آن را به مخاطب برساند)</label>
                                    <input class="@error('lid') is-invalid @enderror form-control" type="text" name="lid"
                                           value="{{$article->lid}}" placeholder="لید را وارد کنید ">

                                    </span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>متن کامل</label>
                                    <textarea class="textareatiny @error('description') is-invalid @enderror form-control"
                                              name="description">
{{$article->description}}
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
                                        <option value="0" <?php if ($article->status == 0) {
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

                                                if (in_array($cat_id, $article->categories->pluck('id')->toArray())) echo "selected"


                                                ?>>
                                                {{$cat_name}}

                                            </option>


                                        @endforeach

                                    </select>

                                </div>







                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label >انتخاب کاراکتر (سطح بندی)</label>

                                    <div id="output"></div>

                                    <select name="levels[]"
                                            class="form-control  @error('levels') is-invalid @enderror"
                                    >


                                        @foreach($levels as $level_name => $level_id )

                                            <option value="{{$level_id}}"


                                            <?php

                                                if (in_array($level_id, $article->levels->pluck('id')->toArray())) echo "selected"


                                                ?>>
                                                {{$level_name}}

                                            </option>


                                        @endforeach

                                    </select>

                                </div>






                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>شرایط دوره ( عادی / ویژه )</label>

                                    <select class="@error('special') is-invalid @enderror form-control"  name="special">

                                        <option value="1">ویژه (رایگان برای حساب های ویژه )</option>
                                        <option value="0" <?php if ($article->status == 0) {
                                            echo "selected";
                                        }   ?>>عادی ( در هر شرایطی مبلغ دارند )
                                        </option>
                                    </select>

                                </div>

                                <div class=" col-12 form-group">




                                    <input type="file" name="filename"  >


                                    <?php
                                    $ext = $article->formating;

                                    if(($ext == "jpg") or ($ext == "jpeg") or ($ext == "png") or ($ext == "gif")){
                                    ?>
                                    <div class="col-12">
                                <span class="m-4" >
                            <img width="100%" src="{{url('/images/thumb/'.$article->filename)}}" class="h-75 align-self-end" alt="">
                        </span>
                                        <hr>
                                        <a class="btn btn-success btn-sm " href="{{url('/images/'.$article->filename)}}">
                                            <i class="fa fa-folder"></i>
                                            دانلود کنید!
                                        </a>
                                    </div>
                                    <?php
                                    }elseif (($ext == "mp4") or ($ext == "avi")) {
                                    ?>
                                    <div class="col-12">
                                <span class="m-4" >

                                    <video width="100%"  controls>
      <source src="{{url('/video/'.$article->filename)}}" type="video/mp4">

      Your browser does not support HTML5 video.
    </video>
                                    <hr>
                                     <a class="btn btn-success btn-sm " href="{{url('/video/'.$article->filename)}}">
                                          <i class="fa fa-folder"></i>
                                        دانلود کنید!
                                    </a>


                        </span>
                                    </div>

                                    <?php
                                    }elseif (($ext == "pdf") or ($ext == "zip")) {
                                    ?>
                                    <div class="col-12">
                                <span class="m-4" >

                                    <a class="btn btn-success btn-sm " href="{{url('/book/'.$article->filename)}}">
                                          <i class="fa fa-folder"></i>
                                        دانلود کنید!
                                    </a>

                                </span>
                                    </div>

                                    <?php
                                    }elseif ($ext == "mp3") {
                                    ?>
                                    <div class="col-12">
                                <span class="m-4" >

                        <audio controls>

                            <source src="{{url('/sound/'.$article->filename)}}" type="audio/mpeg">
                            Your browser does not support the audio tag.
                        </audio>
                                     <hr>
                            <a class="btn btn-success btn-sm " href="{{url('/sound/'.$article->filename)}}">
                                <i class="fa fa-folder"></i>
                                دانلود کنید!
                            </a>
                                </span>
                                    </div>

                                    <?php
                                    }

                                    ?>


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

    <script src="{{url('/admin/js/pages/crud/forms/widgets/select2.js')}}"></script>

@endsection
@extends('back.index')
@section('webtitleadmin')
    مدیریت آموزش ها
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">ویرایش آموزش

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

            <form method="post" action="{{route('admin.learn.update',$learn->id)}}" enctype="multipart/form-data">
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
                                           value="{{$learn->name}}" placeholder="نام">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    </span>
                                </div>

{{--

                                <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                    <label>نام مستعار</label>
                                    <input class="@error('slug') is-invalid @enderror form-control" type="text" name="slug"
                                           value="{{$learn->slug}}" placeholder="نام مستعار">


                                    </span>
                                </div>
--}}





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
                                    <label>متن کامل</label>
                                    <textarea class="textareatiny @error('description') is-invalid @enderror form-control"
                                              name="description">
{{$learn->description}}
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
                                    <label>رایگان / غیر رایگان</label>
                                    <select class="@error('status') is-invalid @enderror form-control"  name="status">

                                        <option value="1">غیر رایگان</option>
                                        <option value="0" <?php if ($learn->status == 0) {
                                            echo "selected";
                                        }   ?>>رایگان
                                        </option>
                                    </select>
                                </div>





                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">

                                    <label>انتخاب دوره مرتبط</label>

                                    <select name="articles[]" class="form-control  @error('articles') is-invalid @enderror" >


                                        @foreach($articles as $article_name => $article_id )

                                            <option value="{{$article_id}}"


                                            <?php

                                                if (in_array($article_id, $learn->articles->pluck('id')->toArray())) echo "selected"


                                                ?>>
                                                {{$article_name}}

                                            </option>


                                        @endforeach

                                    </select>

                                </div>















                                <div class=" col-12 form-group">




                                    <input type="file" name="filename"  >


                                    <?php
                                    $ext = $learn->formating;

                                    if(($ext == "jpg") or ($ext == "jpeg") or ($ext == "png") or ($ext == "gif")){
                                    ?>
                                    <div class="col-12">
                                <span class="m-4" >
                            <img width="100%" src="{{url('/images/thumb/'.$learn->filename)}}" class="h-75 align-self-end" alt="">
                        </span>
                                        <hr>
                                        <a class="btn btn-success btn-sm " href="{{url('/images/'.$learn->filename)}}">
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
      <source src="{{url('/video/'.$learn->filename)}}" type="video/mp4">

      Your browser does not support HTML5 video.
    </video>
                                    <hr>
                                     <a class="btn btn-success btn-sm " href="{{url('/video/'.$learn->filename)}}">
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

                                    <a class="btn btn-success btn-sm " href="{{url('/book/'.$learn->filename)}}">
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

                            <source src="{{url('/sound/'.$learn->filename)}}" type="audio/mpeg">
                            Your browser does not support the audio tag.
                        </audio>
                                     <hr>
                            <a class="btn btn-success btn-sm " href="{{url('/sound/'.$learn->filename)}}">
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
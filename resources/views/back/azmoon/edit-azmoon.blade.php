@extends('back.index')
@section('webtitleadmin')
    ویرایش سوال
@endsection
@section('content')

    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">ویرایش سوال</span>

            </h3>

        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-0">

            <form method="post" action="{{route('admin.azmoon.update',$azmoon->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">
                    {{-- سمت راست--}}
                    <div class="col-12 col-md-8">
                        <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <input class="@error('name') is-invalid @enderror form-control" type="text" name="name" value="{{$azmoon->name}}" placeholder="نام" >

                        </span>
                    </div>




                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label>
                                    پاسخ A را بنویسید
                                </label>
                                <input class="@error('q1') is-invalid @enderror form-control" type="text" name="q1"
                                       value="{{$azmoon->q1}}" placeholder="سوال">

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label>
                                    پاسخ B را بنویسید
                                </label>
                                <input class="@error('q2') is-invalid @enderror form-control" type="text" name="q2"
                                       value="{{$azmoon->q2}}" placeholder="سوال">

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label>
                                    پاسخ C را بنویسید
                                </label>
                                <input class="@error('q3') is-invalid @enderror form-control" type="text" name="q3"
                                       value="{{$azmoon->q3}}" placeholder="سوال">

                                </span>
                            </div>


                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label>
                                    پاسخ D را بنویسید
                                </label>
                                <input class="@error('q4') is-invalid @enderror form-control" type="text" name="q4"
                                       value="{{$azmoon->q4}}" placeholder="سوال">

                                </span>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label>
                                     جواب صحیح کدام گزینه است؟ (
                                    <?php
                                    echo $azmoon->res;
                                    ?>

                                    )
                                </label>
                                <select name="res"
                                        class="custom-select-box form-control @error('res') is-invalid @enderror">

                                    <?php

                                    $selectq1="";
                                    $selectq2="";
                                    $selectq3="";
                                    $selectq4="";
                                        if ($azmoon->res=="q1"){
?>

                                        <option value="q1" selected>A</option>
                                        <option value="q2" >B</option>
                                        <option value="q3" >C</option>
                                        <option value="q4" >D</option>
                                    <?php

                                        }elseif ($azmoon->res=="q2"){

                                        ?>

                                        <option value="q1" >A</option>
                                        <option value="q2" selected>B</option>
                                        <option value="q3" >C</option>
                                        <option value="q4" >D</option>
                                        <?php
                                        }elseif ($azmoon->res=="q3"){

                                        ?>

                                        <option value="q1" >A</option>
                                        <option value="q2" >B</option>
                                        <option value="q3" selected>C</option>
                                        <option value="q4" >D</option>
                                        <?php
                                        }elseif ($azmoon->res=="q4"){

                                        ?>

                                        <option value="q1" >A</option>
                                        <option value="q2" >B</option>
                                        <option value="q3" >C</option>
                                        <option value="q4" selected>D</option>
                                        <?php
                                        }
                                    ?>


                                </select>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label>مربوط به آزمون</label>

                                <div id="output"></div>

                                <select name="examlists[]"
                                        class="form-control select2 @error('examlists') is-invalid @enderror"
                                        id="kt_select2_7" multiple="multiple">


                                    @foreach($examlists as $examlist_name => $examlist_id)
                                        <option value="{{$examlist_id}}"


                                        <?php

                                            if (in_array($examlist_id, $azmoon->examlists->pluck('id')->toArray())) echo "selected"


                                            ?>>
                                            {{$examlist_name}}

                                        </option>



                                    @endforeach

                                </select>

                            </div>


















                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="row">

                            <div class="col-12  form-group">

                                <input type="file" name="image"  class="dropzone dropzone-default dz-clickable" id="kt_dropzone_1">




                                {{--  <input class="dropzone" id="dropzone" type="file" name="filename" >--}}
                            </div>
                            <div class="col-12">
                                <span class="m-4" >
                            <img width="100%" src="{{url('/images/thumb/'.$azmoon->images)}}" class="h-75 align-self-end" alt="">
                        </span>
                                <hr>
                                <a class="btn btn-success btn-sm " href="{{url('/images/'.$azmoon->images)}}">
                                    <i class="fa fa-folder"></i>
                                    دانلود کنید!
                                </a>
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
                        <button class="btn font-weight-bolder btn-sm btn-light-danger px-5" type="submit" name="submit-form"><span class="txt">لغو <i class="fa fa-angle-left"></i></span></button>
                        <button class="btn font-weight-bolder btn-sm btn-light-success px-5" type="submit" name="submit-form"><span class="txt">ذخیره تغییرات <i class="fa fa-angle-left"></i></span></button>
                    </div>

                </div>
            </form>


        </div>
        <!--end::Body-->
    </div>

@endsection
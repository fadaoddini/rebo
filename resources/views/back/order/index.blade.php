@extends('back.index')
@section('webtitleadmin')
    پنل مدیریت سفارشات
@endsection
@section('content')


    <style type="text/css">
        .divTable
        {
            display:  table;
            width:100%;

        }


        .divRow
        {
            display:table-row;
            direction: rtl;
            text-align: center;
            padding: 4px 10px;
            background-color: rgba(204, 204, 204, 0.26);
        }

        .headRow
        {
            display:table-row;
            direction: rtl;
            text-align: center;
            padding: 4px 10px;
            background-color: rgba(88, 205, 139, 0.61);
        }

        .divCell
        {
            float:right;/*fix for  buggy browsers*/
            display:table-column;
            direction: rtl;
            padding: 4px 10px;
            text-align: center;
            width: auto;

        }
    </style>




    <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">

        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">مدیریت سفارشات</span>

            </h3>
            <div class="card-toolbar">
                <a href="#" class="btn btn-success font-weight-bolder font-size-sm">
                <span class="svg-icon svg-icon-md svg-icon-white">

                    <!--begin::Svg Icon | path:assets/media/svg/icons/ارتباطات/Add-user.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                         height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"></polygon>
        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
              fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
              fill="#000000" fill-rule="nonzero"></path>
    </g>
</svg>
                    <!--end::Svg Icon-->

                </span>بزودی
                </a>
            </div>
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body py-0">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center table-bordered text-center" id="kt_advance_table_widget_1">
                    <thead>
                    <tr class="text-center">
                        <th style="width: 20px">
                            <label class="checkbox checkbox-lg checkbox-inline">
                                <input value="1" type="checkbox">
                                <span></span>
                            </label>
                        </th>

                        <th style="min-width: 200px">سفارش دهنده</th>
                        <th style="min-width: 100px">موبایل</th>
                        <th style="min-width: 50px">ایمیل</th>
                        <th style="min-width: 50px">قیمت پرداخت شده</th>
                        <th style="min-width: 150px">وضعیت پرداخت</th>
                        <th style="min-width: 100px">روش پرداخت</th>
                        <th style="min-width: 100px">تاریخ</th>




                        <th class="pr-0 text-center" style="min-width: 150px">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($orders as $order)


                        @php

                            $basket=unserialize($order->basket);

                        @endphp


                        <div class="modal fade" id="moreorder{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="moreorder" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">خلاصه خرید</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="خلاصه خرید">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="divTable">
                                            <div class="headRow">
                                                <div class="divCell" style="min-width: 80px; max-width: 80px;"> ردیف</div>
                                                <div  class="divCell" style="min-width: 200px; max-width: 200px;">عنوان</div>
                                                <div  class="divCell" style="min-width: 100px; max-width: 100px;">مبلغ</div>
                                                <div  class="divCell" style="min-width: 100px; max-width: 50px;">تخفیف</div>
                                                <div  class="divCell" style="min-width: 100px; max-width: 100px;">مبلغ تخفیف</div>
                                                <div  class="divCell" style="min-width: 100px; max-width: 100px;"> جمع ردیف</div>
                                            </div>


                                            @foreach($basket as $item)
                                            <div class="divRow">
                                                <div class="divCell" style="min-width: 80px;max-width: 80px;">{{$item->id}}</div>
                                                <div class="divCell" style="min-width: 200px;max-width: 200px;">{{$item->name}}</div>
                                                <div class="divCell" style="min-width: 100px;max-width: 100px;">{{$item->price}}تومان</div>
                                                <div class="divCell" style="min-width: 100px;max-width: 50px;">{{$item->takhfif}}%</div>
                                                <div class="divCell" style="min-width: 100px;max-width: 100px;">{{(($item->price)*($item->takhfif))/100}}تومان</div>
                                                <div class="divCell" style="min-width: 100px;max-width: 100px;">{{(($item->price)-((($item->price)*($item->takhfif))/100))}}تومان</div>

                                            </div>

                                            @endforeach
                                        </div>








                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">بستن</button>
                                        <button type="button" class="btn btn-primary font-weight-bold">ذخیره تغییرات</button>
                                    </div>
                                </div>
                            </div>
                        </div>





                        @switch($order->pardakht)

                            @case(0)
                            @php $pardakht="ناقص";
                            $badgecolorstatus='badge-danger';
                            $badgecolorstatus1='badge-white';@endphp
                            @break

                            @case(1)
                            @php $pardakht="کامل";
                            $badgecolorstatus='badge-success';
                            $badgecolorstatus1=' ';



                            @endphp
                            @break

                        @endswitch

                        @switch($order->rah_pay)

                            @case(1)
                            @php $bank="زرین پال";
                            $badgecolorbank='badge-warning';
                            $badgecolorbank1='badge-white';@endphp
                            @break

                            @case(2)
                            @php $bank="بانک ملت";
                            $badgecolorbank='badge-success';
                            $badgecolorbank1=' ';



                            @endphp
                            @break

                        @endswitch




                        <tr class="{{$badgecolorstatus1}}">
                            <td >
                                <label class="checkbox checkbox-lg checkbox-inline">
                                    <input value="1" type="checkbox">
                                    <span></span>
                                </label>
                            </td>

                            <td class="pl-0">
                                <p class="text-dark-75  m-1 text-hover-primary   ">
                                    {{$order->user->family}}

                                </p>
                            </td>


                            <td class="pl-0">
                                <p class="text-dark-75 m-1  text-hover-primary   ">
                                    {{$order->user->mobile}}

                                </p>
                            </td>


                            <td class="pl-0">
                                <p class="text-dark-75 m-1  text-hover-primary   ">
                                    {{$order->user->email}}

                                </p>
                            </td>


                            <td class="pl-0">
                                <p class="text-dark-75 m-1   text-hover-primary badge badge-white   ">
                                    {{$order->amount}}تومان

                                </p>
                            </td>






                            <td class="pl-0">
                                <a href="{{route('statuschangeorder',$order->id)}}" class="badge  {{$badgecolorstatus}} ">
                                    {{$pardakht}}

                                </a>
                            </td>



                            <td class="pl-0">
                                <p  class="text-dark-75 m-1   text-hover-primary badge  {{$badgecolorbank}} ">
                                    {{$bank}}

                                </p>
                            </td>


                            <td class="pl-0">
                                <p  class="text-dark-75 m-1   text-hover-primary badge badge-light">
                                    {{jdate($order->timeing)->format('%A, %d %B')}}

                                </p>
                            </td>


                            <td class="pr-0 text-center">

                                <a class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3" data-toggle="modal" data-target="#moreorder{{$order->id}}">
                                <span class="svg-icon svg-icon-md svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/ارتباطات/Write.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
              fill="#000000" fill-rule="nonzero"
              transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "></path>
        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
              fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
    </g>
</svg><!--end::Svg Icon--></span> </a>



                                <a href="{{route('admin.order.delete',$order->id)}}" onclick="return confirm('آیا سفارش حذف شود؟');" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                <span class="svg-icon svg-icon-md svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/general/زباله ها.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
              fill="#000000" fill-rule="nonzero"></path>
        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
              fill="#000000" opacity="0.3"></path>
    </g>
</svg><!--end::Svg Icon--></span> </a>
                            </td>
                        </tr>





                    @endforeach
                    </tbody>
                </table>
            </div>
        {{ $orders->links() }}
            <!--end::Table-->
        </div>
        <!--end::Body-->
    </div>

@endsection
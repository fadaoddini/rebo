@extends('front.index')
@section('content')
    @include('back.message')

    @if($totalprice>0)


    <div class="page-content-wrapper">
        <div class="container">
            <!-- Cart Wrapper-->
            <div class="cart-wrapper-area py-3">

                @auth

                    @if(($totalprice-$totaltakhfif)>20000)

                <div class="cart-table card mb-3">
                    <div class="table-responsive card-body">
                        <table class="table mb-0">
                            <tbody>

                            @foreach($basket as $row)
                            <tr>
                                <th scope="row"><a onclick="return confirm('آیا حذف شود؟');" class="remove-product" href="{{route('deletecart',$row->id)}}"><i class="lni lni-close"></i></a></th>
                                <td><img src="{{url('/images/product/thumb/'.$row->image)}}" alt=""></td>
                                <td><a href=""> {{$row->name}}    <span>{{(($row->price)-(($row->price)*(($row->takhfif)/100)))}} تومان ×  1 </span> </a><span style="font-size: 11px" class=" text-danger"><del>
                                    {{$row->price}}
                                </del></span> </td>
                                <td>
                                    <div class="quantity">
                                        <form action="{{route('addchange',$row->id)}}" method="post">
                                            @csrf
                                        <input onchange="this.form.submit();" name="addchange" class="qty-text" type="number" min="1" value="{{$row->tedad}}">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Coupon Area-->
                {{--<div class="card coupon-card mb-3">
                    <div class="card-body">
                        <div class="apply-coupon">
                            <h6 class="mb-0">تخفیف دارید؟</h6>
                            <p class="mb-2">کد تخفیف خود را اینجا وارد کنید و از تخفیف های عالی استفاده کنید!</p>
                            <div class="coupon-form">
                                <form action="#">
                                    <input class="form-control" type="text" placeholder="SUHA30">
                                    <button class="btn btn-primary" type="submit">درخواست دادن</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>--}}
                <!-- Cart Amount Area-->
                <div class="card cart-amount-area">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <h5 class="total-price mb-0"><span class="counter">{{$totalprice}}</span> تومان<span style="font-size: 11px" class=" text-danger"><del>
                                    {{$totalprice+$totaltakhfif}}
                                </del></span></h5><a class="btn btn-warning" href="{{Route('shiping',$totalprice)}}">تائید و ادامه </a>
                    </div>
                </div>
                    @else
                        <div class="row">
                            <div class="col-12">

                                <p class="alert alert-danger text-center">
                                    مبلغ کل کمتر از 20000 تومان می باشد
                                </p>
                                <p class="alert alert-warning text-center">
                                    با عرض پوزش برای سفارشات زیر 20 هزار تومان خدمتی ارائه نمی گردد
                                </p>
                            </div>
                        </div>
                    @endif

                @else
                    <div class="row">
                        <div class="col-12">

                            <a style="margin: 0 auto; display: block" class="btn btn-outline-success px-5 "
                               href="{{Route('login')}}">
                                جهت پرداخت لطفا ابتدا وارد حساب کاربری خود شوید
                            </a>
                        </div>
                    </div>
                @endauth




            </div>
        </div>
    </div>

    @else
        <div class="page-content-wrapper">
            <div class="container">
                <!-- Cart Wrapper-->
                <div class="cart-wrapper-area py-3">

                        <p class="alert alert-danger text-center">
                            سبد خرید خالی است
                        </p>



                </div>
            </div>
        </div>



    @endif


@endsection




@extends('front.index')
@section('content')
    @include('back.message')

    @if($totalprice>0)


        <div class="page-content-wrapper">
            <div class="container">
                <!-- Checkout Wrapper-->
                <div class="checkout-wrapper-area py-3">


                    <form action="{{route('adresschange',auth()->user()->id)}}" method="post">

                        @csrf


                    <!-- Billing Address-->
                    <div class="billing-information-card mb-3">
                        <div class="card billing-information-title-card bg-danger">
                            <div class="card-body">
                                <h6 class="text-center mb-0 text-white">آدرس دقیق خود را بنویسید</h6>
                            </div>
                        </div>
                        <div class="card user-data-card">
                            <div class="card-body">

                                <input name="adress" class="form-control" placeholder="بطور مثال : رفسنجان - خیابان امام خمینی و ..." required>
                                <span class="text-center" style="font-size: 12px;">
                                    لطفا با جزئیات کامل بنویسید تا مشکلی بابت پیدا کردن آدرس وجود نداشته باشد
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Shipping Method Choose-->
                    <div class="shipping-method-choose mb-3">
                        <div class="card shipping-method-choose-title-card bg-success">
                            <div class="card-body">
                                <h6 class="text-center mb-0 text-white">روش حمل و نقل را انتخاب کنید</h6>
                            </div>
                        </div>
                        <div class="card shipping-method-choose-card">
                            <div class="card-body">
                                <div class="shipping-method-choose">
                                    <ul class="pl-0">

                                        @foreach($shiping as $ship)
                                            <li>
                                                <input  id="fa{{$ship->id}}" type="radio" name="ship" value="{{$ship->id}}" checked="">
                                                <label for="fa{{$ship->id}}">

                                                    {{$ship->name}}
                                                    <br>
                                                    <span>زمان تقریبی ارسال :
                                                        <span style="color: #d31b2d;">
                                                               {{$ship->timing}}
                                                        </span>


                                                        دقیقه
<br>
                                                    </span><span>هزینه ارسال :
                                                            <span style="color: #d31b2d;">
                                                             {{$ship->price}}
                                                        </span>


                                                    </span></label>

                                                <div class="check"></div>
                                            </li>

                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                            <!-- Cart Amount Area-->
                            <div class="card cart-amount-area">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <h5 class="total-price mb-0"><span class="counter">{{$totalprice}}</span> تومان</h5>

                                    <button class="btn btn-warning"  type="submit">تأیید و پرداخت کنید</button>
                                </div>
                            </div>
                    </form>



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




@extends('front.index')
@section('content')
    @include('back.message')

    @if($totalprice>0)


        <div class="page-content-wrapper">
            <div class="container">
                <!-- Checkout Wrapper-->
                <div class="checkout-wrapper-area py-3">
                    <div class="credit-card-info-wrapper">

                        <img class="d-block mb-4" src="{{url('front/img/bg-img/credit-card.png')}}" alt="">


                        <div class="cod-info text-center mb-3">

                            <p class="alert alert-info">
آدرس درخواستی شما :
<span>
     {{$bazbini->adress}}
</span>

می باشد

                            </p>
                            <p class="alert alert-success">
                                مبلغ پرداختی شما  :




                                <span >
                                    @php
                                       $toti= $mahdode->price+$totalprice;
                                    @endphp
                                    {{number_format($toti)}}
                                      تومان
                                </span>
                                <br>
                                <span class="badge badge-success p-1 text-white">


                                <span style="font-size: 10px; ">
   {{number_format($totalprice)}} (جمع سبد)
                                +
                                </span>

                                <span style="font-size: 10px; ">


   {{number_format($mahdode->price)}}  (هزینه ارسال)

                                </span>
    </span>




                            </p>
                        </div><a class="btn btn-warning btn-lg w-100" href="{{Route('pardakht',$toti)}}">پرداخت</a>
                    </div>
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




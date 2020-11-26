@extends('front.index')
@section('content')
    @include('back.message')

    @if($totalprice>0)

        <div class="order-success-wrapper">
            <div class="content"><i class="lni lni-checkmark-circle"></i>
                <h5>پرداخت انجام شد</h5>
                <p>ما همه جزئیات را در پنل کاربری شما ذخیره کرده ایم. متشکرم!</p><a class="btn btn-warning mt-3" href="{{route('index')}}">دوباره بخرید</a>
            </div>
        </div>

    @else
        <div class="page-content-wrapper">
            <div class="container">
                <!-- Offline Area-->
                <div class="offline-area-wrapper py-3 d-flex align-items-center justify-content-center">
                    <div class="offline-text text-center"><img class="mb-4 px-5" src="{{url('img/bg-img/no-internet.png')}}" alt="">
                        <h5>پرداختی صورت نگرفت!</h5>
                        <p>به نظر می رسد که شما از خرید انصراف داده اید و یا اینترنت شما قطع شده است!</p><a class="btn btn-primary" href="{{route('index')}}">بازگشت به خانه</a>
                    </div>
                </div>
            </div>
        </div>



    @endif


@endsection




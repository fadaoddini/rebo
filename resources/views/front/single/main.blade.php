@extends('front.index')
@section('content')
    @include('back.message')
        <div class="product-slides owl-carousel">

            <div class="single-product-slide" style="background-image: url('images/product/thumb/{{$product_single->image}}')"></div>
          {{--  <div class="single-product-slide" style="background-image: url('images/product/thumb/{{$product_single->image}}')"></div>

            <div class="single-product-slide" style="background-image: url('images/product/thumb/{{$product_single->image}}')"></div>--}}
        </div>
        <div class="product-description pb-3">

            <div class="product-title-meta-data bg-white mb-3 py-3">
                <div class="container d-flex justify-content-between">
                    <div class="p-title-price">
                        <h6 class="mb-1">{{$product_single->name}}   </h6>
                        <p class="sale-price mb-0">
                            {{(($product_single->price)-((($product_single->price)*($product_single->takhfif))/100))}}
                            تومان
                            <span>{{$product_single->price}}
                                تومان
                            </span></p>
                    </div>
                    <div class="p-wishlist-share"><a href="wishlist-grid.html"><i class="lni lni-heart"></i></a></div>
                </div>
                @include('front.single.rating')
            </div>
           {{-- @include('front.single.flash')
            @include('front.single.color')--}}
            @include('front.single.addcart')
            @include('front.single.fani')
            @include('front.single.ratingcomment')
            @include('front.single.ratingsubmit')
        </div>
@endsection

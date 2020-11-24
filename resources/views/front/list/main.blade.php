@extends('front.index')
@section('content')
    @include('back.message')



    <div class="top-products-area py-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">

                <h6 class="ml-1">
                    <a href="{{route('index')}}">
                        صفحه نخست /
                    </a>
                    {{$cat->name}}</h6>
                <!-- Layout Options-->
                <div class="layout-options"><a class="active" href="{{route('grid',$cat->slug)}}"><i class="lni lni-grid-alt"></i></a><a href="{{route('list',$cat->slug)}}"><i class="lni lni-radio-button"></i></a></div>
            </div>
            <div class="row g-3">



                @foreach($products as $item)
                <div class="col-12 col-md-6">
                    <div class="card weekly-product-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="product-thumbnail-side">
                                <span class="badge badge-danger">-{{$item->takhfif}}٪</span>
                                <a class="wishlist-btn" href="{{route('single',$item->slug)}}">
                                    <i class="lni lni-heart"></i>
                                </a>
                                <a class="product-thumbnail d-block" href="{{route('single',$item->slug)}}">
                                    <img class="mb-2" src="{{url('images/product/thumb/'.$item->image)}}" alt="{{$item->slug}}">
                                </a>
                            </div>
                            <div class="product-description">
                                <a class="product-title d-block" href="{{route('single',$item->slug)}}">{{$item->name}}</a>
                                <p class="sale-price">
                                    <i class="lni lni-dollar"></i>
                                    {{(($item->price)-((($item->price)*($item->takhfif))/100))}}
                                    تومان
                                    <span>
                                        {{$item->price}}
                                        تومان

                                    </span>

                                </p>
                                <div class="product-rating">
                                    <i class="lni lni-star-filled"></i>
                                    {{$item->ratee}}
                                </div>
                                <a href="{{route('addtoo',$item->id)}}"  class="btn btn-success btn-sm add2cart-notify">
                                    <i class="mr-1 lni lni-cart"></i>

                                    خرید

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </div>





@endsection




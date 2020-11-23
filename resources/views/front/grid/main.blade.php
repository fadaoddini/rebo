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
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card top-product-card">
                        <div class="card-body"><span class="badge badge-danger">%{{$item->takhfif}}</span>
                            <a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a>
                            <a class="product-thumbnail d-block" href="{{route('single',$item->slug)}}">
                                <img class="mb-2" src="{{url('images/product/thumb/'.$item->image)}}" alt="{{$item->slug}}">

                            </a>
                            <a class="product-title d-block" href="{{route('single',$item->slug)}}">{{$item->name}}</a>
                            <p class="sale-price">

                                {{(($item->price)-((($item->price)*($item->takhfif))/100))}}
                                تومان




                                <span class="real-price"> {{$item->price}} تومان</span></p>
                            <div class="product-rating">

                                @for($i=0;$i<($item->ratee);$i++)
                                    <i class="lni lni-star-filled"></i>

                                @endfor

                            </div>
                            <a onclick="addtoo({{$item->id}})" class="btn btn-success btn-sm add2cart-notify" >
                                <i class="lni lni-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>

                    @endforeach
            </div>
        </div>
    </div>





@endsection

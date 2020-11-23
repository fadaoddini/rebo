
<div class="flash-sale-wrapper mt-4">
    <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between">
            <h6 class="ml-1">ویژه</h6><a class="btn btn-primary btn-sm" href="">مشاهده همه</a>
        </div>
        <!-- Flash Sale Slide-->

<div class="flash-sale-slide owl-carousel">



@foreach($products_vije as $vije)

    <div class="card flash-sale-card">
        <div class="card-body"><a href="{{route('single',$vije->slug)}}">

                <img src="{{url('images/product/thumb/'.$vije->image)}}" alt="{{$vije->slug}}" >



                <span class="product-title">{{$vije->name}}</span>
                <p class="sale-price">{{(($vije->price)-((($vije->price)*($vije->takhfif))/100))}} تومان <span class="real-price" style=" color: #d31b2d;"> {{$vije->price}}  تومان </span></p>{{--<span class="progress-title">33٪ فروخته شده</span>--}}
                <!-- Progress Bar-->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div></a></div>
    </div>


@endforeach


</div>
</div>
</div>

<br>

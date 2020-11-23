<div class="product-ratings">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="ratings">

            @for($i=0;$i<$averagecoment-1;$i++)
            <i class="lni lni-star-filled"></i>

            @endfor
            <span class="pl-1">

                {{$averagecoment}}

                ستاره</span></div>
        <div class="total-result-of-ratings"><span>{{$averagecoment}}</span><span>


            </span></div>
    </div>
</div>

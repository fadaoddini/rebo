<div class="product-catagories-wrapper py-3">
    <div class="container">
        <div class="section-heading">
            <h6 class="ml-1">دسته بندی محصولات</h6>
        </div>
        <div class="product-catagory-wrap">
            <div class="row g-3">


                @foreach($categories as $cat)

                <!-- Single Catagory Card-->
                <div class="col-4">
                    <div class="card catagory-card">
                        <div class="card-body"><a href="{{route('grid',$cat->slug)}}">

                                <img src="{{url('images/category/thumb/'.$cat->image)}}" alt="{{$cat->slug}}" >


                                <span>{{$cat->name}}</span></a></div>
                    </div>
                </div>

                @endforeach


            </div>
        </div>
    </div>
</div>

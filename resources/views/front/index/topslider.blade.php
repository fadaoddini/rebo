


<div class="hero-slides owl-carousel">


    @foreach($sliders as $slide)

    <div class="single-hero-slide" style="background-image: url('images/slider/thumb/{{$slide->image}}')">
        <div class="slide-content h-100 d-flex align-items-center">
            <div class="container">
                <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">{{$slide->name}}</h4>
                <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">{{$slide->lid}}</p><a class="btn btn-primary btn-sm" href="{{$slide->link}}" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">{{$slide->title_link}}</a>
            </div>
        </div>
    </div>


    @endforeach



</div>

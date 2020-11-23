<style>
    .cta-area .cta-text::after{
        background: linear-gradient(to right, {{$adver1->bgcolor}}, {{$adver1->bgcolor2}});
    }
</style>
<div class="cta-area   ">
    <div class="container">


<div class="cta-text p-4 p-lg-5" style="background-image: url('images/adver/thumb/{{$adver1->image}}')">
    <h4>{{$adver1->name}}</h4>
    <p>
        {{$adver1->lid}}
    </p>

    <a class="btn btn-danger" href="  {{$adver1->link}}">
        {{$adver1->title_link}}

    </a>
</div>

</div>
</div>

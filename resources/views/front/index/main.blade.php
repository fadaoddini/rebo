@extends('front.index')
@section('content')
    <!-- PWA Install Alert-->
    @include('back.message')
    @include('front.alertpwa')
    @include('front.index.topslider')
    @include('front.index.category')
    @include('front.index.ads1')
    @include('front.index.vije')



{{--

    @include('front.index.mostsale')--}}



{{--
    @include('front.index.thebest')
    @include('front.index.ads2')
    @include('front.index.barjeste')
    --}}
    @include('front.index.nightmode')
@endsection

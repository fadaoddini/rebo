@extends('front.index')
@section('content')
    <div class="container">
    <div class="profile-wrapper-area py-3">
        <!-- User Information-->
        <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="user-profile mr-3">

                    @if((auth()->user()->image) != "")

                        <img src="{{url('/images/profile/thumb/'.auth()->user()->image)}}" alt="{{auth()->user()->family}}">
                    @else

                        <img src="{{url('/images/profile/profile.png')}}" alt="{{auth()->user()->family}}">
                    @endif

                </div>
                <div class="user-info">
                    <p class="mb-0 text-white">{{auth()->user()->name}}</p>
                    <h5 class="mb-0">{{auth()->user()->family}}</h5>
                </div>
            </div>
        </div>
        <!-- User Meta Data-->
        <div class="card user-data-card">
            <div class="card-body">
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                    <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>نام</span></div>
                    <div class="data-content">{{auth()->user()->name}}</div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                    <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>نام خانوادگی</span></div>
                    <div class="data-content">{{auth()->user()->family}}</div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                    <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>تلفن</span></div>
                    <div class="data-content">{{auth()->user()->mobile}}</div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                    <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i><span>آدرس ایمیل</span></div>
                    <div class="data-content">{{auth()->user()->email}}                               </div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                    <div class="title d-flex align-items-center"><i class="lni lni-map-marker"></i><span>شهر:</span></div>
                    <div class="data-content">{{auth()->user()->city}}</div>
                </div>
                <div class="single-profile-data d-flex align-items-center justify-content-between">
                    <div class="title d-flex align-items-center"><i class="lni lni-star"></i><span>سفارش من</span></div>
                    <div class="data-content"><a class="btn btn-danger btn-sm" href="my-order.html">نمایش</a></div>
                </div>
            </div>
        </div>
        <!-- Edit Profile-->
        <div class="edit-profile-btn mt-3"><a class="btn btn-info w-100" href="{{route('editprofile',auth()->user()->id)}}"><i class="lni lni-pencil mr-2"></i>ویرایش نمایه</a></div>
    </div>
    </div>
@endsection




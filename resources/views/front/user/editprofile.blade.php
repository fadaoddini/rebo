@extends('front.index')
@section('content')



    <div class="container">

    @include('front.etc.message')
    <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
            <!-- User Information-->
            <div class="card user-info-card">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="user-profile mr-3">

                        @if(($user->image) != "")

                            <img src="{{url('/images/profile/thumb/'.$user->image)}}" alt="{{$user->family}}">
                        @else

                            <img src="{{url('/images/profile/profile.png')}}" alt="{{$user->family}}">
                        @endif


                        <div class="change-user-thumb">
                            <form  method="post" action="{{route('updatepicprofile',$user->id)}}" enctype="multipart/form-data">
                                @csrf
                                <input onchange="this.form.submit();" name="image" class="form-control-file" type="file">
                                <button ><i class="lni lni-pencil"></i></button>


                            </form>
                        </div>
                    </div>
                    <div class="user-info">
                        <p class="mb-0 text-white">{{$user->name}}</p>
                        <h5 class="mb-0">{{$user->family}}</h5>
                    </div>
                </div>
            </div>
            <!-- User Meta Data-->
            <div class="card user-data-card">
                <div class="card-body">
                    <form action="{{route('updateprofile',$user->id)}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-user"></i><span>نام </span></div>
                            <input name="name" class="form-control @error('name') is-invalid @enderror " type="text"
                                   value="{{$user->name}} ">

                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-user "></i><span>نام خانوادگی</span></div>
                            <input name="family" class="form-control @error('family') is-invalid @enderror" type="text"
                                   value="{{$user->family}}">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-phone "></i><span>موبایل</span></div>
                            <input name="mobile" class="form-control @error('mobile') is-invalid @enderror" type="text"
                                   value="{{$user->mobile}}">
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-flag "></i><span> شهر</span></div>
                            <input name="city" class="form-control @error('city') is-invalid @enderror" type="text"
                                   value="{{$user->city}}">
                        </div>


                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-lock "></i><span> رمزعبور</span></div>
                            <input name="password" class="form-control @error('password') is-invalid @enderror" type="password"
                                   value="">
                        </div>


                        <div class="mb-3 ">
                            <div class="title mb-2"><i class="lni lni-lock "></i><span> تکرار رمزعبور</span></div>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="text"
                                   value="">
                        </div>






                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-list "></i><span>توضیحات</span></div>


                            <textarea name="description"
                                      class="form-control @error('description') is-invalid @enderror">{{$user->description}}</textarea>

                        </div>
                        <button class="btn btn-success w-100" type="submit">ذخیره همه تغییرات</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

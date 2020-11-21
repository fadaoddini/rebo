@extends('auth.index')
@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="img/core-img/logo-white.png" alt="">
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group text-left mb-4"><span>نام</span>
                        <label for="username"><i class="lni lni-user"></i></label>
                        <input class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" type="text" name="name" placeholder="نام">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group text-left mb-4"><span>نام خانوادگی</span>
                        <label for="username"><i class="lni lni-user"></i></label>
                        <input class="form-control @error('family') is-invalid @enderror" id="family" value="{{old('family')}}" type="text" name="family" placeholder="نام خانوادگی">
                        @error('family')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group text-left mb-4"><span>موبایل</span>
                        <label for="username"><i class="lni lni-phone"></i></label>
                        <input class="form-control @error('mobile') is-invalid @enderror" id="mobile" value="{{old('mobile')}}" type="text" name="mobile" placeholder="09123456789">
                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group text-left mb-4"><span>پست الکترونیک</span>
                        <label for="email"><i class="lni lni-envelope"></i></label>


                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="help@example.com">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


                    </div>
                    <div class="form-group text-left mb-4"><span>کلمه عبور</span>
                        <label for="password"><i class="lni lni-lock"></i></label>
                        <input class="input-psswd form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" placeholder="********************">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror



                    </div>

                    <div class="form-group text-left mb-4"><span>تکرار کلمه عبور</span>
                        <label for="password_confirmation"><i class="lni lni-lock"></i></label>
                        <input class="input-psswd form-control @error('password_confirmation') is-invalid @enderror" type="password"  name="password_confirmation" required  placeholder="********************">

                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror



                    </div>
                    <button class="btn btn-success btn-lg w-100" type="submit">ثبت نام</button>
                </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data">
                <p class="mt-3 mb-0">قبلاً حساب دارید؟ <a class="ml-1" href="{{route('login')}}">ورود</a></p>
            </div>
        </div>
    </div>




@endsection






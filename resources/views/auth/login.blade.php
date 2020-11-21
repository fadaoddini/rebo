@extends('auth.index')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="front/img/core-img/logo-white.png" alt="">
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group text-left mb-4"><span>نام کاربری</span>
                        <label for="username"><i class="lni lni-user"></i></label>
                        <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="text" placeholder="info@example.com" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group text-left mb-4"><span>کلمه عبور</span>
                        <label for="password"><i class="lni lni-lock"></i></label>
                        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="********" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


                    </div>
                    <button class="btn btn-success btn-lg w-100" type="submit"> ورود</button>
                </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data"><a class="forgot-password d-block mt-3 mb-1" href="{{ route('password.request') }}">رمز عبور را فراموش کرده اید؟</a>
                <p class="mb-0">حساب کاربری ندارید؟ <a class="ml-1" href="{{ route('register') }}">اکنون ثبت نام کنید</a></p>
            </div>

        </div>
    </div>

    @endsection


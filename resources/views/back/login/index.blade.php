@extends('back.index')
@section('webtitleadmin')
ورود به پنل ادمین
@endsection
@section('content')
    <section>
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
                <div class="login-form text-center p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <img src="assets/media/logos/logo-letter-13.png" class="max-h-75px" alt=""/>
                        </a>
                    </div>
                    <!--end::Login Header-->

                    <!--begin::Login Sign in form-->
                    <div class="login-signin">
                        <div class="mb-20">
                            <h3>ورود به پنل مدیریت</h3>
                            <div class="text-muted font-weight-bold">نام کاربری و کلمه عبور خود را وارد کنید</div>
                        </div>
                        <form action="{{ route('login') }}" method="POST" class="form" id="kt_login_signin_form">
                            @csrf
                            <div class="form-group mb-5">
                                <input class="form-control @error('email') is-invalid @enderror  form-control h-auto form-control-solid py-4 px-8" name="email" value="{{ old('email') }}"   type="email" placeholder="پست الکترونیک" name="username" autocomplete="off" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>
                            <div class="form-group mb-5">
                                <input class="form-control @error('password') is-invalid @enderror form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="کلمه عبور" name="password" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                <div class="checkbox-inline">
                                    <label class="checkbox m-0 text-muted">
                                        <input type="checkbox" name="remember" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                        <span></span>
                                        مرا به خاطر بسپار
                                    </label>
                                </div>

                                @if (Route::has('password.request'))

                                    <a href="{{ route('password.request') }}" id="kt_login_forgot" class="text-muted text-hover-primary">کلمه عبور را فراموش کرده اید؟</a>
                                @endif

                            </div>
                            <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">ورود</button>
                        </form>

                    </div>
                    <!--end::Login Sign in form-->




                </div>
            </div>
        </div>
    </section>

@endsection

@extends('auth.index')
@section('content')
        <div class="row justify-content-center">
            <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                <div class="text-left px-4">
                    <h5 class="mb-1 text-white">فراموشی رمز عبور</h5>
                    <p class="mb-4 text-white">ما یک رمز جدید به ایمیل شما ارسال خواهیم کرد</p>
                </div>
                <!-- OTP Send Form-->
                <div class="otp-form mt-5 mx-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-4 d-flex">

                            <input class="form-control  @error('email') is-invalid @enderror"  placeholder="ایمیل خود را وارد کنید" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button class="btn btn-warning btn-lg w-100" type="submit"> ارسال </button>
                    </form>
                </div>

            </div>
        </div>
    @endsection

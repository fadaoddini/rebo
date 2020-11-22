<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Level;
use App\City;
use App\County;
use App\Province;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {



        $message = [
            'name.required' => 'نام را پر کنید',
            'name.max' => 'طول رشته نام زیاد شده است!',
            'family.required' => 'نام خانوادگی را پر کنید',
            'family.max' => 'طول رشته نام خانوادگی زیاد شده است!',
            'mobile.required' => 'موبایل را پر کنید',
            'mobile.max' => 'موبایل 11 عدد دارد گویا بیشتر وارد کردید',
            'mobile.min' => 'موبایل 11 عدد دارد گویا کمتر وارد کردید',
            'mobile.unique' => 'موبایل تکراری است',
            'email.required' => 'ایمیل را پر کنید',
            'email.unique' => 'ایمیل تکراری است',
            'password.required' => 'رمز عبور را پر کنید',
            'password.min' => 'تعداد کاراکتر رمز عبور حداقل 5 رقم می باشد',
            'password.confirmed' => 'مطابقت رمز عبور با مشکل مواجه شده است لطفا مجددا سعی نمائید',


        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:11', 'min:11', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],


        ],$message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {



        return User::create([
            'name' => $data['name'],
            'family' => $data['family'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function showRegistrationForm()
    {

        $webtitle='ثبت نام';
        $city = Province::all()->pluck('id','name'); // returns collection of cities

        return view('auth/register',compact('webtitle','city'));
    }
}

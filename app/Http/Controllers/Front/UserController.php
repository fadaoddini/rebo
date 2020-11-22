<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use http\Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webtitle = "پروفایل";



        return view('front.user.main', compact('webtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user_id=$user->id;
        $webtitle = "ویرایش پروفایل";


        return view('front/user/editprofile', compact('webtitle', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if (!empty($request->password)) {
            $message = [
                'name.required' => 'نام را پر کنید',
                'family.required' => 'نام خاننوادگی را پر کنید',
                'mobile.required' => 'موبایل را پر کنید',
                'city.required' => 'شهر را پر کنید',
                'password.min' => 'تعداد کاراکتر رمز عبور حداقل 5 رقم می باشد',
                'password.confirmed' => 'مطابقت رمز عبور با مشکل مواجه شده است لطفا مجددا سعی نمائید',

            ];
            $validatedData = $request->validate([
                'name' => ' required ',
                'family' => ' required ',
                'mobile' => ' required ',
                'city' => ' required ',
                'password'=> [ 'min:5', 'confirmed'],


            ], $message);




                $password = Hash::make($request->password);
                $user->password = $password;






        } else {
            $message = [
                'name.required' => 'نام را پر کنید',
                'family.required' => 'نام خانوادگی را پر کنید',
                'mobile.required' => 'موبایل را پر کنید',
                'city.required' => 'شهر را پر کنید',


            ];
            $validatedData = $request->validate([
                'name' => ' required ',
                'family' => ' required ',
                'mobile' => ' required ',
                'city' => ' required ',


            ], $message);

        }


        $user->name = $request->name;
        $user->description = $request->description;
        $user->family = $request->family;
        $user->mobile = $request->mobile;
        $user->city = $request->city;

        Try {

            $user->save();

        } catch (Exception $exception) {


            $msg = $exception->getCode();
            return redirect()->back()->with('warning', $msg);
        }

        $msg = "ویرایش با موفقیت انجام شد";

        return redirect()->back()->with('success', $msg);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function updatepicprofile(Request $request, User $user){


        $file = $request->file('image');


        $ext=$file->getClientOriginalExtension();

        $ext=strtolower($ext);
        $exitpic='profile'.$user->id;


        Try {
            if (($ext=="jpg") or ($ext=="jpeg") or ($ext=="png") ){
                Image::make($file)->resize(300, 300)->save('images/profile/thumb/'.$exitpic.'.'.$ext);
                $file->move(public_path('images/profile'),$exitpic.'.'.$ext);

                $user->image = $exitpic.'.'.$ext;

                $ok=1;
                $msg = "فرمت ".$ext." فایل با موفقیت ارسال شد";
            }else{
                $msg = "فرمت تصویر باید یکی از موارد jpg-jpeg-png  باشد!";
                return redirect()->back()->with('warning', $msg);
            }

            $user->save();


        } catch (Exception $exception) {

            $msg = "بروزرسانی با خطا مواجه شد!";
            return redirect(route('admin.level.edit'))->with('warning', $msg);


        }



     //   $msg = "ویرایش با موفقیت انجام شد";

        return redirect()->back()->with('success', $msg);
    }



    public function destroy($id)
    {
        //
    }
}

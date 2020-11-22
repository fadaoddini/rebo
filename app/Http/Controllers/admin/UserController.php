<?php

namespace App\Http\Controllers\admin;

use http\Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
class UserController extends Controller
{
    public $websitename="rebo";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webtitle="مدیریت";
        $websitename=$this->websitename;
/*        $countuser= User::orderBy('id','DESC')->count();*/
        $users=User::orderBy('id','DESC')->paginate(10);

        return view('back.user.index',compact('webtitle','websitename','users'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $websitename=$this->websitename;
        $countuser= User::orderBy('id','DESC')->count();

        return view('back/user/edit-profile', compact('websitename', 'user','countuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {



        if (!empty($request->password)) {
            $message = [
                'name.required' => 'نام را پر کنید',
                'family.required' => 'نام خاننوادگی را پر کنید',
                'mobile.required' => 'موبایل را پر کنید',
                'city.required' => 'شهر را پر کنید',
                'password.min' => 'تعداد کاراکتر رمز عبور حداقل 5 رقم می باشد',
                'password_confirmation.min' => 'تعداد کاراکتر تکرار رمز عبور حداقل 5 رقم می باشد',

            ];
            $validatedData = $request->validate([
                'name' => ' required ',
                'family' => ' required ',
                'mobile' => ' required ',
                'city' => ' required ',
                'password'=> 'min:5',
                'password_confirmation'=> 'min:5',


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

        $user->description = $request->description;



        $user->name = $request->name;
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

        return redirect(route('useradmin'))->with('warning', $msg);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {


        $user->delete();
        $msg = "حذف با موفقیت انجام شد";
        return redirect(route('useradmin'))->with('warning', $msg);

    }



    public function updatestatuse(User $user)
    {

        if ($user->status==1){
            $user->status=0;
        }else{
            $user->status=1;
        }
        $user->save();
        $msg = "تغییرات با موفقیت انجام شد";
        return redirect(route('useradmin'))->with('warning', $msg);

    }




}

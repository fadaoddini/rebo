<?php

namespace App\Http\Controllers\admin;
use App\Models\mahdode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahdodeController extends Controller
{
    public $websitename = "ربو";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webtitle = "مدیریت مناطق";
        $websitename = $this->websitename;

        $mahdodes = mahdode::orderBy('id', 'DESC')->paginate(10);


        return view('back.mahdode.index', compact('webtitle', 'websitename', 'mahdodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $webtitle = "مدیریت";
        $websitename = $this->websitename;




        return view('back.mahdode.create-mahdode', compact('webtitle', 'websitename'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {






        $mahdodes=new mahdode([
            'name'=> $request->get('name'),
            'status'=> $request->get('status'),
            'price'=> $request->get('price'),
            'timing'=> $request->get('timing'),




        ]);

        $message = [
            'name.required' => 'عنوان منطقه را وارد نمائید',
            'price.required' => 'قیمت منطقه را وارد کنید',
            'timing.required' => 'زمان تقریبی ارسال را وارد نمائید',



        ];
        $validatedData = $request->validate([
            'name' => ' required ',
            'price' => ' required ',
            'timing' => ' required ',




        ], $message);



        $mahdodes->name = $request->name;
        $mahdodes->price = $request->price;
        $mahdodes->timing = $request->timing;
        $mahdodes->status = $request->status;





        Try {



                $mahdodes->save();









        } catch (Exception $exception) {

            $msg = "عملیات با خطا مواجه شد!";
            return redirect(route('admin.mahdode.store'))->with('warning', $msg);


        }

        $msg = "منطقه جدید ایجاد شد !";
        return redirect(route('admin.mahdode'))->with('success', $msg);









    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\mahdode  $mahdode
     * @return \Illuminate\Http\Response
     */
    public function show(mahdode $mahdode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\mahdode  $mahdode
     * @return \Illuminate\Http\Response
     */
    public function edit(mahdode $mahdode)
    {
        $websitename = $this->websitename;






        return view('back/mahdode/edit-mahdode', compact('websitename', 'mahdode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\mahdode  $mahdode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mahdode $mahdode)
    {




        $message = [
            'name.required' => 'عنوان منطقه را وارد نمائید',
            'price.required' => 'قیمت منطقه را وارد کنید',
            'timing.required' => 'زمان تقریبی ارسال را وارد نمائید',



        ];
        $validatedData = $request->validate([
            'name' => ' required ',
            'price' => ' required ',
            'timing' => ' required ',




        ], $message);










        $mahdode->name = $request->name;
        $mahdode->price = $request->price;
        $mahdode->timing = $request->timing;
        $mahdode->status = $request->status;






        Try {


                $mahdode->save();









        } catch (Exception $exception) {

            $msg = "عملیات با خطا مواجه شد!";
            return redirect(route('admin.mahdode.store'))->with('warning', $msg);


        }

        $msg = "منطقه با موفقیت ویرایش شد !";
        return redirect(route('admin.mahdode'))->with('success', $msg);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\mahdode  $mahdode
     * @return \Illuminate\Http\Response
     */
    public function destroy(mahdode $mahdode)
    {
        try {
            $mahdode->delete();
            $msg = "حذف با موفقیت انجام شد!";
        } catch (Exception $exception) {
            $msg = "مشکلی در حذف کردن اتفاق افتاده است دوباره تلاش کنید";
            return redirect(route('admin.mahdode.edit'))->with('warning', $msg);
        }
        return redirect(route('admin.mahdode'))->with('success', $msg);
    }


    public function updatechangemahdode(mahdode $mahdode)
    {

        if ($mahdode->status==1){
            $mahdode->status=0;
        }else{
            $mahdode->status=1;
        }
        $mahdode->save();
        $msg = "تغییرات با موفقیت انجام شد";
        return redirect(route('admin.mahdode'))->with('warning', $msg);

    }






}

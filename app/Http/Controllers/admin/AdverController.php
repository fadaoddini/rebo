<?php

namespace App\Http\Controllers\admin;
use App\Models\admin\Adver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdverController extends Controller
{
    public $websitename = "ربو";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webtitle = "مدیریت تبلیغات";
        $websitename = $this->websitename;

        $advers = Adver::orderBy('id', 'DESC')->paginate(10);

        return view('back.adver.index', compact('webtitle', 'websitename', 'advers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $webtitle = "مدیریت تبلیغات";
        $websitename = $this->websitename;


        return view('back.adver.create-adver', compact('webtitle', 'websitename'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $ok=0;


        $advers=new adver([
            'name'=> $request->get('name'),
            'lid'=> $request->get('lid'),
            'title_link'=> $request->get('title_link'),
            'link'=> $request->get('link'),
            'bgcolor'=> $request->get('bgcolor'),
            'bgcolor2'=> $request->get('bgcolor2'),

        ]);



        $message = [
            'name.required' => 'عنوان تبلیغ را پر کنید',
            'lid.required' => 'لید را پر کنید',
            'title_link.required' => 'عنوان دکمه را پر کنید',
            'link.required' => 'لینکی برای تبلیغ قرار دهید',
            'bgcolor.required' => 'رنگ پس زمینه برای تبلیغ قرار دهید',
            'bgcolor2.required' => 'رنگ پس زمینه2 برای تبلیغ قرار دهید',


        ];
        $validatedData = $request->validate([
            'name' => ' required ',
            'lid' => ' required ',
            'title_link' => ' required ',
            'link' => ' required ',
            'bgcolor' => ' required ',
            'bgcolor2' => ' required ',

        ], $message);




        $file = $request->file('image');


        $ext=$file->getClientOriginalExtension();
        $ext=strtolower($ext);
        $exitpic='adver'.time();
        if (($ext=="jpg") or ($ext=="jpeg")or ($ext=="png")){
            Image::make($file)->resize(600, 600)->save('images/adver/thumb/'.$exitpic.'.'.$ext);
            $file->move(public_path('images'),$exitpic.'.'.$ext);



            $ok=1;
            $msg = "فرمت ".$ext." فایل با موفقیت ارسال شد";
        }else{
            $msg = "فرمت تصویر باید یکی از موارد jpg-jpeg-png  باشد!";
        }





        $advers->name = $request->name;
        $advers->lid = $request->lid;
        $advers->title_link = $request->title_link;
        $advers->link = $request->link;
        $advers->bgcolor = $request->bgcolor;
        $advers->bgcolor2 = $request->bgcolor2;



        $advers->image = $exitpic.'.'.$ext;



        Try {

            if ($ok==1){


                $advers->save();





            }else{

                return redirect(route('admin.adver'))->with('warning', $msg);
            }


        } catch (Exception $exception) {

            $msg = "عملیات با خطا مواجه شد!";
            return redirect(route('admin.adver.store'))->with('warning', $msg);


        }

        $msg = "تبلیغ جدید ایجاد شد !";
        return redirect(route('admin.adver'))->with('success', $msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Adver  $adver
     * @return \Illuminate\Http\Response
     */
    public function show(Adver $adver)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Adver  $adver
     * @return \Illuminate\Http\Response
     */
    public function edit(Adver $adver)
    {
        $websitename = $this->websitename;



        return view('back/adver/edit-adver', compact('websitename', 'adver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Adver  $adver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adver $adver)
    {


        $file = $request->file('image');

        if ($file){

            $ext=$file->getClientOriginalExtension();

        }else{
            $ext=1;
        }

        $ext=strtolower($ext);

        $ok=0;




        $message = [
            'name.required' => 'عنوان تبلیغ را پر کنید',
            'lid.required' => 'لید را پر کنید',
            'title_link.required' => 'عنوان دکمه را پر کنید',
            'link.required' => 'لینکی برای تبلیغ قرار دهید',
            'bgcolor.required' => 'رنگ پس زمینه برای تبلیغ قرار دهید',
            'bgcolor2.required' => 'رنگ پس زمینه2 برای تبلیغ قرار دهید',


        ];
        $validatedData = $request->validate([
            'name' => ' required ',
            'lid' => ' required ',
            'title_link' => ' required ',
            'link' => ' required ',
            'bgcolor' => ' required ',
            'bgcolor2' => ' required ',

        ], $message);



        $exitpic='slider'.time();



        if (($ext=="jpg") or ($ext=="jpeg")or ($ext=="png")){
            Image::make($file)->resize(600, 600)->save('images/adver/thumb/'.$exitpic.'.'.$ext);
            $file->move(public_path('images'),$exitpic.'.'.$ext);
            $ok=1;
            $msg = "فرمت ".$ext." فایل با موفقیت ارسال شد";
            $adver->image = $exitpic.'.'.$ext;
        }else{
            $msg = "فرمت تصویر باید یکی از موارد jpg-jpeg-png  باشد!";
        }

        $adver->name = $request->name;
        $adver->lid = $request->lid;
        $adver->title_link = $request->title_link;
        $adver->link = $request->link;
        $adver->bgcolor = $request->bgcolor;
        $adver->bgcolor2 = $request->bgcolor2;




        Try {

            $adver->save();


        } catch (Exception $exception) {

            $msg = "بروزرسانی با خطا مواجه شد!";
            return redirect(route('admin.adver.edit'))->with('warning', $msg);


        }

        $msg = "بروزرسانی انجام شد!";
        return redirect(route('admin.adver'))->with('success', $msg);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Adver  $adver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adver $adver)
    {
        try {
            $adver->delete();
            $msg = "حذف با موفقیت انجام شد!";
        } catch (Exception $exception) {
            $msg = "مشکلی در حذف کردن اتفاق افتاده است دوباره تلاش کنید";
            return redirect(route('admin.adver.edit'))->with('warning', $msg);
        }
        return redirect(route('admin.adver'))->with('success', $msg);
    }

    public function updatechangeadver(Adver $adver)
    {

        if ($adver->status==1){
            $adver->status=0;
        }else{
            $adver->status=1;
        }
        $adver->save();
        $msg = "تغییرات با موفقیت انجام شد";
        return redirect(route('admin.adver'))->with('warning', $msg);

    }
}

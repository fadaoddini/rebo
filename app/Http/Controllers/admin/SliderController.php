<?php


namespace App\Http\Controllers\admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public $websitename = "ربو";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webtitle = "مدیریت اسلایدر";
        $websitename = $this->websitename;

        $sliders = slider::orderBy('id', 'DESC')->paginate(10);

        return view('back.slider.index', compact('webtitle', 'websitename', 'sliders'));
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


        return view('back.slider.create-slider', compact('webtitle', 'websitename'));
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


        $sliders=new slider([
            'name'=> $request->get('name'),
            'lid'=> $request->get('lid'),
            'title_link'=> $request->get('title_link'),
            'link'=> $request->get('link'),

        ]);



        $message = [
            'name.required' => 'عنوان اسلایدر را پر کنید',
            'lid.required' => 'لید را پر کنید',
            'title_link.required' => 'عنوان دکمه را پر کنید',
            'link.required' => 'لینکی برای اسلایدر قرار دهید',


        ];
        $validatedData = $request->validate([
            'name' => ' required ',
            'lid' => ' required ',
            'title_link' => ' required ',
            'link' => ' required ',

        ], $message);




        $file = $request->file('image');


        $ext=$file->getClientOriginalExtension();
        $ext=strtolower($ext);
        $exitpic='slider'.time();
        if (($ext=="jpg") or ($ext=="jpeg")){
            Image::make($file)->resize(1920, 600)->save('images/slider/thumb/'.$exitpic.'.'.$ext);
            $file->move(public_path('images'),$exitpic.'.'.$ext);



            $ok=1;
            $msg = "فرمت ".$ext." فایل با موفقیت ارسال شد";
        }else{
            $msg = "فرمت تصویر باید یکی از موارد jpg-jpeg  باشد!";
        }





        $sliders->name = $request->name;
        $sliders->lid = $request->lid;
        $sliders->title_link = $request->title_link;
        $sliders->link = $request->link;



        $sliders->image = $exitpic.'.'.$ext;



        Try {

            if ($ok==1){


                $sliders->save();





            }else{

                return redirect(route('admin.slider'))->with('warning', $msg);
            }


        } catch (Exception $exception) {

            $msg = "عملیات با خطا مواجه شد!";
            return redirect(route('admin.slider.store'))->with('warning', $msg);


        }

        $msg = "اسلایدر جدید ایجاد شد !";
        return redirect(route('admin.slider'))->with('success', $msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(slider $slider)
    {
        $websitename = $this->websitename;



        return view('back/slider/edit-slider', compact('websitename', 'slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, slider $slider)
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
            'name.required' => 'عنوان اسلایدر را پر کنید',
            'lid.required' => 'لید را پر کنید',
            'title_link.required' => 'عنوان دکمه را پر کنید',
            'link.required' => 'لینکی برای اسلایدر قرار دهید',


        ];
        $validatedData = $request->validate([
            'name' => ' required ',
            'lid' => ' required ',
            'title_link' => ' required ',
            'link' => ' required ',

        ], $message);


        $exitpic='slider'.time();



        if (($ext=="jpg") or ($ext=="jpeg") ){
            Image::make($file)->resize(1920, 600)->save('images/slider/thumb/'.$exitpic.'.'.$ext);
            $file->move(public_path('images'),$exitpic.'.'.$ext);
            $ok=1;
            $msg = "فرمت ".$ext." فایل با موفقیت ارسال شد";
            $slider->image = $exitpic.'.'.$ext;
        }else{
            $msg = "فرمت تصویر باید یکی از موارد jpg-jpeg  باشد!";
        }

        $slider->name = $request->name;
        $slider->lid = $request->lid;
        $slider->title_link = $request->title_link;
        $slider->link = $request->link;




        Try {

            $slider->save();


        } catch (Exception $exception) {

            $msg = "بروزرسانی با خطا مواجه شد!";
            return redirect(route('admin.slider.edit'))->with('warning', $msg);


        }

        $msg = "بروزرسانی انجام شد!";
        return redirect(route('admin.slider'))->with('success', $msg);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(slider $slider)
    {
        try {
            $slider->delete();
            $msg = "حذف با موفقیت انجام شد!";
        } catch (Exception $exception) {
            $msg = "مشکلی در حذف کردن اتفاق افتاده است دوباره تلاش کنید";
            return redirect(route('admin.slider.edit'))->with('warning', $msg);
        }
        return redirect(route('admin.slider'))->with('success', $msg);
    }
}

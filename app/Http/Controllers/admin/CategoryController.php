<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public $websitename = "ربو";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webtitle = "مدیریت دسته بندی";
        $websitename = $this->websitename;

        $categories = Category::orderBy('id', 'DESC')->paginate(10);

        return view('back.category.index', compact('webtitle', 'websitename', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $webtitle = "مدیریت دسته بندی";
        $websitename = $this->websitename;


        return view('back.category.create-category', compact('webtitle', 'websitename'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ok=0;

        $categories=new Category([
            'name'=> $request->get('name'),
            'place'=> $request->get('place'),
            'en_name'=> $request->get('en_name'),
            'metatag'=> $request->get('metatag'),

        ]);
        $message = [
            'name.required' => 'عنوان دسته بندی را پر کنید',




        ];
        $validatedData = $request->validate([
            'name' => ' required ',


        ], $message);



        $file = $request->file('image');


        $ext=$file->getClientOriginalExtension();
        $ext=strtolower($ext);
        $exitpic='category'.time();
        if (($ext=="jpg") or ($ext=="jpeg")or ($ext=="png")){
            Image::make($file)->resize(36, 36)->save('images/category/thumb/'.$exitpic.'.'.$ext);
            $file->move(public_path('images/category'),$exitpic.'.'.$ext);



            $ok=1;
            $msg = "فرمت ".$ext." فایل با موفقیت ارسال شد";
        }else{
            $msg = "فرمت تصویر باید یکی از موارد jpg-jpeg  باشد!";
        }




        $categories->name = $request->name;
        $categories->place = $request->place;
        $categories->en_name = $request->en_name;
        $categories->metatag = $request->metatag;
        $categories->image = $exitpic.'.'.$ext;
        $categories->slug = $this->makeSeo($categories->name);




        Try {

            if ($ok==1){


                $categories->save();





            }else{

                return redirect(route('admin.cat'))->with('warning', $msg);
            }





        } catch (Exception $exception) {

            $msg = "عملیات با خطا مواجه شد!";
            return redirect(route('admin.cat.store'))->with('warning', $msg);


        }

        $msg = "دسته بندی جدید ایجاد شد !";
        return redirect(route('admin.cat'))->with('success', $msg);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $websitename = $this->websitename;



        return view('back/category/edit-category', compact('websitename', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
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
            'name.required' => 'عنوان دسته بندی را پر کنید',

        ];
        $validatedData = $request->validate([
            'name' => ' required ',

        ], $message);


        $exitpic='cat'.time();



        if (($ext=="jpg") or ($ext=="jpeg")or ($ext=="png") ){
            Image::make($file)->resize(36, 36)->save('images/category/thumb/'.$exitpic.'.'.$ext);
            $file->move(public_path('images/category'),$exitpic.'.'.$ext);
            $ok=1;
            $msg = "فرمت ".$ext." فایل با موفقیت ارسال شد";
            $category->image = $exitpic.'.'.$ext;
        }else{
            $msg = "فرمت تصویر باید یکی از موارد jpg-jpeg  باشد!";
        }


        $category->name = $request->name;
        $category->place = $request->place;
        $category->en_name = $request->en_name;
        $category->metatag = $request->metatag;

        $category->slug = $this->makeSeo($category->name);


        Try {

            $category->save();


        } catch (Exception $exception) {

            $msg = "بروزرسانی با خطا مواجه شد!";
            return redirect(route('admin.cat.edit'))->with('warning', $msg);


        }

        $msg = "بروزرسانی انجام شد!";
        return redirect(route('admin.cat'))->with('success', $msg);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            $msg = "حذف با موفقیت انجام شد!";
        } catch (Exception $exception) {
            $msg = "مشکلی در حذف کردن اتفاق افتاده است دوباره تلاش کنید";
            return redirect(route('admin.cat.edit'))->with('warning', $msg);
        }
        return redirect(route('admin.cat'))->with('success', $msg);
    }

    function makeSeo($text, $limit=75)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);


        // trim
        $text = trim($text, '-');


        if (empty($text))
        {
            //return 'n-a';
            return time();
        }

        return $text;
    }
}

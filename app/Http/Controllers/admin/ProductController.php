<?php


namespace App\Http\Controllers\admin;

use App\Models\admin\Product;
use App\Models\admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public $websitename = "ربو";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webtitle = "مدیریت محصولات";
        $websitename = $this->websitename;

        $products = Product::orderBy('id', 'DESC')->paginate(10);


        return view('back.product.index', compact('webtitle', 'websitename', 'products'));
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

        $categories = Category::all()->pluck('id','name');  //میگیم فقط id  رو نیاز داریم و نام دسته بندی رو


        return view('back.product.create-product', compact('webtitle', 'websitename','categories'));
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

        $products=new Product([
            'name'=> $request->get('name'),
            'lid'=> $request->get('lid'),
            'description'=> $request->get('description'),
            'status'=> $request->get('status'),
            'vije'=> $request->get('vije'),
            'user_id'=> $request->get('user_id'),
            'price'=> $request->get('price'),
            'takhfif'=> $request->get('takhfif'),




        ]);

        $message = [
            'name.required' => 'عنوان محصول را وارد نمائید',
            'price.required' => 'قیمت محصول را وارد کنید',
            'vije.required' => 'مشخص نیست که محصول ویژه هست یا خیر',
            'lid.required' => 'لید را وارد نمائید',
            'description.required' => 'توضیح محصول را وارد نمائید',
            'categories.required' => 'دسته بندی محصول را انتخاب نمائید',
            'image.required' => 'فایلی را انتخاب نمائید',

        ];
        $validatedData = $request->validate([
            'name' => ' required ',
            'price' => ' required ',
            'vije' => ' required ',
            'lid' => ' required ',
            'description' => ' required ',
            'categories' => ' required ',
            'image' => ' required ',

        ], $message);



        $file = $request->file('image');

        $timingfile=$file->getATime();


        $ext=$file->getClientOriginalExtension();
        $ext=strtolower($ext);

        $exitpic='product'.time();



        if (($ext=="jpg") or ($ext=="jpeg") or ($ext=="png") ){
            Image::make($file)->resize(500, 375)->save('images/product/thumb/'.$exitpic.'.'.$ext);
            $file->move(public_path('../public_html/images/product'),$exitpic.'.'.$ext);



            $ok=1;
            $msg = "فرمت ".$ext." فایل با موفقیت ارسال شد";
        }else{
            $msg = "فرمت تصویر باید یکی از موارد jpg-jpeg-png  باشد!";
        }





        $products->name = $request->name;
        $products->price = $request->price;
        $products->takhfif = $request->takhfif;
        if ( $products->takhfif==""){
            $products->takhfif=0;
        }



        $products->vije = $request->vije;



        $products->slug = $this->makeSeo($products->name);


        $products->lid = $request->lid;
        $products->description = $request->description;
        $products->user_id = $request->user_id;
        $products->status = $request->status;
        $products->image = $exitpic.'.'.$ext;




        Try {
            if ($ok==1){


                $products->save();
                $products->categories()->attach($request->categories);




            }else{

                return redirect(route('admin.product'))->with('warning', $msg);
            }




        } catch (Exception $exception) {

            $msg = "عملیات با خطا مواجه شد!";
            return redirect(route('admin.product.store'))->with('warning', $msg);


        }

        $msg = "محصول جدید ایجاد شد !";
        return redirect(route('admin.product'))->with('success', $msg);









    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $websitename = $this->websitename;
        $categories = Category::all()->pluck('id','name');  //میگیم فقط id  رو نیاز داریم و نام دسته بندی رو





        return view('back/product/edit-product', compact('websitename', 'product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {




        $ok=0;

        $file = $request->file('image');

        if ($file){

            $ext=$file->getClientOriginalExtension();

        }else{
            $ext=1;
            $ok=1;
        }


        $ext=strtolower($ext);



        $message = [
            'name.required' => 'عنوان محصول را وارد نمائید',
            'price.required' => 'قیمت محصول را وارد کنید',
            'vije.required' => 'مشخص نیست که محصول ویژه هست یا خیر',
            'lid.required' => 'لید را وارد نمائید',
            'description.required' => 'توضیح محصول را وارد نمائید',
            'categories.required' => 'دسته بندی محصول را انتخاب نمائید',


        ];
        $validatedData = $request->validate([
            'name' => ' required ',
            'price' => ' required ',
            'vije' => ' required ',
            'lid' => ' required ',
            'description' => ' required ',
            'categories' => ' required ',


        ], $message);




        $exitpic='product'.time();



        if (($ext=="jpg") or ($ext=="jpeg") or ($ext=="png") ){
            Image::make($file)->resize(500, 375)->save('images/product/thumb/'.$exitpic.'.'.$ext);
            $file->move(public_path('../public_html/images/product'),$exitpic.'.'.$ext);
            $ok=1;
            $msg = "فرمت ".$ext." فایل با موفقیت ارسال شد";
            $product->image = $exitpic.'.'.$ext;

        }else{
            $msg = "فرمت تصویر باید یکی از موارد jpg-jpeg-png-gif  باشد!";
        }











        $product->name = $request->name;
        $product->price = $request->price;
        $product->takhfif = $request->takhfif;
        $product->vije = $request->vije;

        $product->slug = $this->makeSeo($product->name);
        $product->lid = $request->lid;
        $product->description = $request->description;
        $product->user_id = $request->user_id;
        $product->status = $request->status;






        Try {
            if ($ok==1){

                $product->save();

                $product->categories()->sync($request->categories);  // sync جدید ها اضافه میشه و قبلی ها حذف میشه







            }else{

                return redirect(route('admin.product'))->with('warning', $msg);
            }




        } catch (Exception $exception) {

            $msg = "عملیات با خطا مواجه شد!";
            return redirect(route('admin.product.store'))->with('warning', $msg);


        }

        $msg = "محصول با موفقیت ویرایش شد !";
        return redirect(route('admin.product'))->with('success', $msg);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            $msg = "حذف با موفقیت انجام شد!";
        } catch (Exception $exception) {
            $msg = "مشکلی در حذف کردن اتفاق افتاده است دوباره تلاش کنید";
            return redirect(route('admin.product.edit'))->with('warning', $msg);
        }
        return redirect(route('admin.product'))->with('success', $msg);
    }


    public function updatechangeproduct(Product $product)
    {

        if ($product->status==1){
            $product->status=0;
        }else{
            $product->status=1;
        }
        $product->save();
        $msg = "تغییرات با موفقیت انجام شد";
        return redirect(route('admin.product'))->with('warning', $msg);

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

<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;


use App\Models\admin\Adver;
use App\Models\admin\Product;
use App\Models\Comment;
use App\Models\Slider;
use App\Models\admin\Category;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use PhpParser\Node\Stmt\DeclareDeclare;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Payment;
use SoapClient;

class IndexController extends Controller
{
    public function index(Request $request)
    {


        $webtitle = "صفحه اصلی";

        $sliders = slider::orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('id', 'ASC')->get();
        $products_vije = Product::orderBy('id', 'DESC')->where("vije", 1)->where("status", 1)->get();
        $adver1 = Adver::orderBy('id', 'DESC')->where("place", 1)->first();
        $adver2 = Adver::orderBy('id', 'DESC')->where("place", 2)->first();


        return view('front.index.main', compact('webtitle', 'sliders', 'categories', 'products_vije', 'adver1', 'adver2'));
    }

    public function listproduct($slug)
    {
        $webtitle = "صفحه اصلی";


        $cat = Category::where('slug',$slug)->first();
        $category_id=$cat->id;


        $products = DB::table('categories')
            ->leftJoin('category_product', 'categories.id', '=', 'category_product.category_id')
            ->leftJoin('products', 'category_product.product_id', '=', 'products.id')
            ->where('categories.id','=',$category_id)
            ->get();




        if ($products->count()>1){
            return view('front.list.main', compact('webtitle',  'products','cat'));
        }else{

            $msg = "در این دسته محصولی قرار نگرفته است!";
            return redirect(route('index'))->with('warning', $msg);
        }



    }

    public function gridproduct($slug)
    {
        $webtitle = "صفحه اصلی";

        $cat = Category::where('slug',$slug)->first();
        $category_id=$cat->id;



        $products = DB::table('categories')
            ->leftJoin('category_product', 'categories.id', '=', 'category_product.category_id')
            ->leftJoin('products', 'category_product.product_id', '=', 'products.id')
            ->where('categories.id','=',$category_id)
            ->get();



        if ($products->count()>1){
            return view('front.grid.main', compact('webtitle',  'products','cat'));
        }else{

            $msg = "در این دسته محصولی قرار نگرفته است!";
            return redirect(route('index'))->with('warning', $msg);
        }


    }

    public function getCookie2(Request $request) {
        $value = $request->cookie('basket');
        return $value;
    }



    public function addchange(Product $product,Request $request){

        $product_id=$product->id;
        $newtedad= $request->addchange;
        $cookie= $this->getCookie2($request);


        if ($newtedad<1){

            $msg = "نمی توانید سفارش خود را کمتر از یک در نظر بگیرید!";
            return redirect(route('cart'))->with('warning', $msg);
        }else{


        DB::update('update basket set tedad=? where cookie = ? and product_id = ?', [$newtedad,$cookie,$product_id]);
        $numcart = DB::table('basket')->where('cookie', $cookie)->count();
        $basket = DB::table('basket')
            ->leftJoin('products', 'basket.product_id', '=', 'products.id')
            ->where('cookie', $cookie)
            ->get();
        $totalprice = 0;
        $totaltakhfif = 0;
        foreach ($basket as $row) {
            $price = $row->price;
            $tedad = $row->tedad;
            $price_first = $price * $tedad;
            $takhfif = $row->takhfif;
            $darsad_takhfif = $takhfif / 100;
            $price_takhfif = $price_first * $darsad_takhfif;
            $price_total = $price_first - $price_takhfif;
            $totalprice = $totalprice + $price_total;
            $totalprice = floor($totalprice);
            $totaltakhfif = $totaltakhfif + $price_takhfif;
            $totaltakhfif = floor($totaltakhfif);
        }
        return view('front.cart.main', compact( 'basket','totalprice','totaltakhfif'));

        }



    }

    public function adresschange(User $user,Request $request){
        $user_id=$user->id;
        $cookie= $this->getCookie2($request);
        $ship= $request->ship;
        $adress= $request->adress;
        $shiping= DB::table('mahdodes')->get();

        if ($adress==null){

            $msg = "نمی توانید بدون نوشتن آدرس و نیز انتخاب محدوده سفارشی را ثبت کنید!";
            return redirect(route('shiping'))->with('warning', $msg);
        }else{



            $check_exist_adress = DB::table('user_adress')->where('user_id', $user_id)->exists();


            if ($check_exist_adress) {




                DB::update('update user_adress set adress=?,mahdode=? where user_id = ? ', [$adress,$ship,$user_id]);

            } else {
                DB::insert('insert into user_adress (user_id,adress,mahdode,city) values (?,?,?,?)', [$user_id,$adress,$ship,'city']);

            }


            $bazbini= DB::table('user_adress')->where('user_id',$user_id)->first();


            $mahdodeyeman=$bazbini->mahdode;
            $mahdode= DB::table('mahdodes')->where('id',$mahdodeyeman)->first();



            $numcart = DB::table('basket')->where('cookie', $cookie)->count();
            $basket = DB::table('basket')
                ->leftJoin('products', 'basket.product_id', '=', 'products.id')
                ->where('cookie', $cookie)
                ->get();
            $totalprice = 0;
            $totaltakhfif = 0;
            foreach ($basket as $row) {
                $price = $row->price;
                $tedad = $row->tedad;
                $price_first = $price * $tedad;
                $takhfif = $row->takhfif;
                $darsad_takhfif = $takhfif / 100;
                $price_takhfif = $price_first * $darsad_takhfif;
                $price_total = $price_first - $price_takhfif;
                $totalprice = $totalprice + $price_total;
                $totalprice = floor($totalprice);
                $totaltakhfif = $totaltakhfif + $price_takhfif;
                $totaltakhfif = floor($totaltakhfif);
            }


            return view('front.bazbini.main', compact( 'basket','totalprice','totaltakhfif','shiping','bazbini','mahdode'));

        }


    }




    public function addtoo(Product $product,Request $request)

    {







        $product_id = $product->id;





        $cookie= $this->getCookie2($request);








        $check_exist_basket = DB::table('basket')->where('cookie', $cookie)->where('product_id', $product_id)->exists();


        if ($check_exist_basket) {




                DB::update('update basket set tedad=tedad+1 where cookie = ? and product_id = ?', [$cookie,$product_id]);

        } else {

            DB::insert('insert into basket (product_id,cookie,tedad) values (?,?,?)', [$product_id,$cookie,1]);


        }


        $numcart = DB::table('basket')->where('cookie', $cookie)->count();


        $result = DB::table('basket')
            ->leftJoin('products', 'basket.product_id', '=', 'products.id')
            ->where('cookie', $cookie)
            ->get();


        $price_total_all = 0;
        $price_takhfif_all = 0;

        foreach ($result as $row) {
            $price = $row->price;
            $tedad = $row->tedad;
            $price_first = $price * $tedad;
            $takhfif = $row->takhfif;
            $darsad_takhfif = $takhfif / 100;
            $price_takhfif = $price_first * $darsad_takhfif;

            $price_total = $price_first - $price_takhfif;

            $price_total_all = $price_total_all + $price_total;
            $price_total_all = floor($price_total_all);
            $price_takhfif_all = $price_takhfif_all + $price_takhfif;
            $price_takhfif_all = floor($price_takhfif_all);


        }


      // return response()->json(['numcart' => $numcart, 'result' => $result, 'price_total_all' => $price_total_all, 'price_takhfif_all' => $price_takhfif_all]);

      return back();


    }



    public function cart(Request $request)
    {


        $webtitle = "سبد خرید";
        $cookie= $this->getCookie2($request);
        $totalprice=0;
        $totaltakhfif=0;
        $numcart = DB::table('basket')->where('cookie', $cookie)->count();
        $basket = DB::table('basket')
            ->leftJoin('products', 'basket.product_id', '=', 'products.id')
            ->where('cookie', $cookie)
            ->get();
        $totalprice = 0;
        $totaltakhfif = 0;
        foreach ($basket as $row) {
            $price = $row->price;
            $tedad = $row->tedad;
            $price_first = $price * $tedad;
            $takhfif = $row->takhfif;
            $darsad_takhfif = $takhfif / 100;
            $price_takhfif = $price_first * $darsad_takhfif;
            $price_total = $price_first - $price_takhfif;
            $totalprice = $totalprice + $price_total;
            $totalprice = floor($totalprice);
            $totaltakhfif = $totaltakhfif + $price_takhfif;
            $totaltakhfif = floor($totaltakhfif);
        }



        return view('front.cart.main', compact('webtitle', 'basket','totalprice','totaltakhfif'));
    }


    public function shiping(Request $request)
    {


        $webtitle = "انتخاب آدرس";


        $shiping= DB::table('mahdodes')->get();


        $cookie= $this->getCookie2($request);
        $totalprice=0;
        $totaltakhfif=0;
        $numcart = DB::table('basket')->where('cookie', $cookie)->count();
        $basket = DB::table('basket')
            ->leftJoin('products', 'basket.product_id', '=', 'products.id')
            ->where('cookie', $cookie)
            ->get();
        $totalprice = 0;
        $totaltakhfif = 0;
        foreach ($basket as $row) {
            $price = $row->price;
            $tedad = $row->tedad;
            $price_first = $price * $tedad;
            $takhfif = $row->takhfif;
            $darsad_takhfif = $takhfif / 100;
            $price_takhfif = $price_first * $darsad_takhfif;
            $price_total = $price_first - $price_takhfif;
            $totalprice = $totalprice + $price_total;
            $totalprice = floor($totalprice);
            $totaltakhfif = $totaltakhfif + $price_takhfif;
            $totaltakhfif = floor($totaltakhfif);
        }



        return view('front.shiping.main', compact('webtitle', 'basket','totalprice','totaltakhfif','shiping'));
    }




    public function bazbini(Request $request)
    {


        $webtitle = "بازبینی";

        $user_id=Auth::user()->id;

        $bazbini= DB::table('user_adress')->where('user_id',$user_id)->first();


        $mahdodeyeman=$bazbini->mahdode;
        $mahdode= DB::table('mahdodes')->where('id',$mahdodeyeman)->first();


        $cookie= $this->getCookie2($request);
        $totalprice=0;
        $totaltakhfif=0;
        $numcart = DB::table('basket')->where('cookie', $cookie)->count();
        $basket = DB::table('basket')
            ->leftJoin('products', 'basket.product_id', '=', 'products.id')
            ->where('cookie', $cookie)
            ->get();
        $totalprice = 0;
        $totaltakhfif = 0;
        foreach ($basket as $row) {
            $price = $row->price;
            $tedad = $row->tedad;
            $price_first = $price * $tedad;
            $takhfif = $row->takhfif;
            $darsad_takhfif = $takhfif / 100;
            $price_takhfif = $price_first * $darsad_takhfif;
            $price_total = $price_first - $price_takhfif;
            $totalprice = $totalprice + $price_total;
            $totalprice = floor($totalprice);
            $totaltakhfif = $totaltakhfif + $price_takhfif;
            $totaltakhfif = floor($totaltakhfif);
        }



        return view('front.bazbini.main', compact('webtitle', 'basket','totalprice','totaltakhfif','bazbini','mahdode'));
    }






    public function deletecart($id)
    {





        DB::table('basket')->where('product_id', '=', $id)->delete();
        $msg = "حذف با موفقیت انجام شد!";

        return redirect(route('cart'))->with('success', $msg);

    }


    public function pardakht(Request $request)
    {


        $cookie= self::getcookie($request);





        $payment = new Payment();




        $payment1=$request->price;
        $payment1=intval($payment1);

        $timing=time();
        $barcode=time().$payment1;


        /*$ali= gettype($payment);*/ // integer

        $result = DB::table('basket')
            ->leftJoin('products', 'basket.product_id', '=', 'products.id')
            ->where('cookie', $cookie)
            ->get();

        $basket = serialize($result);
        // dd($basket);
        $user_id=Auth::user()->id;
        $family=Auth::user()->family;
        $email=Auth::user()->email;
        $mobile=Auth::user()->mobile;




         $invoice = new Invoice();

// Set invoice amount.
        $invoice->amount($payment1);
        $invoice->detail(['family' => $family]);
        $invoice->detail(['email' => $email]);
        $invoice->detail(['mobile' => $mobile]);
        return $payment->purchase($invoice, function($driver, $transactionId)use ( $basket, $payment1, $user_id) {
            // Store transactionId in database as we need it to verify payment in the future.

            $Authority=substr($transactionId,26);

            DB::insert('insert into orders(user_id,amount,rah_pay,basket,vaziat,reserve,pardakht) values (?,?,?,?,?,?,?)',
                [$user_id,$payment1,1,$basket,0,$Authority,0]);




        })->pay()->render();

       /* return $payment->purchase($invoice, function($driver, $transactionId) use ($timing, $basket, $payment, $user_id){
            // Store transactionId in database as we need it to verify payment in the future.

            $Authority=substr($transactionId,26);
            dd($payment);
            DB::insert('insert into orders(user_id,amount,rah_pay,basket,vaziat,reserve,pardakht,timing) values (?,?,?,?,?,?,?,?)',
                [$user_id,$payment,1,$basket,0,$Authority,0,$timing]);


        })->pay();*/
















    }

    public function verify(Request $request){
        $status=$request['Status'];


        $Authority=$request['Authority'];
        $Authority=substr($Authority,26);

        $result=DB::table('orders')->where('reserve',$Authority)->first();

        $price=$result->amount;
        $basket=$result->basket;
        $basket=unserialize($basket);



        $user_id=$result->user_id;
        $family=Auth::user()->family;
        $email=Auth::user()->email;
        $mobile=Auth::user()->mobile;
        $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");

        $user = "programit";
        $pass = "0082444706";
        $fromNum = "3000505";
        $toNum = array($mobile);
        $time = '';
        $op  = "send";



        if ($status=="NOK"){

            $msg = "شما یک امتیاز منفی گرفتید";

            DB::update('update users set emtiaz=emtiaz-1  where id = ?', [$user_id]);   // با هر کنسلی در خرید یک امتیاز منفی


            $messageContent = " سلام ".$family." ، خرید شما کامل نشد!  با تشکر  " ;
            //If you want to send in the future  ==> $time = '2016-07-30' //$time = '2016-07-30 12:50:50'
            $client->SendSMS($fromNum,$toNum,$messageContent,$user,$pass,$time,$op);



            return redirect(route('cart'))->with('warning', $msg);


        }

        if ($status=="100") {
            try {
                $receipt = Payment::amount($price)->transactionId($Authority)->verify();

                // You can show payment referenceId to the user.

                DB::update('update orders set pardakht = ?  where reserve = ?', [1, $Authority]);
                DB::update('update users set sum_kharid = sum_kharid+1,emtiaz=emtiaz+5  where id = ?', [$user_id]);  // با هر خرید 5 امتیاز مثبت
                $cookie= self::getcookie($request);
                DB::table('basket')->where('cookie', '=', $cookie)->delete();



                foreach ($basket as $row){

                    DB::update('update products set hit = hit+1  where id = ?', [$row->product_id]);  // آمار خرید محصول یکی اضافه می گردد


                }








                $messageContent = " سلام ".$family." ، از خرید شما سپاسگزاریم   " ;
                //If you want to send in the future  ==> $time = '2016-07-30' //$time = '2016-07-30 12:50:50'
                $client->SendSMS($fromNum,$toNum,$messageContent,$user,$pass,$time,$op);

                // $msg= $receipt->getReferenceId();
                $msg = " پرداخت با موفقیت انجام شد و شما 5 امتیاز گرفتید";
                return redirect(route('index'))->with('success', $msg);
            } catch (InvalidPaymentException $exception) {
                /**
                 * when payment is not verified, it will throw an exception.
                 * We can catch the exception to handle invalid payments.
                 * getMessage method, returns a suitable message that can be used in user interface.
                 **/
                // $msg= $exception->getMessage();

            }
        }

    }




}

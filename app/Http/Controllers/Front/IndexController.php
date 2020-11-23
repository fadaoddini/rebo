<?php

namespace App\Http\Controllers\Front;






use App\Http\Controllers\Controller;


use App\Models\admin\Adver;
use App\Models\admin\Product;
use App\Models\Slider;
use App\Models\admin\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use PhpParser\Node\Stmt\DeclareDeclare;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use SoapClient;

class IndexController extends Controller
{
    public function index(Request $request)
    {


        $webtitle = "صفحه اصلی";

        $sliders = slider::orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        $products_vije = Product::orderBy('id', 'DESC')->where("vije",1)->get();
        $adver1 = Adver::orderBy('id', 'DESC')->where("place",1)->first();
        $adver2 = Adver::orderBy('id', 'DESC')->where("place",2)->first();


        return view('front.index.main', compact('webtitle','sliders','categories','products_vije','adver1','adver2'));
    }





}

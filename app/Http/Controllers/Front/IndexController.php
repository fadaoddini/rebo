<?php

namespace App\Http\Controllers\Front;


use App\frontmodel\Article;
use App\frontmodel\Order;
use App\frontmodel\User;
use App\frontmodel\Level;
use App\frontmodel\Learn;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Examlist;
use App\Models\Option;
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



        return view('front.index.index', compact('webtitle'));
    }





}

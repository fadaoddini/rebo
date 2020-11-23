<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class OrderController extends Controller
{
    public $websitename = "ربو";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webtitle = "مدیریت سفارشات";
        $websitename = $this->websitename;

        $orders = Order::orderBy('id', 'DESC')->paginate(10);



        return view('back.order.index', compact('webtitle', 'websitename', 'orders'));
    }

    public function indexnot()
    {
        $webtitle = "مدیریت سفارشات";
        $websitename = $this->websitename;

        $orders = Order::orderBy('id', 'DESC')->where('pardakht','=',0)->paginate(10);



        return view('back.order.index', compact('webtitle', 'websitename', 'orders'));
    }
    public function indexok()
    {
        $webtitle = "مدیریت سفارشات";
        $websitename = $this->websitename;

        $orders = Order::orderBy('id', 'DESC')->where('pardakht','=',1)->paginate(10);



        return view('back.order.index', compact('webtitle', 'websitename', 'orders'));
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        try {
            $order->delete();
            $msg = "حذف با موفقیت انجام شد!";
        } catch (Exception $exception) {
            $msg = "مشکلی در حذف کردن اتفاق افتاده است دوباره تلاش کنید";
            return redirect(route('admin.order'))->with('warning', $msg);
        }
        return redirect(route('admin.learn'))->with('success', $msg);
    }

    public function updatechangeorder(Order $order)
    {

        if ($order->pardakht==1){
            $order->pardakht=0;
        }else{
            $order->pardakht=1;
        }
        $order->save();
        $msg = "تغییرات با موفقیت انجام شد";
        return redirect(route('admin.order'))->with('warning', $msg);

    }
}

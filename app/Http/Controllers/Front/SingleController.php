<?php

namespace App\Http\Controllers\Front;
use App\Models\admin\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SingleController extends Controller
{
    public $websitename = "ربو";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $webtitle = $this->websitename;
        $product_single=DB::table('products')->where('slug',$slug )->first();
        $comments=DB::table('comments')->where('product_id',$product_single->id )->where('status','=','1' )->get();


        $averagecoment=DB::table('comments')->where('product_id',$product_single->id )->where('status','=','1' )->avg('rating');

        $averagecoment=round($averagecoment,1); //output: 2.5


        $oldproduct=DB::table('products')->where('slug','<>',$slug )->Orderby('id','DESC')->paginate(5);
        $writter=DB::table('users')->select('family')->where('id',$product_single->user_id )->first();

        $writter=$writter->family;



        return view('front.single.main', compact('webtitle', 'product_single','writter','oldproduct','comments','averagecoment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

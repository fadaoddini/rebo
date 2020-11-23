<?php


namespace App\Http\Controllers\Front;

use App\Models\Comment;
use App\Models\admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
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
    public function store(Product $product,Request $request)
    {






        $message = [
            'name.required' => 'نام خود را وارد نمائید',
            'rating.required' => 'رتبه خود را در مورد این محصول وارد نمائید',
            'body.required' => 'توضیح دوره را وارد نمائید',


        ];
        $validatedData = $request->validate([
            'name' => ' required ',
            'body' => ' required ',
            'rating' => ' required ',


        ], $message);




        $product->comments()->create(
            [
                'name' => $request->name,
                'body' => $request->body,
                'rating' => $request->rating,
                'user_id'=>Auth::user()->id,


            ]
        );


        $msg = " نظر جدید ثبت شد ! بعد از تائیدیه مدیر روی سایت قرار خواهد گرفت";
        return back()->with('success', $msg);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}

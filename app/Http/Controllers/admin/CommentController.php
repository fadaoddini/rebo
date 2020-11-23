<?php

namespace App\Http\Controllers\admin;

use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class CommentController extends Controller
{
    public $websitename = "ربو";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webtitle = "مدیریت نظرات";
        $websitename = $this->websitename;

        $comments = Comment::orderBy('id', 'DESC')->paginate(10);

        return view('back.comment.index', compact('webtitle', 'websitename', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $webtitle = "مدیریت نظرات";
        $websitename = $this->websitename;

        $categories = Category::all()->pluck('id','name');  //میگیم فقط id  رو نیاز داریم و نام دسته بندی رو
        $levels = Level::all()->pluck('id','name');  //میگیم فقط id  رو نیاز داریم و نام سطح بندی رو

        return view('back.comment.create-comment', compact('webtitle', 'websitename','categories','levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $websitename = $this->websitename;
        $categories = Category::all()->pluck('id','name');  //میگیم فقط id  رو نیاز داریم و نام دسته بندی رو





        return view('back/comment/edit-comment', compact('websitename', 'comment','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
            $msg = "حذف با موفقیت انجام شد!";
        } catch (Exception $exception) {
            $msg = "مشکلی در حذف کردن اتفاق افتاده است دوباره تلاش کنید";
            return redirect(route('admin.comment.edit'))->with('warning', $msg);
        }
        return redirect(route('admin.comment'))->with('success', $msg);
    }


    public function updatechangecomment(comment $comment)
    {

        if ($comment->status==1){
            $comment->status=0;
        }else{
            $comment->status=1;
        }


        $comment->save();

        $averagecoment=DB::table('comments')->where('product_id',$comment->product_id )->where('status','=','1' )->avg('rating');

        $averagecoment=round($averagecoment,1); //output: 2.5


        $affected = DB::table('products')
            ->where('id', $comment->product_id)
            ->update(['ratee' => $averagecoment]);

        $msg = "تغییرات با موفقیت انجام شد";
        return redirect(route('admin.comment'))->with('warning', $msg);

    }








}

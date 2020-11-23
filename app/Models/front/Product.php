<?php

namespace App\Models\admin;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'lid', 'user_id','image','price','takhfif','slug','vije',
    ];
    protected $attributes=[
        'hit'=>1,
        'vije'=>0,
        'status'=>1,

        'likee'=>1,
        'ratee'=>2.5,

    ];

    public function categories(){

        /*        این بابت اینه که در این جا یک محصول ممکنه در چندین دسته بندی قرار گرفته باشه */

        return $this->belongsToMany(Category::class);
    }

    public function user(){

        /*        این جا به دلیل اینکه یک کاربر می تواند چندین محصول را ایجاد کرده باشد*/


        return $this->belongsTo(User::class);
    }
    public function comments(){

        return$this->hasMany(Comment::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }




}

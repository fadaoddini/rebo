<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'body', 'product_id', 'user_id', 'rating','status',
    ];
    protected $attributes=[

        'rating'=>2.5,

    ];



    public function products(){

        /*        این بابت اینه که در این جا یک محصول ممکنه چندین نظر داشته باشه */

        return $this->belongsToMany(Blog::class);
    }

    public function user(){

        /*        این جا به دلیل اینکه یک کاربر می تواند چندین نظر رو ثبت کنه */


        return $this->belongsTo(User::class);
    }

}

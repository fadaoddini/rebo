<?php

namespace App\Models\front;

use App\Models\admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'place', 'en_name', 'metatag',
    ];


    public function products(){

        /*        این بابت اینه که در این جا یک محصول ممکنه در چندین دسته بندی قرار گرفته باشه */

        return $this->belongsToMany(Product::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }








}

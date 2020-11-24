<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahdode extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','price','timing',
    ];
    protected $attributes=[

        'status'=>1,


    ];

}

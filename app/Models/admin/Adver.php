<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adver extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'lid', 'title_link', 'link','bgcolor','bgcolor2'
    ];

    protected $attributes = [
        'status'=> 1,
        'place'=> 1,

    ];
}

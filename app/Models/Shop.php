<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected $fillable = [
        "city_id",
        "title",
        "avatar_path",
        "shipping_policy",
        "return_policy"
    ];
}

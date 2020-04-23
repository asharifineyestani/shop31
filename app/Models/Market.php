<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    //
    protected $fillable = [
        "product_id",
        "shop_id",
        "color_id",
        "price",
        "quantity"
    ];
}

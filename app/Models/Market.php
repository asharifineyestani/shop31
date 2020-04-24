<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{

    protected $fillable = [
        "product_id",
        "shop_id",
        "color_id",
        "price",
        "quantity"
    ];


    protected $hidden = ['price','shop_id'];


    protected $appends = ['current_price', 'old_price'];


    public function getOldPriceAttribute()
    {
        if ($this->discount_percent)
            return $this->price;

        return null;

    }

    public function getCurrentPriceAttribute()
    {
        if ($this->discount_percent)
            return $this->price - ($this->price * $this->discount_percent) / 100;

        return $this->price;
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}

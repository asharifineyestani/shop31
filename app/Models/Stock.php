<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        "product_id",
        "shop_id",
        "color_id",
        "price",
        "quantity",
        "discount_percent"
    ];


    protected $hidden = ['price','shop_id'];


    protected $appends = ['current_price', 'old_price'];


    public function getOldPriceAttribute()
    {

        return $this->price;

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

    public function product()
    {
        return $this->belongsTo(Product::class);
    }



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->shop_id = 1;
            $model->color_id = 1;
        });
    }
}

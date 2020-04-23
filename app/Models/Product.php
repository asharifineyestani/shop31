<?php

namespace App\Models;

use App\Casts\Detail;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        "category_id",
        "brand_id",
        "title",
        "details",
    ];

    protected $hidden = ['category_id','brand_id'];

    protected $casts = [
        'details' => Detail::class
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class)->select(['id','title']);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select(['id','title']);
    }
}

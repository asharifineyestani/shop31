<?php

namespace App\Models;

use App\Casts\Att;
use App\Helpers\HasPagination;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        "parent_id",
        "title"
    ];

    protected $casts = [
        'attributes' => Att::class
    ];



    public function filters()
    {
        return $this->hasMany(Attribute::class)->where('is_filter', 1)->with('options');

    }

    public function products()
    {
        return $this->hasMany(Product::class);

    }
}

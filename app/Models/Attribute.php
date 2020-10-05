<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{

    use Enum;


    protected $fillable = [
        "category_id",
        "title",
        "type",
        "is_filter"
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

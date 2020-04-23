<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    //
    protected $fillable = [
        "category_id",
        "title",
        "type",
        "is_filter"
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentable extends Model
{
    //
    protected $fillable = [
        "user_id",
        "title",
        "body",
        "commentable_type",
        "commentable_id"
    ];
}

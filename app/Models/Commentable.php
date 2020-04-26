<?php

namespace App\Models;

use App\User;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

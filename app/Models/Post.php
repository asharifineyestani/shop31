<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';


    protected $fillable = [
        "body",
        "category_id",
        "count_like",
        "excerpt",
        "id",
        "media_path",
        "meta_description",
        "meta_keywords",
        "slug",
        "status",
        "title",
        "type",
        "user_id"
    ];

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = 'POST';
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = uniqid();
            $model->type = 1;
        });
    }

}

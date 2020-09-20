<?php

namespace App\Models;


class Page extends Post
{


    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = 'PAGE';
    }
}

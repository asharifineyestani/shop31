<?php

namespace App\Models;

use App\Casts\Detail;
use App\Helpers\HasPagination;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasPagination;


    protected $fillable = [
        "category_id",
        "brand_id",
        "title",
        "details",
    ];


    protected $hidden = ['category_id', 'brand_id'];


    protected $casts = [
        'details' => Detail::class
    ];


    public function brand()
    {
        return $this->belongsTo(Brand::class)->select(['id', 'title']);
    }


    public function category()
    {
        return $this->belongsTo(Category::class)->select(['id', 'title']);
    }


    public function scopeHasFilterAttribute($query, $attributes)
    {
        if ($attributes)
            foreach ($attributes as $key => $value) {
                if (is_array($value)) {
                    $query = $query->whereJsonContains('details->' . $key, (int)$value[0]);
                    if (count($value) > 0)
                        for ($i = 1; $i < count($value); $i++) {
                            $query = $query->orWhereJsonContains('details->' . $key, (int)$value[$i]);
                        }
                } else
                    $query = $query->where('details->' . $key, $value);

            }

        return $query;
    }


}

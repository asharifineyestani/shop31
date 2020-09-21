<?php

namespace App\Models;

use App\Casts\Detail;
use App\Helpers\HasPagination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasPagination;


    protected $fillable = [
        "avatar_path",
        "category_id",
        "brand_id",
        "title",
        "details",

    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->category_id = 1;
            $model->brand_id = 1;
            $model->details = "{}";
        });
    }



//    protected $hidden = ['category_id', 'brand_id'];


    protected $casts = [
        'details' => Detail::class
    ];

    protected $appends = ['colors', 'current_price', 'old_price', 'discount_percent', 'in_stock'];


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


    public function stocks()
    {
        return $this->hasMany(Stock::class)
            ->orderBy(DB::raw('(price) - (price * discount_percent ) / 100'), 'ASC');
    }


    public function getColorsAttribute($colors = [])
    {
        if (!$this->stocks()->first())
            return null;

        $select = ['id', 'name'];

        $stocks = $this->stocks()
            ->with(['color' => function ($query) use ($select) {
                return $query->select($select);
            }])
            ->groupBy('color_id')
            ->get();

        foreach ($stocks as $stock) {
            $colors[] = $stock->color;
        }

        return $colors;
    }


    public function getCurrentPriceAttribute()
    {
        if (!$stock = $this->stocks()->first())
            return null;
        return $stock->current_price;
    }


    public function getOldPriceAttribute()
    {
        if (!$stock = $this->stocks()->first())
            return null;
        return $stock->old_price;
    }


    public function getDiscountPercentAttribute()
    {
        if (!$stock = $this->stocks()->first())
            return false;

        return $stock->discount_percent;
    }


    public function getInStockAttribute()
    {
        if (!$stock = $this->stocks()->first())
            return false;

        return ($stock->quantity > 0) ? true : false;
    }


    public function scopeHasPublicFilters($query, $request)
    {
        if ($request->brand)
            $query = $query->where('brand_id', $request->brand);

        if ($request->colors)
            $query = $query->whereIn('color_id', $request->colors);

        if ($request->in_stock)
            $query = $query->whereHas('stocks', function ($q) {
                $q->where('quantity', '>', 0);
            });

        if ($request->price)
            $query = $query->whereHas('stocks', function ($q) use ($request) {
                $q->where('price', '<=', $request->price['max'])->where('price', '>=', $request->price['min']);
            });

        return $query;
    }


}

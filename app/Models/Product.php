<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'qty',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // auto set status based on quantity
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            $product->status = $product->qty > 0 ? 1 : 0;
        });
    }

    // helper methods for stock status

    public function isInStock()
    {
        return $this->qty > 0;
    }

    public function isOutOfStock()
    {
        return $this->qty == 0;
    }

    public function isLowStock()
    {
        return $this->qty > 0 && $this->qty <= 5;
    }
}

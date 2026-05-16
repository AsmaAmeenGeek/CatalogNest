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
        'category_id',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 🔥 AUTO STATUS LOGIC (IMPORTANT FIX)
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            $product->status = $product->qty > 0 ? 1 : 0;
        });
    }
}

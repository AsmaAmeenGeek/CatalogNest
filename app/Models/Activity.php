<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'type',
        'message',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

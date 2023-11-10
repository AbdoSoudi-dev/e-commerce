<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'image', 'price', 'size', 'color',  'quantity'
    ];

    protected static function booted() : void
    {
        static::addGlobalScope('available', function ($query) {
            $query->where('quantity', '>', 0);
        });
    }

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function carts() : HasMany
    {
        return $this->hasMany(Cart::class);
    }
}

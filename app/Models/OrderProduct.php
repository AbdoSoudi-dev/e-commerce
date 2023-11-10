<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'product_id', 'price', 'quantity', 'size', 'color',
    ];
    public $timestamps = false;

    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

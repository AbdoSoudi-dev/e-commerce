<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'user_id', 'status', 'total',
    ];
    protected $casts = [
        'status' => OrderStatus::class,
    ];
    protected static function booted() : void
    {
        static::creating(function(Order $order) {
            $order->number = Order::getNextOrderNumber();
        });
    }

    public static function getNextOrderNumber() : int
    {
        $year =  Carbon::now()->year;
        $number = self::whereYear('created_at', $year)->max('number');

        return $number ? $number + 1 : $year .  '0001';
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class)
            ->withDefault([
                'name' => 'Guest'
            ]);
    }

    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class,
            'order_items', 'order_id',
            'product_id', 'id', 'id')
            ->using(OrderItem::class)
            ->as('order_item')
            ->withPivot([
                'status', 'price', 'quantity', 'size', 'color'
            ]);
    }

    public function orderItems() : HasMany
    {
        return $this->hasMany(OrderItem::class);
    }


}

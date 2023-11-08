<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Cart extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'cookie_id',
        'user_id',
        'product_price_id',
        'quantity',
    ];
    protected static function booted() : void
    {
        static::addGlobalScope('cookie_id', function(Builder $builder) {
            $builder->where('cookie_id', '=', Cart::getCookieId());
        });
    }

    public static function getCookieId() : string
    {
        $cookie_id = Cookie::get('cart_id');
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            Cookie::queue('cart_id', $cookie_id, 30 * 24 * 60);
        }
        return $cookie_id;
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class)
            ->withDefault([
                'name' => 'Anonymous',
             ]);
    }

    public function productPrice() : BelongsTo
    {
        return $this->belongsTo(ProductPrice::class);
    }
}

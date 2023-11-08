<?php

namespace App\Services\Cart\Repositories;

use App\Models\Cart;
use App\Models\ProductPrice;
use Illuminate\Support\Collection;

class CartRepository
{
    protected Cart $cart;

    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function get() : Collection
    {
        return $this->cart::with('product_price.product')->get();
    }

    public function add(ProductPrice $productPrice, $quantity = 1) : Cart
    {
        $item =  $this->cart::where('product_price_id', '=', $productPrice->id)
                ->first();

        if (!$item) {
            return $this->cart::create([
                'user_id' => auth('api')->id(),
                'product_price_id' => $productPrice->id,
                'quantity' => $quantity,
            ]);
        }

        return $item->increment('quantity', $quantity);
    }

    public function update($id, $quantity) : Cart
    {
        return tap($this->cart::where('id', '=', $id))
                ->update([
                    'quantity' => $quantity,
                ]);
    }

    public function delete($id) : void
    {
        $this->cart::where('id', '=', $id)
            ->delete();
    }

    public function empty() : void
    {
        $this->cart::query()->delete();
    }

    public function total() : float
    {
        return $this->get()->sum(function($item) {
            return $item->quantity * $item->product_price->price;
        });
    }
}

<?php

namespace App\Services\Cart\Contracts;

use App\Models\Cart;
use App\Models\ProductPrice;
use Illuminate\Support\Collection;

interface CartContract
{
    public function get() : Collection;

    public function add(ProductPrice $productPrice, $quantity = 1) : Cart;

    public function update($id, $quantity) : Cart;

    public function delete($id) : void;

    public function empty() : void;

    public function total() : float;

    public function deleteCartsProduct($productPriceId) : void;

    public function decrementCartsProductQuantity(ProductPrice $productPrice) : void;
}

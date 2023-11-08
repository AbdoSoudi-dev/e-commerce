<?php

namespace App\Services\Cart\Contracts;

use App\Models\ProductPrice;
use Illuminate\Support\Collection;

interface CartContract
{
    public function get() : Collection;

    public function add(ProductPrice $productPrice, $quantity = 1);

    public function update($id, $quantity);

    public function delete($id);

    public function empty();

    public function total() : float;
}

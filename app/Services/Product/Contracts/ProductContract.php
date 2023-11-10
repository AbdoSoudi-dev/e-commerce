<?php

namespace App\Services\Product\Contracts;

use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ProductContract
{
    public function get() : Collection;

    public function getAvailable() : LengthAwarePaginator | Collection;

    public function add(ProductRequest $request) : Product;

    public function show(int $id) : Product;

    public function showBySlug(string $slug) : Product;

    public function update(ProductRequest $request, Product $product) : Product;

    public function delete($id) : void;

}

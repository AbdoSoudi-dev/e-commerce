<?php

namespace App\Services\Product;

use App\Http\Resources\PaginateResource;
use App\Http\Resources\ProductResource;
use App\Services\Product\Repositories\ProductRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProductService
{
    private ProductRepository $product;

    public function __construct()
    {
        $this->product = new ProductRepository();
    }

    public function get() : Collection
    {
        return $this->product->get();
    }
    public function availableProducts() : LengthAwarePaginator | JsonResource
    {
        $availableProducts = $this->product->getAvailable();

        if (request()->expectsJson()){
            return PaginateResource::make(
                $availableProducts,
                ProductResource::class
            );
        }
        return $availableProducts;
    }

    public function getBySlug(string $slug) : object
    {
        $product = $this->product->showBySlug(slug:$slug);

        if (request()->expectsJson()){
            return new ProductResource($product);
        }
        return $product;
    }
}

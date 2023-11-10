<?php

namespace App\Services\Product\Facades;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static  LengthAwarePaginator | JsonResource availableProducts()
 * @method static  Collection get()
 * @method static  object getBySlug(string $slug)
 */
class Product extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string
    {
        return "ProductService";
    }

}

<?php

namespace App\Services\Product\Repositories;

use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use App\Services\Product\Contracts\ProductContract;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class ProductRepository implements ProductContract
{
    protected Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function get() : Collection
    {
        return $this->product::withoutGlobalScope('active')
            ->with('product_prices',fn($query)=>$query->withoutGlobalScope('available'))
            ->get();
    }

    public function getAvailable(): LengthAwarePaginator
    {
        return $this->product::with('category')
            ->withWhereHas('product_prices')
            ->paginate();
    }

    public function add(ProductRequest $request): Product
    {
        return Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'admin_id' => auth('admin')->id(),
        ]);
    }

    public function show(int $id): Product
    {
        return $this->product::find($id)
            ->with('product_prices');
    }

    public function showBySlug(string $slug): Product
    {
        return $this->product::where('slug', $slug)
                ->with('product_prices')
                ->first();
    }

    public function update(ProductRequest $request, Product $product): Product
    {
        return tap($product)->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);
    }

    public function delete($id): void
    {
        $this->product::destroy($id);
    }
}

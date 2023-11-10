<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Product\Facades\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::availableProducts();
        return response()->json($products, 200);
    }

    public function show(string $slug)
    {
        $product = Product::getBySlug(slug: $slug);
        $statusCode = empty($product) ? 200 : 404;

        return response()
                ->json($product, $statusCode);
    }

}

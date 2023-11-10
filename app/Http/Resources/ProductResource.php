<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'image' => $this->image,
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name,
            ],
            'variants' => $this->productPrices->transform(fn($item)=> [
                    'id' => $item->id,
                    'name' => $item->name,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'color' => $item->color,
                    'size' => $item->size,
                    'image' => $item->image,
                    'status' => match ($item->quantity) {
                        0 => 'Out of Stock',
                        1, 2 => 'low stock',
                        default => 'In Stock',
                    },
                ]),
        ];
    }
}

<?php

namespace App\Models;

use App\Enums\ProductStatus;
use App\Traits\Models\ActiveGlobalScope;
use App\Traits\Models\SetSlugCreating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, SetSlugCreating, ActiveGlobalScope;

    protected $fillable = [
        'name', 'slug', 'image', 'description', 'rating', 'admin_id', 'category_id','status'
    ];

    protected $casts = [
        'status' => ProductStatus::class,
    ];

    public function admin() : BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function productPrices() : HasMany
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function reviews() : HasMany
    {
        return $this->hasMany(Review::class);
    }



}

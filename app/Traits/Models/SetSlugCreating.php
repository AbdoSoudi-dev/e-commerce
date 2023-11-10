<?php

namespace App\Traits\Models;

use Illuminate\Support\Str;

trait SetSlugCreating
{
    protected static function bootSetSlugCreating() : void
    {
        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
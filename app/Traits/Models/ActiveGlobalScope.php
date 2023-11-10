<?php

namespace App\Traits\Models;

trait ActiveGlobalScope
{
    protected static function bootActiveGlobalScope() : void
    {
        static::addGlobalScope('active', function ($builder) {
            $builder->where('status', 'active');
        });
    }
}

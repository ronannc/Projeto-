<?php

namespace App\Scopes;

trait CompanyGlobalScope
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new CompanyScope());
    }
}

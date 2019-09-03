<?php

namespace App\Scopes;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class CompanyScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param Builder $builder
     * @param Model   $model
     *
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (auth()->check() && !User::isAdmin()) {
            $company_id = Company::withoutGlobalScope(CompanyScope::class)->find(Auth::user()->company_id)->id;
            $builder->where($model->getTable() . '.clinic_id', $company_id);
        }
    }
}

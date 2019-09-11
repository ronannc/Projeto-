<?php

namespace App\Filter;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

class MenuFilter implements FilterInterface
{
    public function transform($item, Builder $builder)
    {

        if (isset($item['can']) && !User::hasThisPermission($item['can'], false, Auth::user()['id'])) {
            return false;
        }

        return $item;
    }
}

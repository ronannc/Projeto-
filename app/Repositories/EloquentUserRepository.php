<?php

namespace App\Repositories;


use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class EloquentUserRepository extends AbstractEloquentRepository implements UserRepository
{
    public function getExtraData($id = null)
    {
        $extraData['client'] = Client::all();
        $extraData['company'] = Company::all();
        $extraData['role'] = Role::all();

        if (!empty($id)) {
            $extraData['permissions'] = Role::findByName(User::MANAGER)->permissions()->get();
            $extraData['permissionsViaRoles'] = User::getUserRolePermissions($id);
            $extraData['directPermissions'] = User::getUserDirectPermissions($id);
        }

        return $extraData;
    }

    public function findByEmail(string $email): ?User
    {
        return User::with([])
            ->where('email', '=', $email)
            ->first();
    }

    /**
     * Conta quantos usuários acessaram o sistema na última semana.
     *
     * @param $dayOfWeek
     *
     * @return int
     */
    public function getOnlineUsersOnLastWeek($dayOfWeek)
    {
        return User::with([])
            ->where('last_access', '>=', Carbon::now()->subDays(7))
            ->where(DB::raw('DAYOFWEEK(DATE(last_access))'), $dayOfWeek)
            ->count();
    }
}

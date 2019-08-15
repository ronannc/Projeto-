<?php

namespace App\Models;

use App\Support\Translate;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use HasRoles;
    const SUPERADMIN = 'superAdmin';
    const ADMIN = 'admin';
    const CLIENT = 'client';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'id_client', 'id_company'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function isSuperAdmin()
    {
        return Auth::check() && Auth::user()->hasRole(self::SUPERADMIN);
    }

    public static function isAdmin()
    {
        return Auth::check() && Auth::user()->hasRole(self::ADMIN);
    }

    public static function isClient()
    {
        return Auth::check() && Auth::user()->hasRole(self::CLIENT);
    }

    public static function client()
    {
        return Auth::user()->hasone(Client::class, 'id', 'id_client');
    }

    /**
     * Retorna todas as roles associadas a um usuário.
     *
     * @param int|null $userId
     *
     * @return mixed
     */
    public static function getUserRoles($userId = null)
    {
        if (!empty($userId)) {
            $user = User::with([])->find($userId);

            return $user->getRoleNames();
        }

        return Auth::user()->getRoleNames();
    }

    /**
     * Retorna todas as permissions associadas a um usuário.
     *
     * @param int|null $userId
     *
     * @return mixed
     * @throws \Exception
     */
    public static function getUserPermissions($userId = null)
    {
        if (!empty($userId)) {
            $user = User::with([])->find($userId);

            return $user->getAllPermissions();
        }

        return Auth::user()->getAllPermissions();
    }

    /**
     * Checa se o usuário possui uma role específica.
     *
     * @param $role
     * @param int|null $userId
     *
     * @return mixed
     */
    public static function hasThisRole($role, $userId = null)
    {
        if (!empty($userId)) {
            $user = User::with([])->find($userId);

            return $user->hasRole($role);
        }

        return Auth::user()->hasRole($role);
    }

    /**
     * Checa se o usuário possui uma permission em específico.
     *
     * @param $permission
     * @param bool $translated
     * @param int|null $userId
     * @return bool
     */
    public static function hasThisPermission($permission, $translated = false, $userId = null)
    {
        if ($translated) {
            $permissionEnglish = array_search($permission, Translate::PT_BR);
        } else {
            $permissionEnglish = $permission;
        }

        if (!empty($permissionEnglish)) {
            if (!empty($userId)) {
                $user = User::with([])->find($userId);

                return $user->hasPermissionTo($permissionEnglish);
            }

            return Auth::user()->hasPermissionTo($permissionEnglish);
        }

        return false;
    }
}

<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use DateTime;
use Exception as ExceptionAlias;
use HighIdeas\UsersOnline\Traits\UsersOnlineTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 *
 * @package App\Models
 *
 * @property string   id
 * @property string   name
 * @property string   email
 * @property boolean  is_active
 * @property DateTime last_access
 * @property DateTime created_at
 * @property DateTime updated_at
 *
 * @property Company  company
 *
 */
class User extends Authenticatable implements AuditableContract
{
    use Notifiable;
    use Auditable;
    use HasRoles;
    use HasApiTokens;
    use UsersOnlineTrait;

    const ADMIN = 'Admin';
    const MANAGER = 'Manager';

    const ACTIVE = true;
    const NOT_ACTIVE = false;

    public $email_address;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'client_id',
        'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (!empty(request()->get('email'))) {
            $this->email_address = request()->get('email');
        }
    }

    /**
     * Checa se o usuário logado é do tipo ADMIN.
     *
     * @return bool
     */
    public static function isAdmin()
    {
        return Auth::check() && Auth::user()->hasRole(self::ADMIN);
    }

    /**
     * Checa se o usuário logado é do tipo MANAGER.
     *
     * @return bool
     */
    public static function isManager()
    {
        return Auth::check() && Auth::user()->hasRole(self::MANAGER);
    }

    /**
     * Retorna todos os usuários com a role admin.
     *
     * @return mixed
     */
    public static function allAdmins()
    {
        return User::role(User::ADMIN)->get();
    }

    /**
     * Retorna todas as roles associadas a um usuário.
     *
     * @param $userId
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
     * @param null $userId
     *
     * @return mixed
     * @throws ExceptionAlias
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
     * Retorna todas as permissions associadas a um usuário diretamente.
     *
     * @param null $userId
     *
     * @return mixed
     */
    public static function getUserDirectPermissions($userId = null)
    {
        if (!empty($userId)) {
            $user = User::with([])->find($userId);

            return $user->getDirectPermissions();
        }

        return Auth::user()->getDirectPermissions();
    }

    /**
     * Retorna todas as permissions associadas a um usuário via roles.
     *
     * @param null $userId
     *
     * @return mixed
     */
    public static function getUserRolePermissions($userId = null)
    {
        if (!empty($userId)) {
            $user = User::with([])->find($userId);

            return $user->getPermissionsViaRoles();
        }

        return Auth::user()->getPermissionsViaRoles();
    }

    /**
     * Checa se o usuário possui a role.
     *
     * @param string $role
     * @param null   $userId
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
     * Envia uma notificação de redefinição de senha.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, $this->email_address));
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Checa se o usuário possui a permission.
     *
     * @param      $permission
     * @param null $userId
     *
     * @return mixed
     */
    public static function hasThisPermission($permission, $userId = null)
    {
        if (!empty($userId)) {
            $user = User::with([])->find($userId);

            return $user->hasPermissionTo($permission);
        }

        return Auth::user()->hasPermissionTo($permission);
    }

    /**
     * Checa se o usuário possui a permission.
     *
     * @param      $permission
     * @param null $userId
     *
     * @return mixed
     */
    public static function hasThisDirectPermission($permission, $userId = null)
    {
        if (!empty($userId)) {
            $user = User::with([])->find($userId);

            return $user->hasDirectPermission($permission);
        }

        return Auth::user()->hasDirectPermission($permission);
    }

    public static function roleHasPermission($permission, $roleId)
    {
        return Role::with([])->find($roleId)->hasPermissionTo($permission);
    }

    public function scopeCompany($query)
    {
        return $query->where('company_id', '=', auth()->user()->company_id);
    }


    public function scopeActive($query)
    {
        return $query->where('is_active', '=', 1);
    }

}

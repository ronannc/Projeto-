<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    const ADMIN = 'admin';
    const CLIENTE = 'cliente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function isAdmin()
    {
        return Auth::check() && Auth::user()->hasRole(self::ADMIN);
    }

    public static function isCliente()
    {
        return Auth::check() && Auth::user()->hasRole(self::CLIENTE);
    }
}

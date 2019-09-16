<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class Authenticate
 *
 * @package App\Http\Middleware
 */
class InvalidateIfBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->is_active) {
            return $next($request);
        } else {

            Auth::logout();

            session()->flash('error', 'Você não tem mais acesso ao sistema. Entre em contato com o administrador.');

            return redirect()->guest('login');
        }
    }
}

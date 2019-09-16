<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Throwable;

/**
 * Class Admin
 *
 * @package App\Http\Middleware
 */
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     *
     * @throws Throwable
     */
    public function handle($request, Closure $next)
    {
        if (User::hasThisRole(User::ADMIN)) {
            return $next($request);
        }

        return redirect(route('home'));
    }
}

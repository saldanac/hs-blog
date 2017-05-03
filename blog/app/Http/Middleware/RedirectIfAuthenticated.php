<?php

namespace prueba_laravel\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use Laracast\Flash\Flash;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            flash('Bienvenido nuevamente!', 'success');

            return redirect('/home');
        }

        return $next($request);
    }
}

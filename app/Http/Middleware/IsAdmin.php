<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //tambahin Auth, apakah auth admin / auth users
        $user = Auth::user()->roles;
        if (Auth::user() && Auth::user()->roles == "ADMIN") {
            return $next($request);
        }

        return redirect('/');
        // return redirect()->route('home');

    }
}

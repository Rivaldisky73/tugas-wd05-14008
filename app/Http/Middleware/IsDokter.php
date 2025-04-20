<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsDokter
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'dokter') {
            return $next($request);
        }

        return redirect('/');  // Redirect users who do not match to the home page
    }
}

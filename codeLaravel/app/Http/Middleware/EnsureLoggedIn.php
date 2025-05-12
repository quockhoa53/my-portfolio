<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureLoggedIn
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('logged_in')) {
            return redirect('/login');
        }

        return $next($request);
    }
}

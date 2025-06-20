<?php

namespace App\Http\Middleware;
use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user && $user->role === 1) {
            return $next($request);
        }
        return redirect('/');
    }
}
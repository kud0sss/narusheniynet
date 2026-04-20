<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->role_id == 2) {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'У вас нет прав администратора для доступа к этой странице');
    }
}
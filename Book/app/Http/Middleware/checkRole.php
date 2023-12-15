<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (auth()->check() && auth()->user()->role == 'admin') {
            return $next($request);
        } 
        elseif (auth()->check() && auth()->user()->role == 'user') {
            return $next($request);
        }
        elseif (auth()->check() && auth()->user()->role != 'admin' ||auth()->user()->role != 'user') {
            auth()->logout();
            return redirect('/login');
        }
         else {
            return redirect('/login');
        }
    }
}
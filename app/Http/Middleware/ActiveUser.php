<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Closure;

class ActiveUser
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->blocked_at) 
        {
            $user = auth()->user();
            auth()->logout();
            return redirect()->route('login')->with('error', 'Votre compte a été bloqué à ' . date('d/m/Y à H:i', strtotime($user->blocked_at)));
        }

        return $next($request);
    }
}
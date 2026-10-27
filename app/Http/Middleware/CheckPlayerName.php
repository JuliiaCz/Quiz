<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPlayerName
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('player_name')) {
            return redirect('/');
        }

        return $next($request);
    }
}

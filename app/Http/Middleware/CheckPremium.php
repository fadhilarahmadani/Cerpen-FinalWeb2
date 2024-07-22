<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPremium
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_premium) {
            return $next($request);
        }

        return redirect()->route('subscription.form')->with('error', 'You must be a premium member to access this content.');
    }
}
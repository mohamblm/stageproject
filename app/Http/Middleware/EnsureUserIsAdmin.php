<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // First ensure the user is authenticated and then check the role.
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('message', 'Access Denied. You are not an Admin');
        }
        return $next($request);
    }
    
}

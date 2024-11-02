<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;    // added---


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and is an admin (usertype == 1)
        if (Auth::check() && Auth::user()->usertype == '1') {
            return $next($request);
        }

        // If not an admin, redirect to a user route or an unauthorized page
        return redirect('/dashboard')->with('error', 'Access denied. You are not authorized to access this page.');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if both auth_token exists and role_id is 3
        if (!session()->has('auth_token') || session()->get('role_id') != 2) {
            // If either condition is not met, redirect to login with an error
            session()->flush();
            return redirect()->route('login')->withErrors(['error' => 'Please login with the correct permissions.']);
        }

        return $next($request); // Continue if both conditions are met
    }
}

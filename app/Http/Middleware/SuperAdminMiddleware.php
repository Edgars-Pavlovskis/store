<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the authenticated user has the 'superadmin' status
            if (Auth::user()->superadmin) {
                return $next($request);
            } else {
                // Redirect to a public route if not superadmin
                return redirect()->route('frontend-index-root'); // Replace 'public.route' with your public route name
            }
        }

        // If the user is not authenticated, redirect to the login page
        return redirect()->route('login');
    }
}

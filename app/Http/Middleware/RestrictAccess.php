<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RestrictAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $id = null)
    {
        // Get the currently authenticated user
        $currentUser = Auth::user();

        // Check if the requested user ID (from route parameter) matches the current user's ID
        if ($currentUser->id == $id) {
            return $next($request); // Allow access if authorized
        }

        // If not authorized, redirect or display an error message
        return redirect('/')->with('error', 'You are not authorized to view this profile');
    }
}

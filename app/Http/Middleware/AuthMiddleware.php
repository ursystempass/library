<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // Check if the user has 'admin' role
            if ($request->user()->role === 'admin') {
                // If the user is an 'admin', allow them to continue the request
                return $next($request);
            } elseif ($request->user()->role === 'member') {
                // If the user is a 'member', redirect them to member dashboard or some other page
                return redirect()->route('member.dashboard'); // You can adjust this route as needed
            }
        }
        
        // If the user is not logged in, redirect them to the login page
        return redirect()->route('login');
    }
}

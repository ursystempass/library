<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MemberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and has 'member' role
        if ($request->user() && $request->user()->role === 'member') {
            return $next($request);
        }

        // If not, redirect to unauthorized page or any other action
        return redirect()->route('login');
    }
}

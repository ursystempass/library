<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MemberMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // Check if the user has 'member' role
            if ($request->user()->role === 'member') {
                // Jika pengguna adalah "member", biarkan mereka melanjutkan permintaan
                return $next($request);
            } elseif ($request->user()->role === 'admin') {
                // Jika pengguna adalah "admin", alihkan mereka ke halaman dashboard admin
                return redirect()->route('admin.dashboard');
            }
        }
        
        // Jika pengguna belum login, arahkan mereka ke halaman login
        return redirect()->route('login');
    }
}

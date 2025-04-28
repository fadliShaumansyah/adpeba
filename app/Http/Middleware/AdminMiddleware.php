<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Cek apakah user yang login adalah admin
         if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman yang sesuai
        return redirect('/dashboard')->with('error', 'You are not authorized to access this page');
  
    }
}

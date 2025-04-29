<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roleString)
{
    if (!Auth::check()) {
        return redirect('/login');
    }

    $roles = explode(',', $roleString); // ✅ Ubah string jadi array

    if (in_array(Auth::user()->role, $roles)) {
        return $next($request);
    }

    abort(403, 'Unauthorized access.');
}
    
}

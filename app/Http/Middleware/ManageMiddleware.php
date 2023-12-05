<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $isManager = DB::table('user_role')
                ->join('role', 'user_role.role_id', '=', 'role.role_id')
                ->where('user_role.user_id', $user->user_id)
                ->where('role.role_name', 'manage')
                ->exists();
            if ($isManager) {
                return $next($request);
            }
        }
    
    return redirect()->route('403');
    }
}
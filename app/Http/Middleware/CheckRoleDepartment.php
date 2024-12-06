<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRoleDepartment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role, $department): Response
    {
        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user()->load('personal.tipoPersonal', 'personal.departamento');
            
            if ($user->personal && 
                $user->personal->tipoPersonal->tipoPersonal == $role && 
                $user->personal->departamento->departamento == $department) {
                return $next($request);
            }
        }

        if (Auth::guard('apoderados')->check()) {
            $user = Auth::guard('apoderados')->user()->load('personal.tipoPersonal', 'personal.departamento');
            
            if ($user->personal && 
                $user->personal->tipoPersonal->tipoPersonal == $role && 
                $user->personal->departamento->departamento == $department) {
                return $next($request);
            }
        }

        return redirect('/');
    }

}

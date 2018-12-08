<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (! auth()->check()) {
            session()->flash('message', 'You don\'t have permissions for this action');
            return redirect('/login');
        }
        if (!$request->user()->hasRole($role)) {
            session()->flash('message', 'You\'re dont have permissions for this');
            return redirect('/home');
        }
        if($permission !== null && !$request->user()->can($permission)) {
            session()->flash('message', 'You\'re dont have permissions for this');
            return redirect('/home');
        }
        return $next($request);
    }
}

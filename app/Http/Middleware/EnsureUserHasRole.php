<?php

namespace App\Http\Middleware;

use Closure;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,string $role)
    {
        if($request->user()->roles()->where('nom' , $role)->exists())  return $next($request);

        abort(403);
    }
}

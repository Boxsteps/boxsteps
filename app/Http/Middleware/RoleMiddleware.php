<?php

namespace App\Http\Middleware;

use Closure;
use App;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ( !( $request->user()->role->id == $role ) ) {
            App::abort(403);
        }

        return $next($request);
    }
}

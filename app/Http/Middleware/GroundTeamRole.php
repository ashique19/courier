<?php

namespace App\Http\Middleware;

use Closure;

class GroundTeamRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if( auth()->user()->role_id != 4 ) return redirect()->route('logout');

        return $next($request);
    }
}

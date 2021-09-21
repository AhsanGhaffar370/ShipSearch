<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Member_type_auth
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
        if($request->session()->get('member_type')=="Free"){
            return redirect()->route('login');
        }
        return $next($request);
    }
}

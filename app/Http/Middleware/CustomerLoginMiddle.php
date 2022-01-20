<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CustomerLoginMiddle
{
    protected $cus;

    public function __construct()
    {

    }

    public function handle($request, Closure $next, $guard = 'cus')
    {
        if(Auth::guard($guard)->check()){
            return $next($request);
        }
        return redirect()->route('home');
    }

}

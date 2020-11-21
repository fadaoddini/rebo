<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checkrole
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

        if (auth()->check() && auth()->user()->role=='2'){
            return redirect(route('index'));
        }elseif (auth()->check() && auth()->user()->role=='1'){
            return $next($request);
        }

        return redirect(route('login'));

    }
}

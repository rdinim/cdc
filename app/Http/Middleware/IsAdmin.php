<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        // jika user bukan admin
        if (Auth::user() &&  Auth::user()->approval_pengguna != 1) {
            return redirect(route('homepage'))->with('error','Anda tidak memiliki akses sebagai admin');
        }

        //jika user admin
        return $next($request);
       
    }
}

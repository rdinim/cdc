<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAlumni
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
        //jika user bukan alumni
        if (Auth::user() && Auth::user()->approval_pengguna != 100) {
            return redirect(route('homepage'))->with('error','Anda tidak memiliki akses sebagai alumni');

       }

       //jika user alumni
       return $next($request);
    }
}

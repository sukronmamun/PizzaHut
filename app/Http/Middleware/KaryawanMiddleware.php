<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class KaryawanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = 'karyawan')
    {
      // if (Auth::guard($guard)->check()) {
      //     return redirect('karyawan/home');
      //
      // }
    //
    //
    //
    //   return redirect('/karyawan/login');
    // }

    if (! auth()->check()) {
        if (($request->ajax() && ! $request->pjax()) || $request->wantsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        } else {
            return redirect()->guest('/karyawan/login');
        }
    }
    return redirect('/karyawan/home');
}

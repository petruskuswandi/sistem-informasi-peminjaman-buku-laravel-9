<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna terotentikasi
        if (Auth::check() && Auth::user()->role_id != 1) {
            return redirect('/');
        }

        // Jika pengguna terotentikasi dan memiliki role_id == 1, lanjutkan dengan request selanjutnya
        return $next($request);
    }
}

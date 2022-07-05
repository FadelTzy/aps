<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Profillsp;

class lspMenu
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
        $value = Cache::remember('tl', 60, function () {
            return Profillsp::select('id', 'nama', 'facebook', 'ig', 'twitter', 'wa', 'lokasi', 'no', 'alamat', 'email', 'linkregister')->get();
        });

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\Berita;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Profillsp;
use App\Models\kategoriP;
use App\Models\konsultasi;
use App\Models\Link;
use App\Models\Sertifikasi;
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
        $vp = Cache::remember('mp', 60, function () {
            return kategoriP::get();
        });
        Cache::remember('kl', 60, function () {
            return konsultasi::select('judul','slug','id')->get();
        });
        Cache::remember('sr', 60, function () {
            return Sertifikasi::select('judul','slug','id')->get();
        });
        Cache::remember('edok', 60, function () {
            return Link::select('judul','meta','id')->get();
        });
        Cache::remember('bp', 60, function () {
            return Berita::select('judul','tanggal','gambar','id')->get();
        });
        return $next($request);
    }
}

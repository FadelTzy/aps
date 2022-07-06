<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\wv;
use App\Http\Controllers\adminController;

use App\Http\Controllers\ProfillspController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\TUKController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PukController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\UnitKompetensiController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\vi;

use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\KategoriPController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::post('/save-image', [BeritaController::class, 'image'])->name('ckeditor.image');

    Route::prefix('admin')->group(function () {
          //pelatihan
          Route::get('pelatihan', [PelatihanController::class, 'index'])->name('pelatihan.index');
          Route::get('pelatihan/new-post', [PelatihanController::class, 'create'])->name('pelatihan.create');
          Route::get('pelatihan/show/{id}', [PelatihanController::class, 'show'])->name('pelatihan.show');
          Route::delete('pelatihan/{id}', [PelatihanController::class, 'destroy']);
          Route::post('pelatihan', [PelatihanController::class, 'store'])->name('pelatihan.store');
          Route::post('pelatihan/edit/{id}', [PelatihanController::class, 'edit'])->name('pelatihan.edit');
          Route::post('pelatihan/gambar', [PelatihanController::class, 'gambar']);
          //konsultasu
          Route::get('konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi.index');
          Route::get('konsultasi/new-post', [KonsultasiController::class, 'create'])->name('konsultasi.create');
          Route::get('konsultasi/show/{id}', [KonsultasiController::class, 'show'])->name('konsultasi.show');
          Route::delete('konsultasi/{id}', [KonsultasiController::class, 'destroy']);
          Route::post('konsultasi', [KonsultasiController::class, 'store'])->name('konsultasi.store');
          Route::post('konsultasi/edit/{id}', [KonsultasiController::class, 'edit'])->name('konsultasi.edit');
          Route::post('konsultasi/gambar', [KonsultasiController::class, 'gambar']);
        Route::get('dashboard', [adminController::class, 'index'])->name('dashboard.admin');
        Route::get('profil', [adminController::class, 'show'])->name('admin.show');
        Route::post('profil', [adminController::class, 'store'])->name('admin.store');

        //user
        Route::get('user', [adminController::class, 'uindex'])->name('user.index');
        Route::post('user', [adminController::class, 'ustore'])->name('user.store');
        Route::post('user/edit', [adminController::class, 'uedit'])->name('user.edit');
        Route::delete('user/{id}', [adminController::class, 'udestroy']);

        Route::resource('profil-lsp', ProfillspController::class);
        Route::post('profil-lsp/kontak', [ProfillspController::class, 'storek'])->name('profil-lsp.storek');
        Route::post('profil-lsp/beranda', [ProfillspController::class, 'storeb'])->name('profil-lsp.storeb');
        Route::post('profil-lsp/link', [ProfillspController::class, 'storel'])->name('profil-lsp.storel');

        Route::resource('anggota-lsp', AnggotaController::class);
        Route::post('anggota-lsp/storeu', [AnggotaController::class, 'storeu'])->name('anggota-lsp.storeu');
        //kategori
        Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::post('kategori', [KategoriController::class, 'store'])->name('kategori.store');
        Route::post('kategori/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::delete('kategori/{id}', [KategoriController::class, 'destroy']);
          //kategori
          Route::get('kategori-pelayanan', [KategoriPController::class, 'index'])->name('kategorip.index');
          Route::post('kategori-pelayanan', [KategoriPController::class, 'store'])->name('kategorip.store');
          Route::post('kategori-pelayanan/edit', [KategoriPController::class, 'edit'])->name('kategorip.edit');
          Route::delete('kategori-pelayanan/{id}', [KategoriPController::class, 'destroy']);
        //berita
        Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');
        Route::get('berita/new-post', [BeritaController::class, 'create'])->name('berita.create');
        Route::get('berita/show/{id}', [BeritaController::class, 'show'])->name('berita.show');
        Route::delete('berita/{id}', [BeritaController::class, 'destroy']);
        Route::post('berita', [BeritaController::class, 'store'])->name('berita.store');
        Route::post('berita/edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::post('berita/gambar', [BeritaController::class, 'gambar']);

        //TUK
        Route::get('tuk', [TUKController::class, 'index'])->name('tuk.index');
        Route::post('tuk', [TUKController::class, 'store'])->name('tuk.store');
        Route::post('tuk/gambar', [TUKController::class, 'gambar']);
        Route::post('tuk/edit', [TUKController::class, 'edit']);
        Route::delete('tuk/{id}', [TUKController::class, 'destroy']);

        //Agenda
        Route::get('agenda', [AgendaController::class, 'index'])->name('agenda.index');
        Route::post('agenda', [AgendaController::class, 'store'])->name('agenda.store');
        Route::post('agenda/edit', [AgendaController::class, 'edit'])->name('agenda.edit');
        Route::delete('agenda/{id}', [AgendaController::class, 'destroy']);
        //Link
        Route::get('link', [LinkController::class, 'index'])->name('link.index');
        Route::post('link', [LinkController::class, 'store'])->name('link.store');
        Route::post('link/edit', [LinkController::class, 'edit'])->name('link.edit');
        Route::delete('link/{id}', [LinkController::class, 'destroy']);
        Route::post('link/gambar', [LinkController::class, 'gambar']);
        //Puk
        Route::get('prosedur-uji-kompetensi', [PukController::class, 'index'])->name('puk.index');
        Route::post('prosedur-uji-kompetensi', [PukController::class, 'store'])->name('puk.store');
        Route::post('prosedur-uji-kompetensi/edit', [PukController::class, 'edit'])->name('puk.edit');
        Route::delete('prosedur-uji-kompetensi/{id}', [PukController::class, 'destroy']);
        //skema
        Route::get('skema', [SkemaController::class, 'index'])->name('skema.index');
        Route::get('skema/new-post', [SkemaController::class, 'create'])->name('skema.create');
        Route::get('skema/show/{id}', [SkemaController::class, 'show'])->name('skema.show');
        Route::delete('skema/{id}', [SkemaController::class, 'destroy']);
        Route::post('skema', [SkemaController::class, 'store'])->name('skema.store');
        Route::post('skema/edit/{id}', [SkemaController::class, 'edit'])->name('skema.edit');
        Route::post('skema/gambar', [SkemaController::class, 'gambar']);
        //Unit
        Route::get('unit', [UnitKompetensiController::class, 'index'])->name('unit.index');
        Route::post('unit', [UnitKompetensiController::class, 'store'])->name('unit.store');
        Route::post('unit/edit', [UnitKompetensiController::class, 'edit'])->name('unit.edit');
        Route::delete('unit/{id}', [UnitKompetensiController::class, 'destroy']);
        //banner
        Route::get('banner', [BannerController::class, 'index'])->name('banner.index');
        Route::post('banner', [BannerController::class, 'store'])->name('banner.store');
        Route::post('banner/gambar', [BannerController::class, 'gambar']);
        Route::post('banner/edit', [BannerController::class, 'edit']);
        Route::delete('banner/{id}', [BannerController::class, 'destroy']);
    });
});
Route::group(['middleware' => ['lspMenu']], function () {
    //indiro
    Route::get('/', [vi::class, 'beranda'])->name('iberanda');
    Route::get('/kontak', [vi::class, 'kontak'])->name('kontak');
    Route::get('/berita', [vi::class, 'berita'])->name('iberita');
    Route::get('/berita/{slug}', [vi::class, 'beritaslug']);


    // Route::get('/', [wv::class, 'index'])->name('beranda');
    // Route::get('/kontak', [wv::class, 'kontak'])->name('kontak');
    // Route::get('/berita', [wv::class, 'berita'])->name('berita');
    Route::get('/skema', [wv::class, 'skema'])->name('skema');
    Route::get('/profil', [wv::class, 'profil'])->name('profil');
    Route::get('/skema/{skema}', [wv::class, 'skemaslug']);
    Route::get('/faq', [wv::class, 'faq'])->name('faq');
    // Route::get('/berita/{slug}', [wv::class, 'beritaslug']);
    Route::get('/pengumuman', [wv::class, 'pengumuman']);
    Route::get('/agenda', [wv::class, 'agenda']);
    Route::get('/agenda/{slug}', [wv::class, 'agendaslug']);
    Route::get('/prosedur-uji-kompetensi', [wv::class, 'puk']);
    Route::get('/tuk', [wv::class, 'tuk'])->name('tuk');
    Route::get('/formulir', [wv::class, 'formulir']);
    Route::get('/skkni', [wv::class, 'skkni']);
});



Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
require __DIR__ . '/auth.php';

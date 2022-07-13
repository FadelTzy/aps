<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\wv;
use App\Http\Controllers\adminController;

use App\Http\Controllers\ProfillspController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\vi;
use App\Http\Controllers\SertifikasiController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\InstrukturController;
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
          //mitra
          Route::get('mitra', [InstrukturController::class, 'indexm'])->name('mitra.index');
          Route::post('mitra', [InstrukturController::class, 'storem'])->name('mitra.store');
          Route::post('mitra/edit', [InstrukturController::class, 'editm'])->name('mitra.edit');
          Route::delete('mitra/{id}', [InstrukturController::class, 'destroym']);
             //client
          Route::get('client-list', [InstrukturController::class, 'indexc'])->name('clientlist.index');
          Route::post('client-list', [InstrukturController::class, 'storec'])->name('clientlist.store');
          Route::post('client-list/edit', [InstrukturController::class, 'editc'])->name('clientlist.edit');
          Route::delete('client-list/{id}', [InstrukturController::class, 'destroyc']);
             //instruktur
             Route::get('instruktur', [InstrukturController::class, 'indexi'])->name('instruktur.index');
             Route::post('instruktur', [InstrukturController::class, 'storei'])->name('instruktur.store');
             Route::post('instruktur/edit', [InstrukturController::class, 'editi'])->name('instruktur.edit');
             Route::delete('instruktur/{id}', [InstrukturController::class, 'destroyi']);
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
          //sertifikasi
          Route::get('sertifikasi', [sertifikasiController::class, 'index'])->name('sertifikasi.index');
          Route::get('sertifikasi/new-post', [sertifikasiController::class, 'create'])->name('sertifikasi.create');
          Route::get('sertifikasi/show/{id}', [sertifikasiController::class, 'show'])->name('sertifikasi.show');
          Route::delete('sertifikasi/{id}', [sertifikasiController::class, 'destroy']);
          Route::post('sertifikasi', [sertifikasiController::class, 'store'])->name('sertifikasi.store');
          Route::post('sertifikasi/edit/{id}', [sertifikasiController::class, 'edit'])->name('sertifikasi.edit');
          Route::post('sertifikasi/gambar', [sertifikasiController::class, 'gambar']);
        Route::get('dashboard', [adminController::class, 'index'])->name('dashboard.admin');
        Route::get('profil', [adminController::class, 'show'])->name('admin.show');
        Route::post('profil', [adminController::class, 'store'])->name('admin.store');

        //user
        Route::get('user', [adminController::class, 'uindex'])->name('user.index');
        Route::post('user', [adminController::class, 'ustore'])->name('user.store');
        Route::post('user/edit', [adminController::class, 'uedit'])->name('user.edit');
        Route::delete('user/{id}', [adminController::class, 'udestroy']);

        Route::resource('profil-aps', ProfillspController::class);
        Route::post('profil-aps/kontak', [ProfillspController::class, 'storek'])->name('profil-aps.storek');
        Route::post('profil-aps/beranda', [ProfillspController::class, 'storeb'])->name('profil-aps.storeb');
        Route::post('profil-aps/link', [ProfillspController::class, 'storel'])->name('profil-aps.storel');

        Route::resource('anggota-aps', AnggotaController::class);
        Route::post('anggota-aps/storeu', [AnggotaController::class, 'storeu'])->name('anggota-aps.storeu');
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
           //kategori i
           Route::get('kategori-konsultasi', [KategoriPController::class, 'indexi'])->name('kategorii.index');
           Route::post('kategori-konsultasi', [KategoriPController::class, 'storei'])->name('kategorii.store');
           Route::post('kategori-konsultasi/edit', [KategoriPController::class, 'editi'])->name('kategorii.edit');
        //berita
        Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');
        Route::get('berita/new-post', [BeritaController::class, 'create'])->name('berita.create');
        Route::get('berita/show/{id}', [BeritaController::class, 'show'])->name('berita.show');
        Route::delete('berita/{id}', [BeritaController::class, 'destroy']);
        Route::post('berita', [BeritaController::class, 'store'])->name('berita.store');
        Route::post('berita/edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::post('berita/gambar', [BeritaController::class, 'gambar']);

    

            //client
            Route::get('client', [clientController::class, 'index'])->name('client.index');
            Route::post('client', [clientController::class, 'store'])->name('client.store');
            Route::post('client/gambar', [clientController::class, 'gambar']);
            Route::post('client/edit', [clientController::class, 'edit']);
            Route::delete('client/{id}', [clientController::class, 'destroy']);
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
    Route::get('/pelatihan', [vi::class, 'pelatihan'])->name('pelatihan');
    Route::get('/pelatihan/{slug}', [vi::class, 'pelatihanslug']);
    Route::get('/konsultasi', [vi::class, 'konsultasi'])->name('konsultasi');
    Route::get('/konsultasi/{slug}', [vi::class, 'konsultasislug']);
    Route::get('/sertifikasi', [vi::class, 'sertifikasi'])->name('sertifikasi');
    Route::get('/sertifikasi/{slug}', [vi::class, 'sertifikasislug']);
    Route::get('/profil', [vi::class, 'profil'])->name('profil');
    Route::get('/visi-misi', [vi::class, 'vm'])->name('vm');
    Route::get('/ruang-lingkup', [vi::class, 'rl'])->name('rl');
    Route::get('/landasan-hukum', [vi::class, 'lh'])->name('lh');
    Route::get('/legalitas', [vi::class, 'legalitas'])->name('legalitas');
    Route::get('/tenaga-ahli', [vi::class, 'ta'])->name('ta');
    Route::get('/mitra-kerja', [vi::class, 'mk'])->name('mk');
    Route::get('/client-aps', [vi::class, 'ca'])->name('ca');

    Route::get('/struktur-organisasi', [vi::class, 'so'])->name('so');

    // Route::get('/', [wv::class, 'index'])->name('beranda');
    // Route::get('/kontak', [wv::class, 'kontak'])->name('kontak');
    // Route::get('/berita', [wv::class, 'berita'])->name('berita');
    Route::get('/skema', [wv::class, 'skema'])->name('skema');
    // Route::get('/profil', [wv::class, 'profil'])->name('profil');
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

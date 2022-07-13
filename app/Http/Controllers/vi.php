<?php

namespace App\Http\Controllers;
use App\Models\Sertifikasi;
use App\Models\Profillsp;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Str;
use App\Models\Banner;
use App\Models\kategoriP;
use App\Models\pelatihan;
use App\Models\konsultasi;
use App\Models\Instruktur;
use App\Models\Anggota;
use App\Models\client;
use App\Models\Tentang;

class vi extends Controller

{
    public function beritaslug($slug)
    {
        $kategori = Kategori::get();
        $data = Berita::with(['kategori' => function ($query) {
            $query->select('id', 'nama');
        }])->select('id', 'slug', 'judul', 'deskripsi', 'meta', 'id_kategori', 'status', 'gambar', 'tanggal')->where('slug', $slug)->where('status', 1)->first();
        $isi = Str::words($data->deskripsi, 25, ' ...');
        $replaced = Str::replace(' ', '', $data->meta);
        $bt = Berita::with(['kategori' => function ($query) {
            $query->select('id', 'nama');
        }])->select('id', 'slug', 'judul', 'status', 'gambar', 'tanggal')->where('slug', '!=', $slug)->where('status', 1)->take(3)->latest()->get();
        $previous = Berita::where('id', '<', $data->id)->select('judul', 'slug', 'id')->orderBy('id', 'desc')->first();
        $next = Berita::where('id', '>', $data->id)->select('judul', 'slug', 'id')->orderBy('id', 'asc')->first();
        SEOTools::setTitle($data->judul, false);
        SEOTools::setDescription($isi);
        SEOMeta::addKeyword([$replaced]);
        SEOMeta::addMeta('article:section', $data->judul, 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/berita/');
        SEOTools::setCanonical('https://lsppphi.com/berita/');

        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);

        return view('aps.detail', compact('data', 'bt', 'kategori', 'previous', 'next'));
    }
    public function berita()
    {
        $berita = Berita::with(['kategori' => function ($query) {
            $query->select('id', 'nama');
        }])->select('id', 'slug', 'judul', 'id_kategori', 'status', 'meta', 'gambar', 'tanggal')->where('status', 1)->latest()->where(function ($query) {
            if (request()->input('cari') != '') {
                $query->where('judul', 'LIKE', '%' . request()->input('cari') . '%')->orWhere('tanggal', 'LIKE', '%' . request()->input('cari') . '%')->orWhere('meta', 'LIKE', '%' . request()->input('cari') . '%');
            }
            if (request()->input('m') != '') {
                $query->where('meta', 'LIKE', '%' . request()->input('m')  . '%');
            }
            if (request()->input('kategori') != '') {
                $query->where('id_kategori', 'LIKE', '%' . request()->input('kategori')  . '%');
            }
        })->paginate(9);
        $berita->appends(request()->all());
        $kategori = Kategori::get();
        SEOTools::setTitle('Berita - APS', false);
        SEOTools::setDescription('Berita APS Makassar Terbaru');
        SEOMeta::addKeyword(['Berita APS', 'Sertifikasi Halal Makassar', 'APS terbaik, Lembaga Sertifikasi Halal', 'Lembaga Sertifikasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Berita APS', 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/berita');
        SEOTools::setCanonical('https://lsppphi.com/berita');

        OpenGraph::setUrl('https://lsppphi.com/berita');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.berita', compact('berita', 'kategori'));
    }
    public function pelatihanslug($slug)
    {
        $kater = kategoriP::where('tipe',1)->get();
        $data = pelatihan::with('kategori')->where('slug', $slug)->where('status', 1)->first();
        $isi = Str::words($data->deskripsi, 25, ' ...');
        $replaced = Str::replace(' ', '', $data->meta);
        $bt = pelatihan::with('kategori')->where('slug', '!=', $slug)->where('status', 1)->take(2)->latest()->get();
        $previous = pelatihan::where('id', '<', $data->id)->select('judul', 'slug', 'id')->orderBy('id', 'desc')->first();
        $next = pelatihan::where('id', '>', $data->id)->select('judul', 'slug', 'id')->orderBy('id', 'asc')->first();
        SEOTools::setTitle($data->judul, false);
        SEOTools::setDescription($isi);
        SEOMeta::addKeyword([$replaced]);
        SEOMeta::addMeta('article:section', $data->judul, 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/pelatihan/' . $data->slug);
        SEOTools::setCanonical('https://lsppphi.com/pelatihan/' . $data->slug);

        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);

        return view('aps.pelatihandetail', compact('data', 'bt', 'kater', 'previous', 'next'));
    }
    public function pelatihan()
    {   
        $kater = kategoriP::where('tipe',1)->get();
        $berita = pelatihan::with('kategori')->where('status', 1)->latest()->where(function ($query) {
            if (request()->input('cari') != '') {
                $query->where('judul', 'LIKE', '%' . request()->input('cari') . '%')->orWhere('tanggal', 'LIKE', '%' . request()->input('cari') . '%')->orWhere('deskripsi', 'LIKE', '%' . request()->input('cari') . '%')->orWhere('keterangan', 'LIKE', '%' . request()->input('cari') . '%');
            }
        
            if (request()->input('kategori') != '') {
                $query->where('id_kategori', 'LIKE', '%' . request()->input('kategori')  . '%');
            }
        })->paginate(6);
        $berita->appends(request()->all());
        $kategori = Kategori::get();
        SEOTools::setTitle('Pelatihan - APS', false);
        SEOTools::setDescription('pelatihan APS Makassar Terbaru');
        SEOMeta::addKeyword(['pelatihan APS', 'Sertifikasi Halal Makassar', 'APS terbaik, Lembaga Sertifikasi Halal', 'Lembaga Sertifikasi di Makassar']);
        SEOMeta::addMeta('article:section', 'pelatihan APS', 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/pelatihan');
        SEOTools::setCanonical('https://lsppphi.com/pelatihan');

        OpenGraph::setUrl('https://lsppphi.com/pelatihan');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.pelatihan', compact('berita', 'kategori','kater'));
    }
    public function konsultasislug($slug)
    {
        $data = konsultasi::where('slug', $slug)->where('status', 1)->first();
        $bt = konsultasi::where('slug', '!=', $slug)->where('status', 1)->take(2)->latest()->get();

        SEOTools::setTitle($data->judul, false);
        SEOTools::setDescription($data->deskripsi);
        SEOMeta::addKeyword($data->keterangan);
        SEOMeta::addMeta('article:section', $data->judul, 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/konsultasi/' . $data->slug);
        SEOTools::setCanonical('https://lsppphi.com/konsultasi/' . $data->slug);

        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);

        return view('aps.konsultasidetail', compact('data', 'bt'));
    }
    public function konsultasi()
    {   
        $berita = konsultasi::where('status', 1)->latest()->where(function ($query) {
            if (request()->input('cari') != '') {
                $query->where('judul', 'LIKE', '%' . request()->input('cari') . '%')->orWhere('tanggal', 'LIKE', '%' . request()->input('cari') . '%')->orWhere('deskripsi', 'LIKE', '%' . request()->input('cari') . '%')->orWhere('keterangan', 'LIKE', '%' . request()->input('cari') . '%');
            }
        
          
        })->paginate(6);
        $berita->appends(request()->all());
        SEOTools::setTitle('konsultasi - APS', false);
        SEOTools::setDescription('konsultasi APS Makassar Terbaru');
        SEOMeta::addKeyword(['konsultasi APS', 'Sertifikasi Halal Makassar', 'APS terbaik, Lembaga Sertifikasi Halal', 'Lembaga Sertifikasi di Makassar']);
        SEOMeta::addMeta('article:section', 'konsultasi APS', 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/konsultasi');
        SEOTools::setCanonical('https://lsppphi.com/konsultasi');

        OpenGraph::setUrl('https://lsppphi.com/konsultasi');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.konsultasi', compact('berita'));
    }
    public function sertifikasislug($slug)
    {
        $data = sertifikasi::where('slug', $slug)->where('status', 1)->first();
        $bt = sertifikasi::where('slug', '!=', $slug)->where('status', 1)->take(2)->latest()->get();

        SEOTools::setTitle($data->judul, false);
        SEOTools::setDescription($data->deskripsi);
        SEOMeta::addKeyword($data->keterangan);
        SEOMeta::addMeta('article:section', $data->judul, 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/sertifikasi/' . $data->slug);
        SEOTools::setCanonical('https://lsppphi.com/sertifikasi/' . $data->slug);

        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);

        return view('aps.sertifikasidetail', compact('data', 'bt'));
    }
    public function sertifikasi()
    {   
        $berita = sertifikasi::where('status', 1)->latest()->where(function ($query) {
            if (request()->input('cari') != '') {
                $query->where('judul', 'LIKE', '%' . request()->input('cari') . '%')->orWhere('tanggal', 'LIKE', '%' . request()->input('cari') . '%')->orWhere('deskripsi', 'LIKE', '%' . request()->input('cari') . '%')->orWhere('keterangan', 'LIKE', '%' . request()->input('cari') . '%');
            }
        
          
        })->paginate(6);
        $berita->appends(request()->all());
        SEOTools::setTitle('sertifikasi - APS', false);
        SEOTools::setDescription('sertifikasi APS Makassar Terbaru');
        SEOMeta::addKeyword(['sertifikasi APS', 'Sertifikasi Halal Makassar', 'APS terbaik, Lembaga Sertifikasi Halal', 'Lembaga Sertifikasi di Makassar']);
        SEOMeta::addMeta('article:section', 'sertifikasi APS', 'property');
        SEOTools::opengraph()->setUrl('https://aps.com/sertifikasi');
        SEOTools::setCanonical('https://aps.com/sertifikasi');

        OpenGraph::setUrl('https://aps.com/sertifikasi');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.sertifikasi', compact('berita'));
    }
    public function beranda()
    {   $banner = Banner::get();
        $data = Profillsp::first();
        $pelatihan = pelatihan::where('status',1)->take(3)->get();
        $tp = pelatihan::count();
        $konsultasi = konsultasi::where('status',1)->take(3)->get();
        $mitra = Instruktur::where('tipe',1)->get();
        $client = Instruktur::where('tipe',3)->get();

        $testi = client::get();
        $te = Tentang::first();
        SEOTools::setTitle('Beranda APS', false);
        SEOTools::setDescription("Beranda" . $data->nama);
        SEOMeta::addKeyword([$data->nama, 'Profil' . $data->nama, 'Pelatihan dan Konsultasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Kontak APS', 'property');
        SEOTools::setCanonical('https://aps.com/profil/');
        OpenGraph::setUrl('https://aps.com/profil/');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.beranda', compact('data','banner','client','tp','te','testi','konsultasi','mitra','pelatihan'));
    }
    public function profil()
    {   
        $data = Profillsp::first();
        SEOTools::setTitle('Profil APS', false);
        SEOTools::setDescription("Profil APS" . $data->tentang);
        SEOMeta::addKeyword([$data->tentang, 'Profil' . $data->tentang, 'Pelatihan dan Konsultasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Kontak APS', 'property');
        SEOTools::setCanonical('https://aps.com/profil/');
        OpenGraph::setUrl('https://aps.com/profil/');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.profil', compact('data'));
    }
    public function so()
    {   
        $data = Anggota::get();
        SEOTools::setTitle('Struktur Organisasi APS', false);
        SEOTools::setDescription("Struktur Organisasi APS");
        SEOMeta::addKeyword(['daftar anggota aps', 'Profil' .'struktur organisas', 'Pelatihan dan Konsultasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Struktur Organisasi APS', 'property');
        SEOTools::setCanonical('https://aps.com/struktur-organisasi/');
        OpenGraph::setUrl('https://aps.com/struktur-organisasi/');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.strukturorganisasi', compact('data'));
    }
    public function vm()
    {   
        $data = Profillsp::first();
        SEOTools::setTitle('Visi Misi APS', false);
        SEOTools::setDescription("Visi Misi APS" . $data->tentang);
        SEOMeta::addKeyword([$data->tentang, 'Profil' . $data->tentang, 'Pelatihan dan Konsultasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Visi Misi APS', 'property');
        SEOTools::setCanonical('https://aps.com/profil/');
        OpenGraph::setUrl('https://aps.com/profil/');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.visimisi', compact('data'));
    }
    public function lh()
    {  
        $data = Profillsp::first();
        SEOTools::setTitle('Landasan Hukum APS', false);
        SEOTools::setDescription("Landasan Hukum APS" . $data->tentang);
        SEOMeta::addKeyword([$data->tentang, 'Profil' . $data->tentang, 'Pelatihan dan Konsultasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Landasan Hukum APS', 'property');
        SEOTools::setCanonical('https://aps.com/landasan-hukum/');
        OpenGraph::setUrl('https://aps.com/landasan-hukum/');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.landasanhukum', compact('data'));
    }
    public function rl()
    {  
        $data = Profillsp::first();
        SEOTools::setTitle('Ruang Lingkup APS', false);
        SEOTools::setDescription("Ruang Lingkup APS" . $data->tentang);
        SEOMeta::addKeyword([$data->tentang, 'Profil' . $data->tentang, 'Pelatihan dan Konsultasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Ruang Lingkup APS', 'property');
        SEOTools::setCanonical('https://aps.com/ruang-lingkup/');
        OpenGraph::setUrl('https://aps.com/ruang-lingkup/');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.ruanglingkup', compact('data'));
    }
    public function legalitas()
    {  
        $data = Profillsp::first();
        SEOTools::setTitle('Legalitas APS', false);
        SEOTools::setDescription("Legalitas APS" . $data->tentang);
        SEOMeta::addKeyword([$data->tentang, 'Profil' . $data->tentang, 'Pelatihan dan Konsultasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Legalitas APS', 'property');
        SEOTools::setCanonical('https://aps.com/legalitas/');
        OpenGraph::setUrl('https://aps.com/legalitas/');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.legalitas', compact('data'));
    }
    public function ta()
    {  
        $data = Instruktur::where('tipe',2)->get();
        SEOTools::setTitle('Instruktur APS', false);
        SEOTools::setDescription("Daftar Tenaga Ahli / Instruktur PT. AHMAD PUTRA SEJAHTERA, Semua trainer/tenaga ahli telah memiliki sertifikat kompetensi dibidangnya masing-masing dari Badan Nasional Sertifikasi Profesi 
        (BNSP) atau lembaga otoritas kompeten lainnya.
        ");
        SEOMeta::addKeyword(['Tenaga Ahli','Instruktur','PT. AHMAD PUTRA SEJAHTERA']);
        SEOMeta::addMeta('article:section', 'Instruktur APS', 'property');
        SEOTools::setCanonical('https://aps.com/tenaga-ahli/');
        OpenGraph::setUrl('https://aps.com/tenaga-ahli/');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.tenaga', compact('data'));
    }
    public function mk()
    {  
        $data = Instruktur::where('tipe',1)->get();
        SEOTools::setTitle('Mitra Kerja APS', false);
        SEOTools::setDescription("Daftar Mitra Kerja PT. AHMAD PUTRA SEJAHTERA
        ");
        SEOMeta::addKeyword(['Relasi APS','Mitra Kerja','PT. AHMAD PUTRA SEJAHTERA']);
        SEOMeta::addMeta('article:section', 'Mitra Kerja APS', 'property');
        SEOTools::setCanonical('https://aps.com/mitra-kerja/');
        OpenGraph::setUrl('https://aps.com/mitra-kerja/');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.mitra', compact('data'));
    }
    public function ca()
    {  
        $data = Instruktur::where('tipe',3)->get();
        SEOTools::setTitle('Client APS', false);
        SEOTools::setDescription("Daftar Client PT. AHMAD PUTRA SEJAHTERA
        ");
        SEOMeta::addKeyword(['Relasi APS','Client','PT. AHMAD PUTRA SEJAHTERA']);
        SEOMeta::addMeta('article:section', 'Client APS', 'property');
        SEOTools::setCanonical('https://aps.com/mitra-kerja/');
        OpenGraph::setUrl('https://aps.com/mitra-kerja/');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.client', compact('data'));
    }
    public function kontak()
    {
        $data = Profillsp::first();
        SEOTools::setTitle('Kontak APS', false);
        SEOTools::setDescription("Kontak" . $data->nama);
        SEOMeta::addKeyword([$data->nama, 'Profil' . $data->nama, 'Pelatihan dan Konsultasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Kontak APS', 'property');
        SEOTools::setCanonical('https://aps.com/profil/');
        OpenGraph::setUrl('https://aps.com/profil/');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('aps.kontak', compact('data'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Str;
use App\Models\Berita;
use App\Models\Tentang;
use App\Models\Skema;
use App\Models\Profillsp;
use App\Models\Anggota;
use App\Models\Kategori;
use App\Models\TUK;
use App\Models\Agenda;
use App\Models\Link;
use App\Models\Puk;

class wv extends Controller
{
    public function index()
    {
        $link = Link::get();
        $tentang = Tentang::first();
        $berita = Berita::with(['kategori' => function ($query) {
            $query->select('id', 'nama');
        }])->select('id', 'slug', 'judul', 'id_kategori', 'gambar', 'tanggal')->take(3)->latest()->get();
        $skema = Skema::select('id', 'judul')->get();
        $isi = Str::words($tentang->isi, 25, ' ...');
        SEOTools::setTitle('Beranda - LSP PPHI', false);
        SEOTools::setDescription($isi);
        SEOMeta::addKeyword(['LSP PPHI', 'Link LSP', 'Sertifikasi Halal Makassar', 'LSP PPHI terbaik, Lembaga Sertifikasi Halal', 'Lembaga Sertifikasi di Makassar']);
        SEOMeta::addMeta('article:section', $tentang->judul, 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com');
        SEOTools::setCanonical('https://lsppphi.com');
        OpenGraph::setDescription($isi);
        OpenGraph::setTitle('Beranda - LSP PPHI');
        OpenGraph::setUrl('https://lsppphi.com');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('url', 'https://lsppphi.com');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('user.index', compact('tentang', 'berita', 'skema', 'link'));
    }
    public function kontak()
    {

        return view('user.kontak');
    }
    public function berita()
    {
        $berita = Berita::with(['kategori' => function ($query) {
            $query->select('id', 'nama');
        }])->select('id', 'slug', 'judul', 'id_kategori', 'status', 'meta', 'gambar', 'tanggal')->where('status', 1)->latest()->where(function ($query) {
            if (request()->input('q') != '') {
                $query->where('judul', 'LIKE', '%' . request()->input('q') . '%')->orWhere('tanggal', 'LIKE', '%' . request()->input('q') . '%')->orWhere('meta', 'LIKE', '%' . request()->input('q') . '%');
            }
            if (request()->input('m') != '') {
                $query->where('meta', 'LIKE', '%' . request()->input('m')  . '%');
            }
            if (request()->input('k') != '') {
                $query->where('id_kategori', 'LIKE', '%' . request()->input('k')  . '%');
            }
        })->paginate(9);
        $berita->appends(request()->all());
        $kategori = Kategori::get();
        SEOTools::setTitle('Berita - LSP PPHI', false);
        SEOTools::setDescription('Berita LSP PPHI Makassar Terbaru');
        SEOMeta::addKeyword(['Berita LSP PPHI', 'Sertifikasi Halal Makassar', 'LSP PPHI terbaik, Lembaga Sertifikasi Halal', 'Lembaga Sertifikasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Berita LS PPHI', 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/berita');
        SEOTools::setCanonical('https://lsppphi.com/berita');
        OpenGraph::setDescription('Daftar berita LSP PPHI');
        OpenGraph::setTitle('Berita - LSP PPHI');
        OpenGraph::setUrl('https://lsppphi.com/berita');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('user.berita', compact('berita', 'kategori'));
    }
    public function skema()
    {
        SEOTools::setTitle('Skema - LSP PPHI', false);
        SEOTools::setDescription('Daftar Skema LSP PPHI Makassar Terbaru');
        SEOMeta::addKeyword(['Daftar LSP PPHI', 'Sertifikasi Halal Makassar', 'LSP PPHI terbaik, Lembaga Sertifikasi Halal', 'Lembaga Sertifikasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Skema LS PPHI', 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/skema');
        SEOTools::setCanonical('https://lsppphi.com/skema');
        OpenGraph::setDescription('Daftar Skema LSP PPHI');
        OpenGraph::setTitle('Skema - LSP PPHI');
        OpenGraph::setUrl('https://lsppphi.com/skema');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        $skema = Skema::select('id', 'judul')->get();

        return view('user.skema', compact('skema'));
    }
    public function tuk()
    {
        $tuk = TUK::get();
        SEOTools::setTitle('TUK - LSP PPHI', false);
        SEOTools::setDescription('Daftar Skema LSP PPHI Makassar Terbaru');
        SEOMeta::addKeyword(['Daftar TUK LSP PPHI', 'Sertifikasi Halal Makassar', 'LSP PPHI terbaik, Lembaga Sertifikasi Halal', 'Lembaga Sertifikasi di Makassar', 'Tempat Uji Kompetensi']);
        SEOMeta::addMeta('article:section', 'Skema LS PPHI', 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/tuk');
        SEOTools::setCanonical('https://lsppphi.com/tuk');
        OpenGraph::setDescription('Daftar TUK LSP PPHI');
        OpenGraph::setTitle('TUK - LSP PPHI');
        OpenGraph::setUrl('https://lsppphi.com/tuk');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('user.tuk', compact('tuk'));
    }
    public function pengumuman()
    {
        $pk = Kategori::where('nama', 'pengumuman')->first();
        $berita = Berita::with(['kategori' => function ($query) {
            $query->select('id', 'nama');
        }])->select('id', 'slug', 'judul', 'id_kategori', 'status', 'meta', 'gambar', 'tanggal')->where('status', 1)->latest()->where(function ($query) use ($pk) {
            $query->where('id_kategori', $pk->id);
            if (request()->input('q') != '') {
                $query->where('judul', 'LIKE', '%' . request()->input('q') . '%')->orWhere('tanggal', 'LIKE', '%' . request()->input('q') . '%')->orWhere('meta', 'LIKE', '%' . request()->input('q') . '%');
            }
            if (request()->input('m') != '') {
                $query->where('meta', 'LIKE', '%' . request()->input('m')  . '%');
            }
        })->paginate(9);
        $berita->appends(request()->all());
        SEOTools::setTitle('Pengumuman - LSP PPHI', false);
        SEOTools::setDescription('Pengumuman LSP PPHI Makassar Terbaru');
        SEOMeta::addKeyword(['Pengumuman LSP PPHI', 'Sertifikasi Halal Makassar', 'LSP PPHI terbaik, Lembaga Sertifikasi Halal', 'Lembaga Sertifikasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Pengumuman LS PPHI', 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/pengumuman');
        SEOTools::setCanonical('https://lsppphi.com/pengumuman');
        OpenGraph::setDescription('Daftar Pengumuman LSP PPHI');
        OpenGraph::setTitle('Pengumuman - LSP PPHI');
        OpenGraph::setUrl('https://lsppphi.com/pengumuman');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('user.pengumuman', compact('berita'));
    }
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
        OpenGraph::setDescription($isi);
        OpenGraph::setTitle($data->judul);
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('user.beritaslug', compact('data', 'bt', 'kategori', 'previous', 'next'));
    }
    public function profil()
    {
        $anggota = Anggota::get();
        $profil = Profillsp::select('tentang', 'visi', 'misi', 'mutu')->first();
        SEOTools::setTitle('Profil LSP PPHI', false);
        SEOTools::setDescription($profil->tentang);
        SEOMeta::addKeyword(['Sertifikasi Halal Makassar', 'Profil LSP PPHI, Lembaga Sertifikasi Halal', 'Lembaga Sertifikasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Profil LSP PPHI', 'property');
        SEOMeta::addMeta('article:section', 'Anggota LSP PPHI', 'property');
        SEOTools::setCanonical('https://lsppphi.com/profil/');
        OpenGraph::setDescription('Daftar profil LSP PPHI');
        OpenGraph::setTitle('Profil LSP PPHI');
        OpenGraph::setUrl('https://lsppphi.com/profil/');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('user.profil', compact('profil', 'anggota'));
    }
    public function skemaslug(Skema $skema)
    {
        $isi = Str::words($skema->ringkasan, 25, ' ...');
        SEOTools::setTitle($skema->judul, false);
        SEOTools::setDescription($isi ?? $skema->judul);
        SEOMeta::addKeyword([$skema->judul, 'Sertifikasi Halal Makassar', 'LSP PPHI terbaik, Lembaga Sertifikasi Halal', 'Lembaga Sertifikasi di Makassar']);
        SEOMeta::addMeta('article:section', $skema->judul, 'property');
        SEOTools::setCanonical('https://lsppphi.com/skema/' . $skema->id);
        OpenGraph::setDescription('Daftar Skema LSP PPHI');
        OpenGraph::setTitle($skema->judul);
        OpenGraph::setUrl('https://lsppphi.com/skema/' . $skema->id);
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('user.skemaslug', compact('skema'));
    }
    public function puk()
    {
    }
    public function faq()
    {
        return view('user.faq');
    }
    public function agenda()
    {
        $berita = Agenda::select('tanggal', 'judul', 'lokasi', 'status', 'id', 'slug')->latest()->where(function ($query) {
            if (request()->input('q') != '') {
                $query->where('judul', 'LIKE', '%' . request()->input('q') . '%')->orWhere('tanggal', 'LIKE', '%' . request()->input('q') . '%')->orWhere('lokasi', 'LIKE', '%' . request()->input('q') . '%');
            }
        })->paginate(9);
        $berita->appends(request()->all());
        SEOTools::setTitle('Agenda - LSP PPHI', false);
        SEOTools::setDescription('Agenda LSP PPHI Makassar Terbaru');
        SEOMeta::addKeyword(['Agenda LSP PPHI', 'Sertifikasi Halal Makassar', 'LSP PPHI terbaik, Lembaga Sertifikasi Halal', 'Lembaga Sertifikasi di Makassar']);
        SEOMeta::addMeta('article:section', 'Agenda LS PPHI', 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/genda');
        SEOTools::setCanonical('https://lsppphi.com/genda');
        OpenGraph::setDescription('Daftar Agenda LSP PPHI');
        OpenGraph::setTitle('Agenda - LSP PPHI');
        OpenGraph::setUrl('https://lsppphi.com/agenda');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('user.agenda', compact('berita'));
    }
    public function agendaslug($id)
    {
        $data = Agenda::select('id', 'slug', 'judul', 'deskripsi', 'lokasi', 'status', 'tanggal')->where('id', $id)->first();
        $isi = Str::words($data->deskripsi, 25, ' ...');
        $bt = Berita::with(['kategori' => function ($query) {
            $query->select('id', 'nama');
        }])->select('id', 'slug', 'judul', 'status', 'gambar', 'tanggal')->take(3)->latest()->get();
        $previous = Agenda::where('id', '<', $data->id)->select('judul', 'slug', 'id')->orderBy('id', 'desc')->first();
        $next = Agenda::where('id', '>', $data->id)->select('judul', 'slug', 'id')->orderBy('id', 'asc')->first();
        SEOTools::setTitle($data->judul, false);
        SEOTools::setDescription($isi);
        SEOMeta::addKeyword(['Agenda LSP PPHI', $data->judul, $data->lokasi]);
        SEOMeta::addMeta('article:section', $data->judul, 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/agenda/' . '/' . $data->id);
        SEOTools::setCanonical('https://lsppphi.com/agenda/' . '/' . $data->id);
        OpenGraph::setDescription($isi);
        OpenGraph::setTitle($data->judul);
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('user.agendaslug', compact('data', 'bt', 'previous', 'next'));
    }
    public function formulir()
    {
        $kategori = Kategori::get();
        $bt = Berita::with(['kategori' => function ($query) {
            $query->select('id', 'nama');
        }])->select('id', 'slug', 'judul', 'status', 'gambar', 'tanggal')->where('status', 1)->take(3)->latest()->get();
        $skema = Skema::select('judul', 'slug', 'registrasi', 'id')->get();
        SEOTools::setTitle('Formulir Registrasi LSP PPHI', false);
        SEOTools::setDescription('Formulir Registrasi LSP PPHI');
        SEOMeta::addKeyword(['formulir registrasi', 'LSP PPHI']);
        SEOMeta::addMeta('article:section', 'Formulir Registrasi', 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/formulir/');
        SEOTools::setCanonical('https://lsppphi.com/formulir/');
        OpenGraph::setDescription('Formulir Registrasi LSP PPHI');
        OpenGraph::setTitle('Formulir Registrasi LSP PPHI');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);

        return view('user.formulir', compact('bt', 'kategori', 'skema'));
    }
    public function skkni()
    {
        $kategori = Kategori::get();
        $bt = Berita::with(['kategori' => function ($query) {
            $query->select('id', 'nama');
        }])->select('id', 'slug', 'judul', 'status', 'gambar', 'tanggal')->where('status', 1)->take(3)->latest()->get();
        SEOTools::setTitle('SKKNI Registrasi LSP PPHI', false);
        SEOTools::setDescription('SKKNI Registrasi LSP PPHI');
        SEOMeta::addKeyword(['SKNNI registrasi', 'LSP PPHI']);
        SEOMeta::addMeta('article:section', 'SKKNI Registrasi', 'property');
        SEOTools::opengraph()->setUrl('https://lsppphi.com/skkni/');
        SEOTools::setCanonical('https://lsppphi.com/skkni/');
        OpenGraph::setDescription('SKKNI Registrasi LSP PPHI');
        OpenGraph::setTitle('SKKNI Registrasi LSP PPHI');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::addProperty('locale', 'en-id');
        OpenGraph::addProperty('locale:alternate', ['en-us']);
        return view('user.skkni', compact('bt', 'kategori'));
    }
}

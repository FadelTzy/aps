<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profillsp;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Str;

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
    public function beranda()
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
        return view('aps.beranda', compact('data'));
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

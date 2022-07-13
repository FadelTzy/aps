<?php

namespace App\Http\Controllers;

use App\Models\Profillsp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Anggota;
use App\Models\Tentang;

class ProfillspController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profillsp::first();
        $anggota = Anggota::get();
        $tentang = Tentang::first();
        return view('admin.profillsp', compact('profil', 'anggota', 'tentang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['string', 'max:255'],
            'landasan_hukum' => ['string'],
            'ruang_lingkup' => ['string'],
            'legalitas' => ['string'],
            'tentang' => ['string'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        try {
            $user = Profillsp::where('id', 1)->update([
                'nama' => $request->nama,
                'tentang' => $request->tentang,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'landasan_hukun' => $request->landasan_hukum,
                'legalitas' => $request->legalitas,
                'ruang_lingkup' => $request->ruang_lingkup,
            ]);
            if ($user) {
                return 'success';
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function storek(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'alamat' => ['string', 'max:255'],

            'no' => ['string'], 'email' => ['string'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        try {
            $user = Profillsp::where('id', 1)->update([
                'alamat' => $request->alamat,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'wa' => $request->wa,
                'ig' => $request->ig,
                'email' => $request->email,
                'lokasi' => $request->lokasi,
                'no' => $request->no,

            ]);
            if ($user) {
                return 'success';
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function storeb(Request $request)
    {
        $data = Tentang::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'judul' => ['required', 'string', 'max:255'],
            'foto1' => ['mimes:jpeg,png,jpg|max:500'],
            'foto2' => ['mimes:jpeg,png,jpg|max:500'],
            'ttd' => ['mimes:jpeg,png,jpg|max:200'],


        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('foto1')) {
            $path = '/gambar/beranda/' . $data->foto1;
            $bases =  $_SERVER['DOCUMENT_ROOT'];
            if ($data->foto1 != null) {
                if (file_exists($bases . '/' . $path)) {
                    unlink($bases . '/' . $path);
                    $data->foto1 = null;
                } else {
                    return "gagal hapus foto";
                }
            }

            $gmbr = request()->file('foto1');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/beranda';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->foto1 = $nama_file ?? null;
        }
        if (request()->file('foto2')) {
            $path = '/gambar/beranda/' . $data->foto2;
            $bases =  $_SERVER['DOCUMENT_ROOT'];
            if ($data->foto2 != null) {
                if (file_exists($bases . '/' . $path)) {
                    unlink($bases . '/' . $path);
                    $data->foto2 = null;
                } else {
                    return "gagal hapus foto";
                }
            }

            $gmbr = request()->file('foto2');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/beranda';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->foto2 = $nama_file ?? null;
        }
        if (request()->file('ttd')) {
            $path = '/gambar/beranda/' . $data->ttd;
            $bases =  $_SERVER['DOCUMENT_ROOT'];
            if ($data->ttd != null) {
                if (file_exists($bases . '/' . $path)) {
                    unlink($bases . '/' . $path);
                    $data->ttd = null;
                } else {
                    return "gagal hapus foto";
                }
            }

            $gmbr = request()->file('ttd');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/beranda';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->ttd = $nama_file ?? null;
        }
        $data->nama = $request->nama;
        $data->judul = $request->judul;
        $data->isi = $request->isi;

        $data->save();

        return 'success';
    }
    public function storel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'link' => ['string', 'max:255'],

        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        try {
            $user = Profillsp::where('id', 1)->update([
                'linkregister' => $request->link,
            ]);
            if ($user) {
                return 'success';
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profillsp  $profillsp
     * @return \Illuminate\Http\Response
     */
    public function show(Profillsp $profillsp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profillsp  $profillsp
     * @return \Illuminate\Http\Response
     */
    public function edit(Profillsp $profillsp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profillsp  $profillsp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profillsp $profillsp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profillsp  $profillsp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profillsp $profillsp)
    {
        //
    }
}

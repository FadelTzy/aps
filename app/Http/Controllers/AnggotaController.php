<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['string', 'max:255'],
            'email' => ['email'],
            'file' => ['mimes:png,jpg,jpeg', 'max:600'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        if (request()->file('file')) {
            $file = request()->file('file');
            $filefile = str_replace(' ', '_', time() . "_" . $file->getClientOriginalName());
            $tujuan_upload = 'gambar/foto/';
            $file->move($tujuan_upload, $filefile);
        }

        $user = Anggota::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'email' => $request->email,
            'foto' => $filefile ?? null,
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function storeu(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['string', 'max:255'],
            'email' => ['email'],
            'file' => ['mimes:png,jpg,jpeg', 'max:600'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        if (request()->file('file')) {
            $file = request()->file('file');
            $filefile = str_replace(' ', '_', time() . "_" . $file->getClientOriginalName());
            $tujuan_upload = 'gambar/foto/';
            $file->move($tujuan_upload, $filefile);
            $user = Anggota::where('id', $request->id)->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'email' => $request->email,
                'foto' => $filefile ?? null,
            ]);
        } else {
            $user = Anggota::where('id', $request->id)->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'email' => $request->email,
            ]);
        }
        if ($user) {
            return 'success';
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Anggota::findOrFail($id);

        if ($res->foto != null) {
            $path = '/gambar/foto/' . $res->foto;
            if (file_exists(public_path() . $path)) {
                unlink(public_path() . $path);
            } else {
                return "gagal hapus file";
            }
        }
        if ($res) {
            $res->delete();
            return "success";
        }
        return "fail";
    }
}

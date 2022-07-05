<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puk;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PukController extends Controller
{
    public function destroy($id)
    {
        $data = Puk::findorfail($id);

        $data->delete();
        return 'success';
    }

    public function edit(Request $request)
    {
        $data = Puk::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'judul' => ['required', 'string', 'max:255'],
            'tanggal' => ['required'],
            'statusu' => ['required'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $date = Carbon::create($request->tanggal)->locale('id');
        $dn =  $date->isoFormat('dddd, D MMMM Y');

        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->lokasi = $request->lokasi;
        $data->status = $request->statusu;
        $data->slug = Str::slug($request->judul);

        $data->tanggal = $dn;
        $data->tgl = $request->tanggal;

        $data->save();

        return 'success';
    }
    public function index()
    {
        # code...
        $data = Puk::latest()->first();
        if ($data == null) {
            $data =  Puk::create([
                'judul' => 'Prosedur Uji Kompetensi',
                'text' => '...',
                'slug' => Str::slug('Prosedur Uji Kompetensi'),
            ]);
            $data = Puk::latest()->first();
        }
        return view('admin.Puk', compact('data'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data =  Puk::where('id', $request->id)->update([
            'judul' => $request->judul,
            'text' => $request->teks,
            'slug' => Str::slug($request->judul),
        ]);
        if ($data) {
            return 'success';
        }
    }
}

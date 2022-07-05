<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function destroy($id)
    {
        $data = Banner::findorfail($id);
        $path = 'gambar/banner/'  . $data->file;
        $bases =  $_SERVER['DOCUMENT_ROOT'];
        if ($data->file != null) {
            if (file_exists($bases . '/' . $path)) {
                unlink($bases . '/' . $path);
            } else {
                return "gagal hapus foto";
            }
        }
        $data->delete();
        return 'success';
    }
    public function gambar()
    {
        $data = Banner::where('id', request()->input('id'))->update([
            'gambar' => null,
        ]);
        $path = 'gambar/banner/'  . request()->input('file');
        $bases =  $_SERVER['DOCUMENT_ROOT'];

        if (file_exists($bases . '/' . $path)) {
            unlink($bases . '/' . $path);
            return 'success';
        } else {
            return "gagal hapus foto";
        }
    }
    public function edit(Request $request)
    {
        $data = Banner::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'urut' => ['required', 'integer', 'max:10'],
            'modelu' => ['required', 'integer', 'max:10'],
            'file' => ['mimes:jpeg,png,jpg|max:2000'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $path = '/gambar/banner/' . $data->file;
            $bases =  $_SERVER['DOCUMENT_ROOT'];
            if ($data->file != null) {
                if (file_exists($bases . '/' . $path)) {
                    unlink($bases . '/' . $path);
                    $data->file = null;
                } else {
                    return "gagal hapus foto";
                }
            }

            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/Banner';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->file = $nama_file ?? null;
        }
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->model = $request->modelu;
        $data->nama = $request->urut;
        $data->url = $request->url;
        $data->save();

        return 'success';
    }
    public function index()
    {
        # code...
        if (request()->ajax()) {
            return Datatables::of(Banner::get())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" . $dataj . ")'   class='btn btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
               
                </ul>";
                return $btn;
            })->addColumn('gambar', function ($data) {
                if ($data->file == null) {
                    $btn = '-';
                } else {
                    $btn = " <img src='" . asset('gambar/banner/') . '/' . $data->file . "' class='img-thumbnail mt-1' alt=''>";
                }

                return $btn;
            })->rawColumns(['aksi', 'gambar'])->make(true);
        }
        return view('admin.banner');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'urut' => ['required', 'integer', 'max:10'],
            'model' => ['required', 'integer', 'max:10'],
            'file' => ['required', 'mimes:jpeg,png,jpg|max:2000'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        if (request()->file('file')) {
            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/banner';
            $gmbr->move($tujuan_upload, $nama_file);
        }
        $data =  Banner::create([
            'file' => $nama_file ?? null,
            'nama' => $request->urut,
            'model' => $request->model,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'url' => $request->url,

        ]);
        if ($data) {
            return 'success';
        }
    }
}

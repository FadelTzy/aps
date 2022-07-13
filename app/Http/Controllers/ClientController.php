<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TUK;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\client;
class ClientController extends Controller
{
    public function destroy($id)
    {
        $data = client::findorfail($id);
        $path = 'gambar/client/'  . $data->gambar;
        $bases =  $_SERVER['DOCUMENT_ROOT'];
        if ($data->gambar != null) {
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
        $data = client::where('id', request()->input('id'))->update([
            'gambar' => null,
        ]);
        $path = 'gambar/client/'  . request()->input('file');
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
        $data = client::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:1000'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $path = '/gambar/client/' . $data->gambar;
            $bases =  $_SERVER['DOCUMENT_ROOT'];
            if ($data->gambar != null) {
                if (file_exists($bases . '/' . $path)) {
                    unlink($bases . '/' . $path);
                    $data->gambar = null;
                } else {
                    return "gagal hapus foto";
                }
            }

            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/client';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->gambar = $nama_file ?? null;
        }
        $data->nama = $request->nama;
        $data->pesan = $request->pesan;

        $data->save();

        return 'success';
    }
    public function index()
    {
        # code...
        if (request()->ajax()) {
            return Datatables::of(client::get())->addIndexColumn()->addColumn('aksi', function ($data) {
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
                if ($data->gambar == null) {
                    $btn = '-';
                } else {
                    $btn = " <img src='" . asset('gambar/client/') . '/' . $data->gambar . "' class='img-thumbnail mt-1' alt=''>";
                }

                return $btn;
            })->rawColumns(['aksi',  'gambar'])->make(true);
        }
        return view('admin.client');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:1000'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        if (request()->file('file')) {
            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/client';
            $gmbr->move($tujuan_upload, $nama_file);
        }
        $data =  client::create([
            'gambar' => $nama_file ?? null,
            'nama' => $request->nama,
            'pesan' => $request->pesan,
        ]);
        if ($data) {
            return 'success';
        }
    }
}

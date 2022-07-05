<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{
    public function gambar()
    {
        $data = Link::where('id', request()->input('id'))->update([
            'gambar' => null,
        ]);
        $path = 'gambar/link/'  . request()->input('file');
        $bases =  $_SERVER['DOCUMENT_ROOT'];

        if (file_exists($bases . '/' . $path)) {
            unlink($bases . '/' . $path);
            return 'success';
        } else {
            return "gagal hapus foto";
        }
    }
    public function destroy($id)
    {
        $data = Link::findorfail($id);
        $path = 'gambar/link/'  . $data->gambar;
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

    public function edit(Request $request)
    {
        $data = Link::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:1000'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        if (request()->file('file')) {
            $path = '/gambar/link/' . $data->gambar;
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
            $tujuan_upload = 'gambar/link';
            $gmbr->move($tujuan_upload, $nama_file);
            $data->gambar = $nama_file ?? null;
        }
        $data->judul = $request->nama;

        $data->meta = $request->link;

        $data->save();

        return 'success';
    }
    public function index()
    {
        # code...
        if (request()->ajax()) {
            return Datatables::of(Link::get())->addIndexColumn()->addColumn('aksi', function ($data) {
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
            })->addColumn('gambarx', function ($data) {
                if ($data->gambar == null) {
                    $btn = '-';
                } else {
                    $btn = " <img src='" . asset('gambar/link/') . '/' . $data->gambar . "' class='img-thumbnail mt-1' alt=''>";
                }

                return $btn;
            })->addColumn('tiklos', function ($data) {
                $btn = "<a class='badge badge-primary' target='_blank' href='" . $data->maps . "'>Lihat Lokasi</a>";
                return $btn;
            })->rawColumns(['aksi', 'gambarx'])->make(true);
        }
        return view('admin.link');
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
            $tujuan_upload = 'gambar/link';
            $gmbr->move($tujuan_upload, $nama_file);
        }
        $data =  Link::create([
            'gambar' => $nama_file ?? null,
            'meta' => $request->link,
            'judul' => $request->nama,
        ]);
        if ($data) {
            return 'success';
        }
    }
}

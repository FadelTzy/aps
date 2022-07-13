<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\kategoriP;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class KategoriPController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(kategoriP::where('tipe','1')->get())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" . $dataj . ")'   class='btn btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
               
                </ul>";
                return $btn;
            })->rawColumns(['aksi'])->make(true);
        }
        return view('admin.kategorip');
    }
    public function indexi()
    {
        if (request()->ajax()) {
            return Datatables::of(kategoriP::where('tipe','2')->get())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" . $dataj . ")'   class='btn btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
               
                </ul>";
                return $btn;
            })->rawColumns(['aksi'])->make(true);
        }
        return view('admin.kategorii');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $user = kategoriP::create([
            'judul' => $request->nama,
            'tipe' => $request->tipe,
            'slug' => Str::slug($request->nama, '-'),
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function storei(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $user = kategoriP::create([
            'judul' => $request->nama,
            'tipe' => $request->tipe,
            'slug' => Str::slug($request->nama, '-'),
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $user = kategoriP::where('id', $request->id)->update([
            'judul' => $request->nama,
            'slug' => Str::slug($request->nama, '-'),
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function editi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $user = kategoriP::where('id', $request->id)->update([
            'judul' => $request->nama,
            'slug' => Str::slug($request->nama, '-'),
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function destroy($id)
    {
        $res = kategoriP::findOrFail($id);


        if ($res) {
            $res->delete();
            return "success";
        }
        return "fail";
    }
    public function destroyi($id)
    {
        $res = kategoriP::findOrFail($id);


        if ($res) {
            $res->delete();
            return "success";
        }
        return "fail";
    }
}

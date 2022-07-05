<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(Kategori::get())->addIndexColumn()->addColumn('aksi', function ($data) {
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
        return view('admin.kategori');
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
        $user = Kategori::create([
            'nama' => $request->nama,
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
        $user = Kategori::where('id', $request->id)->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama, '-'),
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function destroy($id)
    {
        $res = Kategori::findOrFail($id);


        if ($res) {
            $res->delete();
            return "success";
        }
        return "fail";
    }
}

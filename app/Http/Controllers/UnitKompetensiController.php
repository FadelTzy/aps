<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitKompetensi;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class UnitKompetensiController extends Controller
{
    public function destroy($id)
    {
        $data = UnitKompetensi::findorfail($id);

        $data->delete();
        return 'success';
    }

    public function edit(Request $request)
    {
        $data = UnitKompetensi::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'kode' => ['required', 'string', 'max:255'],
            'unit' => ['required', 'string', 'max:255'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }


        $data->kd_unit = $request->kode;
        $data->judul = $request->unit;
        $data->save();

        return 'success';
    }
    public function index(Request $request)
    {
        # code...
        if (request()->ajax()) {
            return Datatables::of(UnitKompetensi::where('id_skema', $request->id)->get())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='updateuk(" . $dataj . ")'   class='btn btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel2(" . $data->id . ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
               
                </ul>";
                return $btn;
            })->rawColumns(['aksi'])->make(true);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => ['required', 'string', 'max:255'],
            'unit' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        $data =  UnitKompetensi::create([
            'id_skema' => $request->kd_skema,
            'kd_unit' => $request->kode,
            'judul' => $request->unit,
        ]);
        if ($data) {
            return 'success';
        }
    }
}

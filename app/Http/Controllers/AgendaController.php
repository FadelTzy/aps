<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AgendaController extends Controller
{
    public function destroy($id)
    {
        $data = Agenda::findorfail($id);

        $data->delete();
        return 'success';
    }

    public function edit(Request $request)
    {
        $data = Agenda::findorfail($request->id);
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
        if (request()->ajax()) {
            return Datatables::of(Agenda::get())->addIndexColumn()->addColumn('aksi', function ($data) {
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
            })->addColumn('tiklos', function ($data) {
                $btn = $data->status == 1 ? 'Daring' : 'Luring';
                $btn1 = $btn . ', ' . $data->lokasi;
                return $btn1;
            })->rawColumns(['aksi', 'tiklos'])->make(true);
        }
        return view('admin.agenda');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => ['required', 'string', 'max:255'],
            'tanggal' => ['required'],
            'status' => ['required'],

        ]);

        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $date = Carbon::create($request->tanggal)->locale('id');
        $dn =  $date->isoFormat('dddd, D MMMM Y');


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data =  Agenda::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'status' => $request->status,
            'slug' => Str::slug($request->judul),
            'tanggal' => $dn,
            'tgl' => $request->tanggal
        ]);
        if ($data) {
            return 'success';
        }
    }
}

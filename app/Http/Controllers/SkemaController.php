<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Skema;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class SkemaController extends Controller
{
    public function gambar()
    {
        $data = Skema::where('id', request()->input('id'))->update([
            'skkni' => null,
        ]);
        $path = 'gambar/skkni/'  . request()->input('file');
        $bases =  $_SERVER['DOCUMENT_ROOT'];

        if (file_exists($bases . '/' . $path)) {
            unlink($bases . '/' . $path);
            return 'success';
        } else {
            return "gagal hapus foto";
        }
    }
    public function index()
    {
        # code...
        if (request()->ajax()) {
            return Datatables::of(Skema::with('unit')->get())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);
                if ($data->unit == null) {
                    $total = 0;
                } else {
                    $total = $data->unit->count();
                }

                $btn = "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <a  onclick='uk(" . $dataj . ")' type='button'  class='btn btn-success btn-xs mb-1'>Unit Kompetensi (" . $total . ") </a>
                </li>
                <li class='list-inline-item'>
                <a href='" . url('admin/skema/show/') . '/' . $data->id . "' type='button'  class='btn btn-success btn-xs mb-1'>Edit</a>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
               
                </ul>";
                return $btn;
            })->addColumn('status_p', function ($data) {
                if ($data->status == 1) {
                    $html = '<span class="label label-success">Posted</span>
                    ';
                } else {
                    $html = '<span class="label label-warning">Pending</span>';
                }
                return $html;
            })->addColumn('register', function ($data) {
                if ($data->registrasi == null) {
                    $a = "-";
                } else {
                    $a = "<a type='button' href='" . $data->registrasi . "' class='btn btn-sm btn-default'> Link Regis </a>";
                }

                return $a;
            })->addColumn('fileskkni', function ($data) {
                if ($data->skkni == null) {
                    $a = "-";
                } else {
                    $a = "<a type='button' href='" . asset('gambar/skkni') . '/' . $data->skkni . "' class='btn btn-sm btn-default'> File SKKNI </a>";
                }
                return $a;
            })->rawColumns(['aksi', 'fileskkni', 'status_p', 'register'])->make(true);
        }
        return view('admin.skema');
    }
    public function create()
    {
        return view('admin.newskema');
    }
    public function show($id)
    {
        $data = Skema::findorfail($id);

        return view('admin.editskema', compact('data'));
    }
    public function edit(Request $request, $id)
    {
        $data = Skema::findorfail($id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'kode' => ['required', 'string', 'max:255'],
            'file' => ['max:3500'],
            'status' => ['required', 'string', 'max:255'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $path = '/gambar/skkni/' . $data->skkni;
            $bases =  $_SERVER['DOCUMENT_ROOT'];
            if ($data->skkni != null) {
                if (file_exists($bases . '/' . $path)) {
                    unlink($bases . '/' . $path);
                    $data->skkni = null;
                } else {
                    return "gagal hapus foto";
                }
            }

            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/skkni';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->skkni = $nama_file ?? null;
        }
        $data->judul = $request->nama;
        $data->registrasi = $request->link;
        $data->kd_skema = $request->kode;
        $data->meta = $request->nama;
        $data->slug = Str::slug($request->nama);
        $data->status =  $request->status;
        $data->syarat =  $request->syarat;
        $data->ringkasan =  $request->ringkasan;

        $data->save();

        return 'success';
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'kode' => ['required', 'string', 'max:255'],
            'file' => ['max:3500'],
            'status' => ['required', 'string', 'max:255'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/skkni';
            $gmbr->move($tujuan_upload, $nama_file);
        }

        $data =  Skema::create([
            'skkni' => $nama_file ?? null,
            'judul' => $request->nama,
            'kd_skema' => $request->kode,
            'registrasi' => $request->link,
            'meta' => $request->nama,
            'slug' => Str::slug($request->nama),
            'status' => $request->status,
            'ringkasan' => $request->ringkasan,
            'syarat' => $request->syarat,

        ]);
        if ($data) {
            return 'success';
        }
    }
    public function destroy($id)
    {
        $data = Skema::findorfail($id);
        $path = 'gambar/skkni/'  . $data->skkni;
        $bases =  $_SERVER['DOCUMENT_ROOT'];
        if ($data->skkni != null) {
            if (file_exists($bases . '/' . $path)) {
                unlink($bases . '/' . $path);
            } else {
                return "gagal hapus foto";
            }
        }
        $data->delete();
        return 'success';
    }
}

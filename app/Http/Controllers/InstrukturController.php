<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instruktur;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
class InstrukturController extends Controller
{
    public function indexm()
    {
        if (request()->ajax()) {
            return Datatables::of(Instruktur::where('tipe', '1')->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);

                    $btn =
                        "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
               
                </ul>";
                    return $btn;
                })
                ->addColumn('img', function ($data) {
                    $dataj = json_encode($data);

                    $btn =
                        "  <img src='" .
                        asset('gambar/mitra/') .
                        '/' .
                        $data->gambar .
                        "' style='width: 150px' class='img-thumbnail mt-1' >
                ";
                    return $btn;
                })
                ->rawColumns(['aksi', 'img'])
                ->make(true);
        }
        return view('admin.mitra');
    }
    public function indexc()
    {
        if (request()->ajax()) {
            return Datatables::of(Instruktur::where('tipe', '3')->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);

                    $btn =
                        "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
               
                </ul>";
                    return $btn;
                })
                ->addColumn('img', function ($data) {
                    $dataj = json_encode($data);

                    $btn =
                        "  <img src='" .
                        asset('gambar/clientlist/') .
                        '/' .
                        $data->gambar .
                        "' style='width: 150px' class='img-thumbnail mt-1' >
                ";
                    return $btn;
                })
                ->rawColumns(['aksi', 'img'])
                ->make(true);
        }
        return view('admin.clientlist');
    }
    public function indexi()
    {
        if (request()->ajax()) {
            return Datatables::of(Instruktur::where('tipe', '2')->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);

                    $btn =
                        "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-success btn-xs mb-1'>Edit</button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
               
                </ul>";
                    return $btn;
                })
                ->addColumn('img', function ($data) {
                    $dataj = json_encode($data);

                    $btn =
                        "  <img src='" .
                        asset('gambar/ins/') .
                        '/' .
                        $data->gambar .
                        "' style='width: 150px' class='img-thumbnail mt-1' >
                ";
                    return $btn;
                })
                ->rawColumns(['aksi', 'img'])
                ->make(true);
        }
        return view('admin.instruktur');
    }
    public function storem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:500'],
        ]);

        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . '_' . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/mitra';
            $gmbr->move($tujuan_upload, $nama_file);
        }

        $data = Instruktur::create([
            'gambar' => $nama_file ?? null,
            'nama' => $request->nama,
            'jabatan' => $request->link,

            'tipe' => 1,
        ]);
        if ($data) {
            return 'success';
        }
    }
    public function storec(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:500'],
        ]);

        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . '_' . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/clientlist';
            $gmbr->move($tujuan_upload, $nama_file);
        }

        $data = Instruktur::create([
            'gambar' => $nama_file ?? null,
            'nama' => $request->nama,

            'tipe' => 3,
        ]);
        if ($data) {
            return 'success';
        }
    }
    public function storei(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:500'],
        ]);

        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . '_' . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/ins';
            $gmbr->move($tujuan_upload, $nama_file);
        }

        $data = Instruktur::create([
            'gambar' => $nama_file ?? null,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,

            'tipe' => 2,
        ]);
        if ($data) {
            return 'success';
        }
    }
    public function editc(Request $request)
    {
        $data = Instruktur::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:500'],
        ]);

        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $path = '/gambar/clientlist/' . $data->gambar;
            $bases = $_SERVER['DOCUMENT_ROOT'];
            if ($data->gambar != null) {
                if (file_exists($bases . '/' . $path)) {
                    unlink($bases . '/' . $path);
                    $data->gambar = null;
                } else {
                    
                    return 'gagal hapus foto';
                }
            }

            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . '_' . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/clientlist';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->gambar = $nama_file ?? null;
        }
        $data->nama = $request->nama;

        $data->save();

        return 'success';
    }
    public function editm(Request $request)
    {
        $data = Instruktur::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:500'],
        ]);

        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $path = '/gambar/mitra/' . $data->gambar;
            $bases = $_SERVER['DOCUMENT_ROOT'];
            if ($data->gambar != null) {
                if (file_exists($bases . '/' . $path)) {
                    unlink($bases . '/' . $path);
                    $data->gambar = null;
                } else {
                    
                    return 'gagal hapus foto';
                }
            }

            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . '_' . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/mitra';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->gambar = $nama_file ?? null;
        }
        $data->nama = $request->nama;
        $data->jabatan = $request->link;

        $data->save();

        return 'success';
    }
    public function editi(Request $request)
    {
        $data = Instruktur::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:500'],
        ]);

        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $path = '/gambar/ins/' . $data->gambar;
            $bases = $_SERVER['DOCUMENT_ROOT'];
            if ($data->gambar != null) {
                if (file_exists($bases . '/' . $path)) {
                    unlink($bases . '/' . $path);
                    $data->gambar = null;
                } else {
                    
                    return 'gagal hapus foto';
                }
            }

            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . '_' . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/ins';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->gambar = $nama_file ?? null;
        }
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;

        $data->save();

        return 'success';
    }
    public function destroyi($id)
    {
        $data = Instruktur::findorfail($id);
        $path = 'gambar/ins/' . $data->gambar;
        $bases = $_SERVER['DOCUMENT_ROOT'];
        if ($data->gambar != null) {
            if (file_exists($bases . '/' . $path)) {
                unlink($bases . '/' . $path);
            } else {
                return 'gagal hapus foto';
            }
        }
        $data->delete();
        return 'success';
    }
    public function destroym($id)
    {
        $data = Instruktur::findorfail($id);
        $path = 'gambar/mitra/' . $data->gambar;
        $bases = $_SERVER['DOCUMENT_ROOT'];
        if ($data->gambar != null) {
            if (file_exists($bases . '/' . $path)) {
                unlink($bases . '/' . $path);
            } else {
                return 'gagal hapus foto';
            }
        }
        $data->delete();
        return 'success';
    }
    public function destroyc($id)
    {
        $data = Instruktur::findorfail($id);
        $path = 'gambar/clientlist/' . $data->gambar;
        $bases = $_SERVER['DOCUMENT_ROOT'];
        if ($data->gambar != null) {
            if (file_exists($bases . '/' . $path)) {
                unlink($bases . '/' . $path);
            } else {
                return 'gagal hapus foto';
            }
        }
        $data->delete();
        return 'success';
    }
}

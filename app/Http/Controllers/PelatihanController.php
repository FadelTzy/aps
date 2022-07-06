<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pelatihan;
use App\Models\kategoriP;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class PelatihanController extends Controller
{
    public function gambar()
    {
        $data = pelatihan::where('id', request()->input('id'))->update([
            'image' => null,
        ]);
        $path = 'gambar/pelatihan/' . request()->input('file');
        $bases = $_SERVER['DOCUMENT_ROOT'];

        if (file_exists($bases . '/' . $path)) {
            unlink($bases . '/' . $path);
            return 'success';
        } else {
            return $path;
        }
    }
    public function show($id)
    {
        $data = pelatihan::findorfail($id);
        $kategori = kategoriP::get();

        return view('admin.editpostp', compact('data', 'kategori'));
    }
    public function index()
    {
        # code...
        if (request()->ajax()) {
            return Datatables::of(pelatihan::with('kategori')->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $btn =
                        "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <a href='" .
                        url('admin/pelatihan/show/') .
                        '/' .
                        $data->id .
                        "' type='button'  class='btn btn-success btn-xs mb-1'>Edit</a>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
               
                </ul>";
                    return $btn;
                })
                ->addColumn('nama_kategori', function ($data) {
                    return $data->kategori->judul;
                })
                ->addColumn('status_p', function ($data) {
                    if ($data->status == 1) {
                        $html = '<span class="label label-success">Posted</span>
                    ';
                    } else {
                        $html = '<span class="label label-warning">Pending</span>';
                    }
                    return $html;
                })
                ->rawColumns(['aksi', 'nama_kategori', 'status_p'])
                ->make(true);
        }
        return view('admin.pelatihan');
    }
    public function destroy($id)
    {
        $data = pelatihan::findorfail($id);
        $path = 'gambar/pelatihan/' . $data->gambar;
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
    public function create()
    {
        $kategori = kategoriP::get();
        return view('admin.newpelatihan', compact('kategori'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => ['required', 'string', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:500'],
            'keyword' => ['string', 'max:255'],
        ]);
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');

        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . '_' . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/pelatihan';
            $gmbr->move($tujuan_upload, $nama_file);
        }

        $data = pelatihan::create([
            'image' => $nama_file ?? null,
            'judul' => $request->judul,
            'harga' => $request->harga,
            'instruktur' => $request->ins,
            'id_kategori' => $request->kategori ?? 0,
            'deskripsi' => $request->teksdesk,
            'tujuan' => $request->tekstuj,
            'file' => $request->link,

            'materi' => $request->teksmate,
            'slug' => Str::slug($request->judul),
            'keterangan' => $request->keyword,

            'tanggal' => $today,
            'status' => $request->status,
        ]);
        if ($data) {
            return 'success';
        }
    }
    public function edit(Request $request, $id)
    {
        $data = pelatihan::findorfail($id);
        $validator = Validator::make($request->all(), [
            'judul' => ['required', 'string', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:500'],
            'keyword' => ['string', 'max:255'],
        ]);
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');

        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $path = '/gambar/pelatihan/' . $data->gambar;
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
            $tujuan_upload = 'gambar/pelatihan';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->image = $nama_file ?? null;
        }
        $data->judul = $request->judul;
        $data->deskripsi = $request->teks;
        $data->id_kategori = $request->kategori ?? 0;
        $data->keterangan = $request->keyword;
        $data->slug = Str::slug($request->judul);
        $data->status = $request->status;
        $data->tujuan = $request->tekstuj;
        $data->file = $request->link;
        $data->materi = $request->teksmate;
     $data->harga =  $request->harga;
     $data->instruktur =  $request->ins;
        $data->save();

        return 'success';
    }
}

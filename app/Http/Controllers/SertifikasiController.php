<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategoriP;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Sertifikasi;
class SertifikasiController extends Controller
{
    public function destroy($id)
    {
        $data = Sertifikasi::findorfail($id);
        $path = 'gambar/sertifikasi/' . $data->gambar;
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
    public function gambar()
    {
        $data = Sertifikasi::where('id', request()->input('id'))->update([
            'image' => null,
        ]);
        $path = 'gambar/sertifikasi/' . request()->input('file');
        $bases = $_SERVER['DOCUMENT_ROOT'];

        if (file_exists($bases . '/' . $path)) {
            unlink($bases . '/' . $path);
            return 'success';
        } else {
            return $path;
        }
    }
    public function index()
    {
        # code...
        if (request()->ajax()) {
            return Datatables::of(Sertifikasi::get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $btn =
                        "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <a href='" .
                        url('admin/sertifikasi/show/') .
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
              
                ->addColumn('status_p', function ($data) {
                    if ($data->status == 1) {
                        $html = '<span class="label label-success">Posted</span>
                    ';
                    } else {
                        $html = '<span class="label label-warning">Pending</span>';
                    }
                    return $html;
                })
                ->rawColumns(['aksi', 'status_p'])
                ->make(true);
        }
        return view('admin.sertifikasi.index');
    }
    public function create()
    {
        $kategori = kategoriP::get();
        return view('admin.sertifikasi.create', compact('kategori'));
    }
    public function edit(Request $request, $id)
    {
        $data = Sertifikasi::findorfail($id);
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
            $path = '/gambar/sertifikasi/' . $data->gambar;
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
            $tujuan_upload = 'gambar/sertifikasi';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->image = $nama_file ?? null;
        }
        $data->judul = $request->judul;
        $data->deskripsi = $request->teks;
        $data->keterangan = $request->keyword;
        $data->slug = Str::slug($request->judul);
        $data->status = $request->status;
        $data->manfaat = $request->teksman;
        $data->file = $request->link;
        $data->paket = $request->tekspak;
    
        $data->save();

        return 'success';
    }
    public function show($id)
    {
        $data = Sertifikasi::findorfail($id);

        return view('admin.sertifikasi.edit', compact('data'));
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
            $tujuan_upload = 'gambar/sertifikasi';
            $gmbr->move($tujuan_upload, $nama_file);
        }

        $data = Sertifikasi::create([
            'image' => $nama_file ?? null,
            'judul' => $request->judul,
         
            'deskripsi' => $request->teksdesk,
            'manfaat' => $request->teksman,
            'paket' => $request->tekspak,

            'file' => $request->link,

            'slug' => Str::slug($request->judul),
            'keterangan' => $request->keyword,

            'tanggal' => $today,
            'status' => $request->status,
        ]);
        if ($data) {
            return 'success';
        }
    }
}

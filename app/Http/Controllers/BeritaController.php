<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Berita;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class BeritaController extends Controller
{
    public function gambar()
    {
        $data = Berita::where('id', request()->input('id'))->update([
            'gambar' => null,
        ]);
        $path = 'gambar/thumbnail/'  . request()->input('file');
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
        $data = Berita::findorfail($id);
        $path = 'gambar/thumbnail/'  . $data->gambar;
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
    public function index()
    {
        # code...
        if (request()->ajax()) {
            return Datatables::of(Berita::with('kategori')->get())->addIndexColumn()->addColumn('aksi', function ($data) {

                $btn = "<ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <a href='" . url('admin/berita/show/') . '/' . $data->id . "' type='button'  class='btn btn-success btn-xs mb-1'>Edit</a>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
               
                </ul>";
                return $btn;
            })->addColumn('nama_kategori', function ($data) {

                return $data->kategori->nama;
            })->addColumn('status_p', function ($data) {
                if ($data->status == 1) {
                    $html = '<span class="label label-success">Posted</span>
                    ';
                } else {
                    $html = '<span class="label label-warning">Pending</span>';
                }
                return $html;
            })->rawColumns(['aksi', 'nama_kategori', 'status_p'])->make(true);
        }
        return view('admin.berita');
    }
    public function create()
    {
        $kategori = Kategori::get();
        return view('admin.newpost', compact('kategori'));
    }
    public function show($id)
    {
        $data = Berita::findorfail($id);
        $kategori = Kategori::get();

        return view('admin.editpost', compact('data', 'kategori'));
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
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/thumbnail';
            $gmbr->move($tujuan_upload, $nama_file);
        }

        $data =  Berita::create([
            'gambar' => $nama_file ?? null,
            'judul' => $request->judul,
            'deskripsi' => $request->teks,
            'id_kategori' => $request->kategori ?? 0,
            'meta' => $request->keyword,
            'slug' => Str::slug($request->judul),
            'tanggal' => $today,
            'status' => $request->status,
        ]);
        if ($data) {
            return 'success';
        }
    }
    public function edit(Request $request, $id)
    {
        $data = Berita::findorfail($id);
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
            $path = '/gambar/thumbnail/' . $data->gambar;
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
            $tujuan_upload = 'gambar/thumbnail';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->gambar = $nama_file ?? null;
        }
        $data->judul = $request->judul;
        $data->deskripsi = $request->teks;
        $data->id_kategori = $request->kategori ?? 0;
        $data->meta = $request->keyword;
        $data->slug = Str::slug($request->judul);
        $data->tanggal = $today;
        $data->status =  $request->status;
        $data->save();

        return 'success';
    }
    public function image(Request $request)
    {
        $bases =  $_SERVER['DOCUMENT_ROOT'];
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalExtension();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extenstion = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extenstion;
            $request->file('upload')->move('upload', $fileName);
            $function_number = $_GET['CKEditorFuncNum'];
            $url = asset('upload/' . $fileName);
            $message = 'Sukses Upload Gambar';
            $response = "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
            @header('Content-type: text/html charset=utf-8');
            echo $response;
        }
    }
}

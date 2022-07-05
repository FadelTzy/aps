<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Berita;
use App\Models\Agenda;
use App\Models\Skema;

class adminController extends Controller
{
    public function index()
    {
        $Berita = Berita::count();
        $Skema = Skema::count();
        $Agenda = Agenda::count();
        $User = User::count();
        return view('admin.dashboard', compact('Berita', 'Skema', 'Agenda', 'User'));
    }
    public function uindex(Request $request)
    {
        # code...
        if (request()->ajax()) {
            return Datatables::of(User::get())->addIndexColumn()->addColumn('aksi', function ($data) {
                $dataj = json_encode($data);

                $btn = "<ul class='list-inline mb-0'>
            
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" . $data->id . ")'   class='btn btn-danger btn-xs mb-1'>Hapus</button>
                    </li>
               
                </ul>";
                return $btn;
            })->addColumn('nama', function ($data) {
                $dataj = json_encode($data);

                $btn = "<div class='media'>
                <div class='pull-left'>
                    <img style='width:40px' class='img-circle img-offline' src='" . asset('gambar/admin/admin.png') . "' alt='...'>
                </div>
                <div class='media-body'>
                    <h4 class='media-heading'>" . $data->name . "</h4>
                </div>
            </div>";
                return $btn;
            })->rawColumns(['aksi', 'nama'])->make(true);
        }
        return view('admin.user');
    }
    public function ustore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],

        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function udestroy($id)
    {
        $data = User::findorfail($id);
        if (Auth::user()->id == $id) {
            return 'fail';
        }
        $data->delete();
        return 'success';
    }
    public function show()
    {
        $data = Auth::user()->id;
        return view('admin.profil');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $user = User::findorfail(Auth::user()->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return 'success';
    }
}

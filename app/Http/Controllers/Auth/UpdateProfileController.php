<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateProfileController extends Controller
{

    public function __construct()
    {
        // $this->UserModel = new UserModel();
        $this->middleware(['auth', 'verified']);
    }

    public function edit()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->id)->first();
        $prodi = Prodi::all();
        return view('auth.profil', compact('user', 'prodi', 'mahasiswa'));
    }

    public function update(Request $request)
    {
        // request()->validate([
        //     'foto' => 'mimes:jpg,jpeg,png|max:1000',
        // ], [
        //     'foto.mimes' => 'Format Harus JPG,JPEG,PNG !!',
        //     'foto.max' => 'Ukuran Foto Maksimal 1 MB !!',
        // ]);
        // dd($request->all());
        if (Auth::user()->role_user == 'mahasiswa') {
            $id_user = Auth::user()->id;
            $user = User::find($id_user);
            $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

            //jika user update foto
            $file = $request->foto;
            $filename = Auth::user()->email . '.' . $file->extension();
            $file->move(public_path('foto_profil'), $filename);
            $user->email = $request->email;
            $user->foto = $filename;
            $user->save();
            $mahasiswa->no_hp = $request->no_hp;
            $mahasiswa->kelas = $request->kelas;
            $mahasiswa->prodi = $request->prodi;
            $mahasiswa->save();
            return redirect()->route('dashboard.index')->with('sukses', 'Profil Berhasil Di Perbarui');
        } else {
            $id_user = Auth::user()->id;
            $user = User::find($id_user);

            //jika user update foto
            $file = $request->foto;
            $filename = Auth::user()->username . '.' . $file->extension();
            $file->move(public_path('foto_profil'), $filename);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->foto = $filename;
            $user->save();
            return redirect()->back()->with('sukses', 'Profil Berhasil Di Perbarui');
        }
    }
    public function updatePassword(Request $request)
    {

        $current_password = auth()->user()->password;
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'Password Lama Harus Diisi',
            'password.required'         => 'Masukkan Password Baru',
            'password.min'              => 'Password Minimal 8 Karakter',
            'password.confirmed'        => 'Konfirmasi Ulang Password Baru',
        ]);

        if (Hash::check($request->input('current_password'), $current_password)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->input('password'));
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('sukses', 'Password Berhasil Diganti');
        } else {
            return redirect()->back()->with('error', 'Password Lama tidak Sesuai');
        }
    }
}

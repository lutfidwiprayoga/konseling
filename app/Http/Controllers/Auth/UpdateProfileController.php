<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('auth.profil', compact('user'));
    }

    public function update(Request $request)
    {
        // request()->validate([
        //     'foto' => 'mimes:jpg,jpeg,png|max:1000',
        // ], [
        //     'foto.mimes' => 'Format Harus JPG,JPEG,PNG !!',
        //     'foto.max' => 'Ukuran Foto Maksimal 1 MB !!',
        // ]);

        $id_user = Auth::user()->id;
        $user = User::find($id_user);

        //jika user update foto
        $file = $request->foto;
        $filename = Auth::user()->username . '.' . $file->extension();
        $file->move(public_path('foto_profil'), $filename);
        $user->name = $request->name;
        $user->no_hp = $request->no_hp;
        $user->foto = $filename;
        $user->save();


        return redirect()->back()->with('sukses', 'Profil Berhasil Di Perbarui');
    }
}

<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use App\Models\Jadwal;
use App\Models\Konseling;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $pengajuan = Konseling::join('jadwals', 'konselings.id', '=', 'jadwals.konseling_id')
            ->where('user_id', Auth::user()->id)
            ->where('jadwals.status', '=', 'Pengajuan')
            ->get();
        $terdaftar = Jadwal::join('konselings', 'jadwals.konseling_id', '=', 'konselings.id')
            ->where('konselings.user_id', Auth::user()->id)
            ->where('status', 'Terdaftar')
            ->get();
        $prodi = Prodi::all();
        return view('Mahasiswa.Konsultasi.index', compact('pengajuan', 'prodi', 'terdaftar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $konsul = Konseling::create([
            'user_id' => Auth::user()->id,
            'topik' => $request->topik,
            'deskripsi' => $request->deskripsi,
        ]);
        $jadwal = new Jadwal();
        $jadwal->konseling_id = $konsul->id;
        $jadwal->status = 'Pengajuan';
        $jadwal->save();

        $bimbingan = new Bimbingan();
        $bimbingan->konseling_id = $konsul->id;
        $bimbingan->jadwal_id = $jadwal->id;
        $bimbingan->save();

        return redirect()->back()->with('sukses', 'Pengajuan Konsultasi Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $konseling = Konseling::find($id);
        $konseling->status_konseling = $request->status_konseling;
        $konseling->save();
        $bimbingan = Bimbingan::where('konseling_id', $konseling->id)->first();
        $bimbingan->catatan = $request->catatan;
        $bimbingan->save();
        return redirect()->back()->with('sukses', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

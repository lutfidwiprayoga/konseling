<?php

namespace App\Http\Controllers\Konselor;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use App\Models\Jadwal;
use App\Models\Konseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan = Konseling::join('jadwals', 'konselings.id', '=', 'jadwals.konseling_id')
            ->where('jadwals.status', '=', 'Pengajuan')
            ->get();
        $terdaftar = Jadwal::join('konselings', 'jadwals.konseling_id', '=', 'konselings.id')
            ->where('status', 'Terdaftar')
            ->get();
        return view('Konselor.jadwal', compact('pengajuan', 'terdaftar'));
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
        //
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
        $konseling->status_konseling = 'Belum Selesai';
        $konseling->save();
        $jadwal = Jadwal::where('konseling_id', $konseling->id)->first();
        $jadwal->konselor_id = Auth::user()->id;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->waktu = $request->waktu;
        $jadwal->status = 'Terdaftar';
        $jadwal->save();
        $bimbingan = Bimbingan::where('konseling_id', $konseling->id)->first();
        $bimbingan->jadwal_id = $jadwal->id;
        $bimbingan->save();
        return redirect()->back()->with('sukses', 'Jadwal Sukses Dibuat');
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

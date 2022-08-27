<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LihatJadwalController extends Controller
{
    public function lihatJadwal()
    {
        $belum = Bimbingan::join('konselings', 'bimbingans.konseling_id', '=', 'konselings.id')
            ->join('jadwals', 'bimbingans.jadwal_id', '=', 'jadwals.id')
            ->where('konselings.user_id', Auth::user()->id)
            ->where('jadwals.status', 'Terdaftar')
            ->where('konselings.status_konseling', 'Belum Selesai')
            ->get();
        $sudah = Bimbingan::join('konselings', 'bimbingans.konseling_id', '=', 'konselings.id')
            ->join('jadwals', 'bimbingans.jadwal_id', '=', 'jadwals.id')
            ->where('konselings.user_id', Auth::user()->id)
            ->where('jadwals.status', 'Terdaftar')
            ->where('konselings.status_konseling', 'Selesai')
            ->get();
        return view('Mahasiswa.Konsultasi.lihatJadwal', compact('belum', 'sudah'));
    }
}

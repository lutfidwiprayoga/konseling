<?php

namespace App\Http\Controllers\Konselor;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use Illuminate\Http\Request;

class RekapDataController extends Controller
{
    public function index()
    {
        $rekap = Bimbingan::join('konselings', 'bimbingans.konseling_id', '=', 'konselings.id')
            ->join('jadwals', 'bimbingans.jadwal_id', '=', 'jadwals.id')
            ->where('konselings.status_konseling', 'Selesai')
            ->where('jadwals.status', 'Terdaftar')
            ->get();
        return view('Konselor.rekap', compact('rekap'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role_user == 'mahasiswa' && Auth::user()->email == null) {
            $mahasiswa = Mahasiswa::where('user_id', Auth::user()->id)->first();
            $prodi = Prodi::all();
            return view('auth.profil', compact('mahasiswa', 'prodi'));
        } else {
            $total_mhs = User::where('role_user', 'mahasiswa')->count();
            $sdh_konsul_mhs = Bimbingan::join('konselings', 'bimbingans.konseling_id', '=', 'konselings.id')
                ->where('konselings.status_konseling', '=', 'Selesai')
                ->where('konselings.user_id', '=', Auth::user()->id)
                ->count();
            $blm_konsul_mhs = Bimbingan::join('konselings', 'bimbingans.konseling_id', '=', 'konselings.id')
                ->where('konselings.status_konseling', '=', 'Belum Selesai')
                ->where('konselings.user_id', '=', Auth::user()->id)
                ->count();
            $sdh_konsul = Bimbingan::join('konselings', 'bimbingans.konseling_id', '=', 'konselings.id')
                ->where('konselings.status_konseling', '=', 'Selesai')
                ->count();
            $blm_konsul = Bimbingan::join('konselings', 'bimbingans.konseling_id', '=', 'konselings.id')
                ->where('konselings.status_konseling', '=', 'Belum Selesai')
                ->count();
            $bimbingan = Bimbingan::count();
            $konseling = DB::table('konselings')
                ->select('topik', DB::raw('count(*) as total'))
                ->groupBy('topik')
                ->get();
            $topik = [];
            $total_topik = [];
            foreach ($konseling as $data) {
                // $donate[] = date('d/m/Y', strtotime($data->created_at));
                $topik[] = $data->topik;
                $total_topik[] = $data->total;
            }
            // dd($total_topik);
            return view('dashboard', compact('total_mhs', 'sdh_konsul', 'blm_konsul', 'bimbingan', 'sdh_konsul_mhs', 'blm_konsul_mhs', 'topik', 'total_topik'));
        }
    }
}

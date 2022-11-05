<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
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

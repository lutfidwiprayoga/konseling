<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use Illuminate\Http\Request;

class RekapDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $belum = Bimbingan::join('konselings', 'bimbingans.konseling_id', '=', 'konselings.id')
            ->join('jadwals', 'bimbingans.jadwal_id', '=', 'jadwals.id')
            ->where('jadwals.status', 'Terdaftar')
            ->where('konselings.status_konseling', null)
            ->get();
        $sudah = Bimbingan::join('konselings', 'bimbingans.konseling_id', '=', 'konselings.id')
            ->join('jadwals', 'bimbingans.jadwal_id', '=', 'jadwals.id')
            ->where('jadwals.status', 'Terdaftar')
            ->where('konselings.status_konseling', 'Selesai')
            ->get();
        return view('Admin.rekapdata', compact('belum', 'sudah'));
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

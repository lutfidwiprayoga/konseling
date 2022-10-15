@extends('layouts.master')
@section('main')
    @if (session()->get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('sukses') }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-10 grid-margin stretch-card" style="margin: 0 auto; float: none;margin-bottom: 10px;">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><b>Informasi Mahasiswa</b></h5>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-right"><b>{{ date('l, d F Y', strtotime(now())) }}</b></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img src="{{ url('foto_profil/' . $user->foto) }}" width="300px">
                        </div>
                        <div class="col-md-6">
                            <table class="table-condensed" style="font-size: 20px">
                                <tr>
                                    <th width="50%"><strong>NIM Mahasiswa</strong></th>
                                    <th width="30px"><strong>:</strong></th>
                                    <th><strong>{{ $user->nim }}</strong></th>
                                </tr><br>
                                <tr>
                                    <th width="50%"><strong>Nama Mahasiswa</strong></th>
                                    <th width="30px"><strong>:</strong></th>
                                    <th><strong>{{ $user->name }}</strong></th>
                                </tr><br>
                                <tr>
                                    <th width="50%"><strong>Email Mahasiswa</strong></th>
                                    <th width="30px"><strong>:</strong></th>
                                    <th><strong>{{ $user->email }}</strong></th>
                                </tr><br>
                                <tr>
                                    <th width="50%"><strong>Username Mahasiswa</strong></th>
                                    <th width="30px"><strong>:</strong></th>
                                    <th><strong>{{ $user->username }}</strong></th>
                                </tr>
                                <tr>
                                    <th width="50%"><strong>No HP Mahasiswa</strong></th>
                                    <th width="30px"><strong>:</strong></th>
                                    <th><strong>{{ $user->no_hp }}</strong></th>
                                </tr>
                                <tr>
                                    <th width="50%"><strong>Program Studi Mahasiswa</strong></th>
                                    <th width="30px"><strong>:</strong></th>
                                    <th><strong>{{ $user->prodi->nama }}</strong></th>
                                </tr>
                                <tr>
                                    <th width="50%"><strong>Kelas Mahasiswa</strong></th>
                                    <th width="30px"><strong>:</strong></th>
                                    <th><strong>{{ $user->kelas }}</strong></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

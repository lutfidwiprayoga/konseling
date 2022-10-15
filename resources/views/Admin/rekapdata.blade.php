@extends('layouts.master')
@section('main')
    @if (session()->get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('sukses') }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Data Donasi Belum Validasi -->
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <p class="card-title">Lihat Jadwal & Upload Konsultasi</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home1" role="tabpanel1"
                                        aria-selected="false">Belum Bimbingan({{ $belum->count() }})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#home2" role="tabpanel2"
                                        aria-selected="false">Sudah Bimbingan({{ $sudah->count() }})</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!--Menunggu Verifikasi-->
                                <div class="tab-pane fade active show" id="home1" role="tabpanel">
                                    <div class="pd-20">
                                        <div class="table-responsive">
                                            <table class="display expandable-table" style="width:100%" id="table-report1">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                        <th>No Hp</th>
                                                        <th>Program Studi</th>
                                                        <th>Kelas</th>
                                                        <th>Nama Konselor</th>
                                                        <th>Topik</th>
                                                        <th>Tanggal Bimbingan</th>
                                                        <th>Waktu Bimbingan</th>
                                                        <th>Tempat Bimbingan</th>
                                                        <th>Status Konseling</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($belum as $i => $row)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->konseling->user->name }}</td>
                                                            <td>{{ $row->konseling->user->nim }}</td>
                                                            <td>{{ $row->konseling->user->no_hp }}</td>
                                                            <td>{{ $row->konseling->user->prodi->nama }}</td>
                                                            <td>{{ $row->konseling->user->kelas }}</td>
                                                            <td>{{ $row->jadwal->user->name }}</td>
                                                            <td>{{ $row->konseling->topik }}</td>
                                                            <td>{{ date('l, d F Y', strtotime($row->jadwal->tanggal)) }}
                                                            </td>
                                                            <td>{{ date('H:i', strtotime($row->jadwal->waktu)) }} WIB</td>
                                                            <td>{{ $row->jadwal->tempat }}</td>
                                                            <td><button
                                                                    class="btn btn-inverse-success btn-sm">{{ $row->konseling->status_konseling }}</button>
                                                            </td>
                                                            <td><button
                                                                    class="btn btn-inverse-danger btn-sm">{{ $row->konseling->status_konseling }}</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--Terverifikasi-->
                                <div class="tab-pane fade" id="home2" role="tabpanel2">
                                    <div class="pd-20">
                                        <div class="table-responsive">
                                            <table class="display expandable-table" style="width:100%" id="table-report2">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>NIM</th>
                                                        <th>No Hp</th>
                                                        <th>Program Studi</th>
                                                        <th>Kelas</th>
                                                        <th>Nama Konselor</th>
                                                        <th>Topik</th>
                                                        <th>Tanggal Bimbingan</th>
                                                        <th>Waktu Bimbingan</th>
                                                        <th>Tempat Bimbingan</th>
                                                        <th>Status Konseling</th>
                                                        <th>Hasil Bimbingan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sudah as $i => $row)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->konseling->user->name }}</td>
                                                            <td>{{ $row->konseling->user->nim }}</td>
                                                            <td>{{ $row->konseling->user->no_hp }}</td>
                                                            <td>{{ $row->konseling->user->prodi->nama }}</td>
                                                            <td>{{ $row->konseling->user->kelas }}</td>
                                                            <td>{{ $row->jadwal->user->name }}</td>
                                                            <td>{{ $row->konseling->topik }}</td>
                                                            <td>{{ date('l, d F Y', strtotime($row->jadwal->tanggal)) }}
                                                            </td>
                                                            <td>{{ date('H:i', strtotime($row->jadwal->waktu)) }} WIB</td>
                                                            <td>{{ $row->jadwal->tempat }}</td>
                                                            <td><button
                                                                    class="btn btn-inverse-success btn-sm">{{ $row->konseling->status_konseling }}</button>
                                                            </td>
                                                            <td>{{ $row->catatan }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            var tableLaporan1 = $('#table-report1').DataTable({});
            var tableLaporan2 = $('#table-report2').DataTable({});
        });
    </script>
@endsection

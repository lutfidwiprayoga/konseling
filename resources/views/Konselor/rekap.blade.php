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
                            <p class="card-title">Rekapitulasi Data Mahasiswa</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
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
                                            <th>Topik</th>
                                            <th>Tanggal Bimbingan</th>
                                            <th>Waktu Bimbingan</th>
                                            <th>Status Konseling</th>
                                            <th>Hasil Bimbingan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rekap as $i => $row)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $row->konseling->user->name }}</td>
                                                <td>{{ $row->konseling->user->nim }}</td>
                                                @foreach ($row->konseling->user->mahasiswa as $data)
                                                    <td>{{ $data->no_hp }}</td>
                                                    <td>{{ $data->prodi }}</td>
                                                    <td>{{ $data->kelas }}</td>
                                                @endforeach
                                                {{-- <td>{{ $row->jadwal->user->name }}</td> --}}
                                                <td>{{ $row->konseling->topik }}</td>
                                                <td>{{ date('l, d F Y', strtotime($row->jadwal->tanggal)) }}</td>
                                                <td>{{ date('H:i', strtotime($row->jadwal->waktu)) }} WIB</td>
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
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            var tableLaporan1 = $('#table-report1').DataTable({});
        });
    </script>
@endsection

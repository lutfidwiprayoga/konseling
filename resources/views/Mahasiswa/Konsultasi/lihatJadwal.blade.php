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
                                        aria-selected="false">Belum Bimbingan({{ $belum_bimbingan->count() }})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#home2" role="tabpanel2"
                                        aria-selected="false">Sudah Bimbingan({{ $sudah_bimbingan->count() }})</a>
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
                                                        <th>Bimbingan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($belum_bimbingan as $i => $row)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->konseling->user->name }}</td>
                                                            <td>{{ $row->konseling->user->nim }}</td>
                                                            @foreach ($row->konseling->user->mahasiswa as $data)
                                                                <td>{{ $data->no_hp }}</td>
                                                                <td>{{ $data->prodi }}</td>
                                                                <td>{{ $data->kelas }}</td>
                                                            @endforeach
                                                            <td>{{ $row->jadwal->user->name }}</td>
                                                            <td>{{ $row->konseling->topik }}</td>
                                                            <td>{{ date('l, d F Y', strtotime($row->tanggal)) }}</td>
                                                            <td>{{ date('H:i', strtotime($row->waktu)) }} WIB</td>
                                                            <td>{{ $row->tempat }}</td>
                                                            <td><button
                                                                    class="btn btn-inverse-danger btn-sm">{{ $row->konseling->status_konseling }}</button>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-inverse-warning btn-rounded btn-icon"
                                                                    data-target="#tambahBimbingan{{ $row->id }}"
                                                                    data-toggle="modal"><i
                                                                        class="ti-pencil-alt"></i></button>
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
                                                    @foreach ($sudah_bimbingan as $i => $row)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->konseling->user->name }}</td>
                                                            <td>{{ $row->konseling->user->nim }}</td>
                                                            @foreach ($row->konseling->user->mahasiswa as $data)
                                                                <td>{{ $data->no_hp }}</td>
                                                                <td>{{ $data->prodi }}</td>
                                                                <td>{{ $data->kelas }}</td>
                                                            @endforeach
                                                            <td>{{ $row->jadwal->user->name }}</td>
                                                            <td>{{ $row->konseling->topik }}</td>
                                                            <td>{{ date('l, d F Y', strtotime($row->tanggal)) }}</td>
                                                            <td>{{ date('H:i', strtotime($row->waktu)) }} WIB</td>
                                                            <td>{{ $row->tempat }}</td>
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
    <!-- Modal Tambah hasil Bimbingan-->
    @foreach ($belum_bimbingan as $row)
        <div class="modal fade" id="tambahBimbingan{{ $row->id }}" tabindex="-1" aria-labelledby="muridModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                <strong>Form Input Hasil Bimbingan Konseling</strong>
                            </div>
                            <div class="card-body">
                                <form class="form-sample" action="{{ route('konsultasi.update', $row->id) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-4 col-form-label">Status Konseling</label>
                                                <div class="col-sm-8">
                                                    <select name="status_konseling" class="form-control">
                                                        <option value="Selesai">Selesai</option>
                                                        <option value="Belum Selesai">Belum Selesai</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-4 col-form-label">Catatan</label>
                                                <div class="col-sm-8">
                                                    <textarea name="catatan" id="" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3" style="justify-content: center">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-dot-circle-o"></i> Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            var tableLaporan1 = $('#table-report1').DataTable({});
            var tableLaporan2 = $('#table-report2').DataTable({});
        });
    </script>
@endsection

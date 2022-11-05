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
                            <p class="card-title">Jadwal Konseling Mahasiswa</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home1" role="tabpanel1"
                                        aria-selected="false">Pengajuan({{ $pengajuan->count() }})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#home2" role="tabpanel2"
                                        aria-selected="false">Terdaftar({{ $terdaftar->count() }})</a>
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
                                                        <th>Topik</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pengajuan as $i => $row)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->user->name }}</td>
                                                            <td>{{ $row->user->nim }}</td>
                                                            @foreach ($row->user->mahasiswa as $data)
                                                                <td>{{ $data->no_hp }}</td>
                                                                <td>{{ $data->prodi }}</td>
                                                                <td>{{ $data->kelas }}</td>
                                                            @endforeach
                                                            <td>{{ $row->topik }}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#buatJadwalModal{{ $row->id }}">
                                                                    Buat Jadwal
                                                                </button>
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
                                                        <th>Topik</th>
                                                        <th>Tanggal</th>
                                                        <th>Waktu</th>
                                                        <th>Tempat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($terdaftar as $i => $row)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->konseling->user->name }}</td>
                                                            <td>{{ $row->konseling->user->nim }}</td>
                                                            @foreach ($row->konseling->user->mahasiswa as $data)
                                                                <td>{{ $data->no_hp }}</td>
                                                                <td>{{ $data->prodi }}</td>
                                                                <td>{{ $data->kelas }}</td>
                                                            @endforeach
                                                            <td>{{ $row->konseling->topik }}</td>
                                                            <td>{{ date('l, d F Y', strtotime($row->tanggal)) }}</td>
                                                            <td>{{ date('H:i', strtotime($row->waktu)) }} WIB</td>
                                                            <td>{{ $row->tempat }}</td>
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
    <!-- Modal Buat Jadawl -->
    @foreach ($pengajuan as $row)
        <div class="modal fade" id="buatJadwalModal{{ $row->id }}" tabindex="-1" aria-labelledby="muridModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                <strong>Form Input Buat Jadwal</strong>
                            </div>
                            <div class="card-body">
                                <form class="form-sample" action="{{ route('jadwal.update', $row->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-4 col-form-label">Nama</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        value="{{ $row->user->name }}" required readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-4 col-form-label">NIM</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        value="{{ $row->user->nim }}" required readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-4 col-form-label">Tanggal</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="tanggal" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-4 col-form-label">Waktu</label>
                                                <div class="col-sm-8">
                                                    <input type="time" class="form-control" name="waktu" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-4 col-form-label">Tempat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="tempat" required>
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

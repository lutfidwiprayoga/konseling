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
                            <p class="card-title">Data Konsultasi</p>
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
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#muridModal">
                                        Ajukan Konsultasi
                                    </button>
                                    <div class="pd-20 mt-3">
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pengajuan as $i => $row)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->user->name }}</td>
                                                            <td>{{ $row->user->nim }}</td>
                                                            <td>{{ $row->user->no_hp }}</td>
                                                            <td>{{ $row->user->prodi->nama }}</td>
                                                            <td>{{ $row->user->kelas }}</td>
                                                            <td>{{ $row->topik }}</td>
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($terdaftar as $i => $row)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->konseling->user->name }}</td>
                                                            <td>{{ $row->konseling->user->nim }}</td>
                                                            <td>{{ $row->konseling->user->no_hp }}</td>
                                                            <td>{{ $row->konseling->user->prodi->nama }}</td>
                                                            <td>{{ $row->konseling->user->kelas }}</td>
                                                            <td>{{ $row->konseling->topik }}</td>
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
    <!-- Modal Tambah data-->
    <div class="modal fade" id="muridModal" tabindex="-1" aria-labelledby="muridModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form Input Tambah Konsultasi</strong>
                        </div>
                        <div class="card-body">
                            <form class="form-sample" action="{{ route('konsultasi.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Nama</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ auth()->user()->name }}" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">NIM</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ auth()->user()->nim }}" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">No Hp</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ auth()->user()->no_hp }}" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Program Studi</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control"
                                                    value="{{ auth()->user()->prodi->nama }}" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Kelas</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ auth()->user()->kelas }}" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Topik</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="topik">
                                                    <option value="Keluarga">Keluarga</option>
                                                    <option value="Kendali Emosi">Kendali Emosi</option>
                                                    <option value="Keuangan">Keuangan</option>
                                                    <option value="Pertemanan">Pertemanan</option>
                                                    <option value="Organisasi">Organisasi</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
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
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            var tableLaporan1 = $('#table-report1').DataTable({});
            var tableLaporan2 = $('#table-report2').DataTable({});
        });
    </script>
@endsection

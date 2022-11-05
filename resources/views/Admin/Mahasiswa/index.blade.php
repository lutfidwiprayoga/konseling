@extends('layouts.master')
@section('main')
    @if (session()->get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('sukses') }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <p class="card-title">Data Akun Mahasiswa</p>
                        </div>
                        {{-- <div class="col-md-2 text-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#userModal">
                                Tambah Mahasiswa
                            </button>
                        </div> --}}
                    </div>
                    <form action="{{ route('importmahasiswa.excel') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-11">
                                <input class="form-control form-control-sm" id="formFileSm" type="file" name="file">
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-primary btn-sm">Upload</button>
                            </div>
                        </div>
                    </form><br>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="display expandable-table" style="width:100%" id="table-user">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Prodi</th>
                                            <th>Kelas</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $i => $row)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $row->nim }}</td>
                                                <td>{{ $row->nama }}</td>
                                                <td>{{ $row->user->email }}</td>
                                                <td>{{ $row->no_hp }}</td>
                                                <td>{{ $row->prodi }}</td>
                                                <td>{{ $row->kelas }}</td>
                                                <td><img src="{{ url('foto_profil/' . $row->foto) }}" width="50px"></td>
                                                <td>
                                                    <a href="{{ route('user.show', $row->id) }}"
                                                        class="btn btn-info btn-sm">Lihat Info</a>
                                                </td>
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
    <!-- Modal Tambah data-->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="muridModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form Input Tambah Data Mahasiswa</strong>
                        </div>
                        <div class="card-body">
                            <form class="form-sample" action="{{ route('user.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">NIM</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="nim" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" name="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Username</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="username" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" name="password" required>
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
            var user = $('#table-user').DataTable({});
        });
    </script>
@endsection

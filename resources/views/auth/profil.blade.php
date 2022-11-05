@extends('layouts.master')
@section('main')
    @if (session()->get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('sukses') }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session()->get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        @if (auth()->user()->role_user == 'mahasiswa')
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Update Profil Anda</p>
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{ route('profil.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="exampleInputNim" class="col-sm-3 col-form-label">NIM
                                            Anda</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-lg" id="exampleInputNim"
                                                value="{{ auth()->user()->nim }}" readonly>
                                        </div>
                                        @error('nim')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputName2" class="col-sm-3 col-form-label">Update Nama
                                            Anda</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-lg"
                                                id="exampleInputName2" value="{{ auth()->user()->name }}">
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email
                                            Anda</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control form-control-lg"
                                                id="exampleInputEmail2" value="{{ auth()->user()->email }}">
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Update Username
                                            Anda</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="username" class="form-control form-control-lg"
                                                id="exampleInputUsername2" placeholder="Masukkan Username Baru Anda"
                                                value="{{ auth()->user()->username }}">
                                        </div>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPhone" class="col-sm-3 col-form-label">Update No Hp
                                            Anda</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="no_hp" class="form-control form-control-lg"
                                                id="exampleInputPhone" placeholder="Masukkan Nomor Hp/Telepon Anda"
                                                value="{{ $mahasiswa->no_hp }}">
                                        </div>
                                        @error('no_hp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputProdi" class="col-sm-3 col-form-label">Update Program
                                            Studi
                                        </label>
                                        <div class="col-sm-9">
                                            @if ($mahasiswa->prodi != null)
                                                <input type="text" class="form-control form-control-lg"
                                                    id="exampleIInputProdi" value="{{ $mahasiswa->prodi }}" readonly>
                                            @else
                                                <select name="prodi" class="form-control">
                                                    <option disabled>-</option>
                                                    @foreach ($prodi as $prod)
                                                        <option value="{{ $prod->nama }}">{{ $prod->nama }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        @error('prodi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputKelas" class="col-sm-3 col-form-label">Update Kelas
                                            Anda</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="kelas" class="form-control form-control-lg"
                                                id="exampleInputKelas" value="{{ $mahasiswa->kelas }}">
                                        </div>
                                        @error('kelas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPhotos" class="col-sm-3 col-form-label">Update Foto
                                            Profil
                                            Anda</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="foto" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="file" name="foto"
                                                    class="form-control file-upload-info" placeholder="Upload Foto Anda">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row mt-3" style="justify-content: center">
                                        <button type="reset" class="btn btn-light">Reset</button>
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
            <div class="col-md-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Update password Anda</p>
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{ route('password.ganti') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="exampleInputOldPassword" class="col-sm-3 col-form-label">Password Lama
                                            Anda</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="current_password"
                                                class="form-control form-control-lg" id="exampleInputOldPassword"
                                                placeholder="Masukkan Password Lama Anda">
                                        </div>
                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputNewPassword" class="col-sm-3 col-form-label">Password Baru
                                            Anda</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control form-control-lg"
                                                placeholder="Masukkan Password Baru Anda" required>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPasswordConfirm"
                                            class="col-sm-3 col-form-label">Konfirmasi
                                            Password
                                            Baru</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password_confirmation"
                                                class="form-control form-control-lg"
                                                placeholder="Ulangi Password Baru Anda" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3" style="justify-content: center">
                                        <button type="reset" class="btn btn-light">Reset</button>
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
        @else
            <div class="col-md-6 grid-margin stretch-card" style="margin: 0 auto; float: none;margin-bottom: 10px;">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Update Profil Anda</p>
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{ route('profil.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="exampleInpuName2" class="col-sm-3 col-form-label">Update Nama
                                            Anda</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control form-control-lg"
                                                id="exampleInputName2" value="{{ auth()->user()->name }}">
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputEmail1" class="col-sm-3 col-form-label">Email
                                            Anda</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control form-control-lg"
                                                id="exampleInputEmail1" value="{{ auth()->user()->email }}" readonly>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Update Username
                                            Anda</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="username" class="form-control form-control-lg"
                                                id="exampleInputUsername2" value="{{ auth()->user()->username }}"
                                                placeholder="Masukkan Username Baru Anda" required>
                                        </div>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Update Foto
                                            Profil
                                            Anda</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="foto" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="file" name="foto"
                                                    class="form-control file-upload-info" placeholder="Upload Foto Anda">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row mt-3" style="justify-content: center">
                                        <button type="reset" class="btn btn-light">Reset</button>
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
        @endif
    </div>
@endsection

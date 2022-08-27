@extends('layouts.master')
@section('main')
    @if (session()->get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('sukses') }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card" style="margin: 0 auto; float: none;margin-bottom: 10px;">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Update Profil Anda</p>
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{ route('profil.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Update Nama
                                        Anda</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control form-control-lg"
                                            id="exampleInputEmail1" value="{{ auth()->user()->name }}">
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Update No Hp
                                        Anda</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="no_hp" class="form-control form-control-lg"
                                            id="exampleInputPhone" value="{{ auth()->user()->no_hp }}"
                                            placeholder="Masukkan Nomor Hp/Telepon Anda">
                                    </div>
                                    @error('no_hp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Update Foto Profil
                                        Anda</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="foto" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="file" name="foto" class="form-control file-upload-info"
                                                placeholder="Upload Foto Anda">
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
    </div>
@endsection

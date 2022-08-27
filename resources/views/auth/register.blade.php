@extends('auth.layouts.app')

@section('auth')
    <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo text-center">
                    <img src="{{ asset('template') }}/images/BK-Poliwangi.svg" style="width: 200px">
                </div>
                <h4>Buat Baru Disini</h4>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1"
                            placeholder="Masukkan Email Anda">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="name" name="name" class="form-control form-control-lg" id="exampleInputEmail1"
                            placeholder="Masukkan Nama Anda">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1"
                            placeholder="Masukkan Username Anda">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="nim" class="form-control form-control-lg" id="exampleInputEmail1"
                            placeholder="Masukkan NIM Anda">
                        <p class="text-primary"><strong>*Kosongkan jika tidak ada</strong></p>
                        @error('nim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="text" name="role_user" value="mahasiswa" hidden>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg"
                            id="exampleInputPassword1" placeholder="Masukkan Password Baru Anda">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control form-control-lg"
                            id="exampleInputPassword1" placeholder="Ulangi Kembali Password Baru Anda">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button type="submit"
                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">DAFTAR</button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            Sudah Punya Akun? <a href="{{ route('login') }}" class="text-primary">Masuk</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

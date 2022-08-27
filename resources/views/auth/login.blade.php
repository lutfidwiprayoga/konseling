@extends('auth.layouts.app')

@section('auth')
    <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo text-center">
                    <img src="{{ asset('template') }}/images/BK-Poliwangi.svg" style="width: 200px">
                </div>
                <h4>Selamat Datang di BK Poliwangi</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1"
                            placeholder="Masukkan NIM atau Email">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg"
                            id="exampleInputPassword1" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button type="submit"
                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">MASUK</button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            Belum Punya Akun? <a href="{{ route('register') }}" class="text-primary">Buat Akun</a>
                        </div>
                        <a href="{{ route('password.request') }}" class="auth-link text-primary">Forgot password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('auth.layouts.app')

@section('auth')
    <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo text-center">
                    <img src="{{ asset('template') }}/images/BK-Poliwangi.svg" style="width: 200px">
                </div>
                <h4>Masukkan Email Anda!</h4>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1"
                            placeholder="Masukkan Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button type="submit"
                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Kirim Link Reset
                            Password</button>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="text-primary">Kembali ke Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

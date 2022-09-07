@extends('frontend.app')
@section('content')
    <section class="error-404">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-content">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="col-md-12">
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-3 text-end control-label col-form-label">Email <span
                                            style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $request->email ?? old('email') }}" required autocomplete="email"
                                            autofocus placeholder="Masukkan Alamat Elamil" style="background-color:#f7f9fe">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="password" class="col-sm-3 text-end control-label col-form-label">Password
                                        <span style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                            placeholder="Masukkan Password Baru" name="password" id="password"
                                            autocomplete="new-password" style="background-color:#f7f9fe">
                                        @error('password')
                                            <div class="alert alert-danger mt-2">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="password_confirmation"
                                        class="col-sm-3 text-end control-label col-form-label">Konfirmasi Password
                                        <span style="color:red">*</span></label>
                                    <div class="col-sm-9">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                        required autocomplete="new-password" placeholder="Masukkan Konfirmasi Password Baru" style="background-color:#f7f9fe">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-skincolor mb-4">Reset
                                Password</button>
                        </form>
                    </div>
                    <a class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-skincolor mb-15" href="{{ route('home') }}">Back To
                        Home</a>
                </div>
            </div>
        </div>
    </section>
@endsection

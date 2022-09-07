@extends('frontend.app')
@section('content')
        <section class="error-404">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-content">
                            @if (session('status'))
                                <div class="alert alert-primary" role="alert">
                                    A reset password link has been emailed to you!
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-3 text-end control-label col-form-label">Masukkan Email
                                        <span style="color:red">*</span></label>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="email" type="email" style="background-color:#f7f9fe"
                                                class="form-control @error('email') is-invalid @enderror"
                                                required="required" autocomplete="off">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-skincolor mb-4">Reset
                                    Password</button>
                            </form>
                        </div>
                        <a class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-skincolor mb-15"
                            href="{{ route('home') }}">Back To
                            Home</a>
                    </div>
                </div>
            </div>
        </section>
    @endsection
      
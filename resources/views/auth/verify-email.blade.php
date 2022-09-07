@extends('frontend.app')
@section('content')
    <section class="error-404">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-content">
                        <div class="alert alert-primary" role="alert">
                            <ul class="ttm-list ttm-list-style-icon">
                                <li>Email telah dikirim ke alamat anda. Mohon periksa inbox.</li>
                            </ul>
                        </div>
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-primary" role="alert">
                                A new email verification link has been emailed to you!
                            </div>
                        @endif
                        <form method="POST" action="{{ route('verification.send') }}" class="text-center">
                            @csrf
                            <button type="submit" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-skincolor mb-4">Resend
                                verification email
                            </button>
                        </form>
                    </div>
                    <a class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-skincolor mb-15" href="{{ route('home') }}">Back To
                        Home</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow">
                <div class="card-body p-4">

                    <h2 class="text-center mb-4">
                        Đăng nhập
                    </h2>

                    <form id="loginForm" action="{{ route('login') }}" method="POST" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                value="{{ old('email') }}"
                                required>
                            <div class="text-danger small" id="emailError"></div>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Mật khẩu
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                required>
                            <div class="text-danger small" id="passwordError"></div>

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember">

                            <label class="form-check-label" for="remember">
                                Ghi nhớ đăng nhập
                            </label>
                        </div>

                        <button class="btn btn-dark w-100">
                            Đăng nhập
                        </button>
                    </form>

                    <hr>

                    <a href="{{ route('google.login') }}"
                       class="btn btn-danger w-100">

                        <i class="bi bi-google"></i>

                        Đăng nhập bằng Google
                    </a>

                    <div class="text-center mt-4">

                        Chưa có tài khoản?

                        <a href="{{ route('register') }}">
                            Đăng ký ngay
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection



@section('scripts')

<script src="{{ asset('js/auth/login.js') }}"></script>

@endsection
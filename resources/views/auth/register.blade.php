@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-body p-4">

                    <h2 class="text-center mb-4">
                        Đăng ký tài khoản
                    </h2>

                    <form id="registerForm" action="{{ route('register') }}" method="POST" novalidate>

                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                Họ và tên
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                required
                                >
                            <div class="text-danger small" id="nameError"></div>

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control @error('email') is-invalid @enderror"
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
                                Số điện thoại
                            </label>

                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}">
                            <div class="text-danger small" id="phoneError"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Mật khẩu
                            </label>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                required>
                            <div class="text-danger small" id="passwordError"></div>

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                Xác nhận mật khẩu
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="form-control"
                                required>
                            <div class="text-danger small" id="confirmError"></div>
                        </div>

                        <button class="btn btn-dark w-100">
                            Đăng ký
                        </button>

                    </form>

                    <hr>

                    <div class="text-center">

                        Đã có tài khoản?

                        <a href="{{ route('login') }}">
                            Đăng nhập
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
@endsection


@section('scripts')

<script src="{{ asset('js/auth/register.js') }}"></script>

@endsection


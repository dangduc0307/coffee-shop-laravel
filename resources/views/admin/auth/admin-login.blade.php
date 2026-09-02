@extends('layouts.admin')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-body p-4">

                    <h2 class="text-center mb-4">
                        Đăng nhập quản trị
                    </h2>


                    @if (session('status'))

                        <div class="alert alert-success">

                            {{ session('status') }}

                        </div>

                    @endif


                    <form
                        id="adminLoginForm"
                        action="{{ route('admin.login') }}"
                        method="POST"
                        novalidate>

                        @csrf


                        {{-- Email --}}

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                value="{{ old('email') }}"
                                required>

                            <div
                                class="text-danger small"
                                id="emailError">
                            </div>

                            @error('email')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Password --}}

                        <div class="mb-3">

                            <label class="form-label">
                                Mật khẩu
                            </label>

                            {{-- <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                required> --}}

                            {{-- PASSWORD WRAPPER --}}

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control pe-5 @error('password') is-invalid @enderror"
                                    required
                                >


                                {{-- TOGGLE PASSWORD --}}

                                <span
                                    id="toggle-password"
                                    class="password-toggle"
                                    role="button"
                                    aria-label="Hiển thị mật khẩu"
                                >

                                    <i class="bi bi-eye"></i>

                                </span>

                            </div>

                            <div
                                class="text-danger small"
                                id="passwordError">
                            </div>

                            @error('password')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Remember --}}

                        <div class="form-check mb-3">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember">

                            <label
                                class="form-check-label"
                                for="remember">

                                Ghi nhớ đăng nhập

                            </label>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-dark w-100">

                            Đăng nhập quản trị

                        </button>

                    </form>

                    <div class="text-center mt-3">

                        <a href="{{ route('admin.password.request') }}">
                            Đổi mật khẩu
                        </a>

                    </div>


                    <div class="text-center mt-4">

                        <a href="{{ route('login') }}">
                            Quay lại đăng nhập người dùng
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection


@section('scripts')

<script src="{{ asset('js/auth/admin-login.js') }}"></script>

@endsection
@extends('layouts.admin')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-body p-4">

                    <h2 class="text-center mb-4">
                        Đặt lại mật khẩu
                    </h2>


                    <p class="text-muted text-center mb-4">

                        Nhập mật khẩu mới cho tài khoản của bạn.

                    </p>


                    <form
                        action="{{ route('admin.password.update') }}"
                        method="POST">

                        @csrf


                        {{-- Token --}}

                        <input
                            type="hidden"
                            name="token"
                            value="{{ $token }}">


                        {{-- Email --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Email

                            </label>


                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', $email) }}"
                                class="form-control @error('email') is-invalid @enderror"
                                readonly>


                            @error('email')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        {{-- Password --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Mật khẩu mới

                            </label>


                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Nhập mật khẩu mới"
                                required>


                            @error('password')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        {{-- Confirm password --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Xác nhận mật khẩu mới

                            </label>


                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Nhập lại mật khẩu mới"
                                required>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-dark w-100">

                            Đặt lại mật khẩu

                        </button>

                    </form>


                    <div class="text-center mt-4">

                        <a href="{{ route('admin.login') }}">

                            Quay lại đăng nhập quản trị

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
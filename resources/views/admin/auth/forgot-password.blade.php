@extends('layouts.admin')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-body p-4">

                    <h2 class="text-center mb-4">
                        Đổi mật khẩu
                    </h2>


                    <p class="text-muted text-center mb-4">

                        Nhập email bạn đã đăng ký.
                        Chúng tôi sẽ gửi liên kết để bạn đặt lại mật khẩu.

                    </p>


                    {{-- Thông báo thành công --}}

                    @if (session('status'))

                        <div class="alert alert-success">

                            {{ session('status') }}

                        </div>

                    @endif


                    <form
                        action="{{ route('admin.password.email') }}"
                        method="POST">

                        @csrf


                        {{-- Email --}}

                        <div class="mb-3">

                            <label class="form-label">

                                Email

                            </label>


                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Nhập email của bạn"
                                required
                                autofocus>


                            @error('email')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        <button
                            type="submit"
                            class="btn btn-dark w-100">

                            Gửi liên kết đổi mật khẩu

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
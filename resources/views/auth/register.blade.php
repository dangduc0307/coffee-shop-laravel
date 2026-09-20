@extends('layouts.app')

@section('content')

<div class="container py-5 register-page">

    <div class="row justify-content-center align-items-center g-5">

        {{-- =====================================================
             GIỚI THIỆU WEBLIST
        ====================================================== --}}

        <div class="col-lg-6 register-intro">

            <div class="register-intro-content">

                <div class="register-intro-line"></div>

                <p class="register-intro-small">
                    WEBLIST
                </p>

                <h1 class="register-intro-title">
                    Bắt đầu hành trình
                    <br>
                    <span>của bạn.</span>
                </h1>

                <p class="register-intro-description">
                    Tạo tài khoản để khám phá và sử dụng
                    những sản phẩm website & digital products
                    được xây dựng dành cho bạn.
                </p>

                <div class="register-intro-divider"></div>

                <div class="register-intro-features">

                    <div class="register-intro-feature">

                        <i class="bi bi-person-plus"></i>

                        <div>
                            <strong>Tạo tài khoản nhanh chóng</strong>

                            <span>
                                Đăng ký đơn giản và bắt đầu sử dụng ngay.
                            </span>
                        </div>

                    </div>


                    <div class="register-intro-feature">

                        <i class="bi bi-box-seam"></i>

                        <div>
                            <strong>Khám phá sản phẩm</strong>

                            <span>
                                Tìm kiếm những website & digital products phù hợp.
                            </span>
                        </div>

                    </div>


                    <div class="register-intro-feature">

                        <i class="bi bi-person-check"></i>

                        <div>
                            <strong>Thông tin của bạn</strong>

                            <span>
                                Quản lý tài khoản và những sản phẩm đã sử dụng.
                            </span>
                        </div>

                    </div>

                </div>


                <div class="register-intro-quote">

                    <span>“</span>

                    Mọi hành trình đều bắt đầu từ một bước đầu tiên.

                </div>

            </div>

        </div>


        {{-- =====================================================
             REGISTER
        ====================================================== --}}

        <div class="col-lg-6 register-form-column">

            <div class="card shadow-sm register-card">

                <div class="card-body p-4">

                    <h2 class="text-center mb-4 register-title">
                        Đăng ký tài khoản
                    </h2>


                    <form
                        id="registerForm"
                        action="{{ route('register') }}"
                        method="POST"
                        novalidate>

                        @csrf


                        {{-- HỌ VÀ TÊN --}}

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
                                required>

                            <div
                                class="text-danger small"
                                id="nameError">
                            </div>

                            @error('name')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- EMAIL --}}

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


                        {{-- SỐ ĐIỆN THOẠI --}}

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

                            <div
                                class="text-danger small"
                                id="phoneError">
                            </div>

                        </div>


                        {{-- MẬT KHẨU --}}

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


                        {{-- XÁC NHẬN MẬT KHẨU --}}

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

                            <div
                                class="text-danger small"
                                id="confirmError">
                            </div>

                        </div>


                        {{-- BUTTON --}}

                        <button
                            type="submit"
                            class="btn register-btn w-100">

                            Đăng ký tài khoản

                        </button>

                    </form>


                    <div class="register-or">

                        <span>hoặc</span>

                    </div>


                    <div class="text-center register-login">

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


<style>

/* =========================================================
   REGISTER PAGE
========================================================= */

.register-page {
    min-height: calc(100vh - 100px);

    padding-top: 40px;
    padding-bottom: 40px;
}


/* =========================================================
   INTRO
========================================================= */

.register-intro {
    display: flex;
    align-items: center;
}

.register-intro-content {
    max-width: 540px;
    padding: 20px 10px;
}


/* DÒNG NHỎ */

.register-intro-line {
    width: 55px;
    height: 4px;

    border-radius: 10px;

    background: var(--main-color);

    margin-bottom: 18px;
}


.register-intro-small {
    color: var(--title-color);

    font-size: 0.85rem;

    font-weight: 700;

    letter-spacing: 3px;

    margin-bottom: 12px;
}


/* TITLE */

.register-intro-title {
    color: #2b1404;

    font-size: clamp(2.4rem, 5vw, 4rem);

    font-weight: 700;

    line-height: 1.1;

    margin-bottom: 22px;
}

.register-intro-title span {
    color: var(--title-color);
}


/* DESCRIPTION */

.register-intro-description {
    color: #2b1404;

    font-size: 1.05rem;

    line-height: 1.8;

    max-width: 500px;

    margin-bottom: 25px;
}


.register-form-column{
    background: #976017;
    padding: 20px 0;
}

/* DIVIDER */

.register-intro-divider {
    width: 100%;
    height: 1px;

    background: var(--border-color);

    opacity: 0.7;

    margin-bottom: 25px;
}


/* FEATURES */

.register-intro-features {
    display: flex;

    flex-direction: column;

    gap: 18px;
}


.register-intro-feature {
    display: flex;

    align-items: center;

    gap: 15px;
}


.register-intro-feature > i {
    width: 42px;
    height: 42px;

    display: flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 10px;

    background: #e9d3b4;

    color: var(--title-color);

    font-size: 1.1rem;
}


.register-intro-feature strong {
    display: block;

    color: #2b1404;

    font-size: 0.95rem;

    margin-bottom: 2px;
}


.register-intro-feature span {
    display: block;

    color: #976017;

    font-size: 0.85rem;
}


/* QUOTE */

.register-intro-quote {
    margin-top: 32px;

    padding-left: 18px;

    border-left: 3px solid var(--border-color);

    color: var(--title-color);

    font-size: 0.9rem;

    font-style: italic;

    line-height: 1.6;
}


.register-intro-quote > span {
    color: var(--title-color);

    font-size: 1.5rem;

    font-weight: 700;
}


/* =========================================================
   REGISTER FORM
========================================================= */

.register-form-column {
    display: flex;

    justify-content: center;
}


.register-card {
    width: 100%;

    max-width: 520px;

    border: 1px solid var(--border-color);

    border-radius: 15px;

    overflow: hidden;

    background: #fff;
}


.register-card .card-body {
    padding: 35px !important;
}


/* TITLE */

.register-title {
    color: var(--title-color);

    font-weight: 700;
}


/* LABEL */

.register-card .form-label {
    color: #2b1404;

    font-weight: 600;
}


/* INPUT */

.register-card .form-control {
    border: 1px solid var(--border-color);

    border-radius: 8px;

    padding: 10px 13px;

    transition:
        border-color 0.25s ease,
        box-shadow 0.25s ease,
        transform 0.25s ease;
}


.register-card .form-control:focus {
    border-color: var(--title-color);

    box-shadow:
        0 0 0 0.2rem rgba(151, 96, 23, 0.15);

    transform: translateY(-1px);
}


/* =========================================================
   REGISTER BUTTON
========================================================= */

.register-btn {
    background: var(--main-color);

    border: none;

    color: #fff;

    font-weight: 600;

    padding: 11px;

    border-radius: 8px;

    transition: 0.25s ease;
}


.register-btn:hover {
    opacity: 0.9;

    color: #fff;

    transform: translateY(-1px);
}


/* =========================================================
   OR
========================================================= */

.register-or {
    display: flex;

    align-items: center;

    gap: 12px;

    margin: 20px 0;

    color: var(--title-color);

    font-size: 0.8rem;
}


.register-or::before,
.register-or::after {
    content: "";

    flex: 1;

    height: 1px;

    background: var(--border-color);
}


.register-or span {
    white-space: nowrap;
}


/* =========================================================
   LOGIN LINK
========================================================= */

.register-login {
    color: #2b1404;

    font-size: 0.9rem;
}


.register-card a {
    color: var(--title-color);

    font-weight: 500;

    text-decoration: none;

    transition: color 0.2s ease;
}


.register-card a:hover {
    color: #2b1404;

    text-decoration: underline;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991.98px) {

    .register-page {
        padding-top: 30px;

        padding-bottom: 40px;
    }


    .register-intro {
        justify-content: center;

        text-align: center;
    }


    .register-intro-content {
        max-width: 650px;
    }


    .register-intro-line {
        margin-left: auto;

        margin-right: auto;
    }


    .register-intro-description {
        margin-left: auto;

        margin-right: auto;
    }


    .register-intro-divider {
        max-width: 500px;

        margin-left: auto;

        margin-right: auto;
    }


    .register-intro-feature {
        text-align: left;
    }


    .register-intro-quote {
        text-align: left;
    }

}


@media (max-width: 575.98px) {

    .register-intro-title {
        font-size: 2.4rem;
    }


    .register-intro-description {
        font-size: 0.95rem;
    }


    .register-intro-feature span {
        font-size: 0.8rem;
    }


    .register-card .card-body {
        padding: 25px !important;
    }

}

</style>


@section('scripts')

<script src="{{ asset('js/auth/register.js') }}"></script>

@endsection
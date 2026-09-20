@extends('layouts.app')

@section('content')

<div class="container py-5 login-page">

    <div class="row justify-content-center align-items-center g-5">

        {{-- =====================================================
             GIỚI THIỆU WEBLIST
        ====================================================== --}}

        <div class="col-lg-6 login-intro">

            <div class="intro-content">

                <div class="intro-line"></div>

                <p class="intro-small">
                    WEBLIST
                </p>

                <h1 class="intro-title">
                    Chào mừng bạn
                    <br>
                    <span>trở lại.</span>
                </h1>

                <p class="intro-description">
                    Đăng nhập để tiếp tục khám phá và sử dụng
                    những sản phẩm website & digital products
                    được xây dựng dành cho bạn.
                </p>

                <div class="intro-divider"></div>

                <div class="intro-features">

                    <div class="intro-feature">
                        <i class="bi bi-window"></i>

                        <div>
                            <strong>Website hiện đại</strong>
                            <span>Thiết kế tập trung vào trải nghiệm.</span>
                        </div>
                    </div>

                    <div class="intro-feature">
                        <i class="bi bi-lightning"></i>

                        <div>
                            <strong>Sẵn sàng sử dụng</strong>
                            <span>Những sản phẩm được xây dựng để đi vào thực tế.</span>
                        </div>
                    </div>

                    <div class="intro-feature">
                        <i class="bi bi-code-slash"></i>

                        <div>
                            <strong>Digital Products</strong>
                            <span>Các giải pháp số dành cho những ý tưởng của bạn.</span>
                        </div>
                    </div>

                </div>

                <div class="intro-quote">
                    <span>“</span>
                    Một ý tưởng tốt nên được biến thành một sản phẩm tốt.
                </div>

            </div>

        </div>


        {{-- =====================================================
             LOGIN
        ====================================================== --}}

        <div class="col-lg-6 login-form-column">


            <div class="card shadow-sm login-card">

                <div class="card-body p-4">

                    <h2 class="text-center mb-4 login-title">
                        Đăng nhập
                    </h2>

                    <form id="loginForm"
                          action="{{ route('login') }}"
                          method="POST"
                          novalidate>

                        @csrf

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

                            <div class="text-danger small"
                                 id="emailError"></div>

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

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control pe-5 @error('password') is-invalid @enderror"
                                    required>

                                <span
                                    id="toggle-password"
                                    class="password-toggle"
                                    role="button"
                                    aria-label="Hiển thị mật khẩu">

                                    <i class="bi bi-eye"></i>

                                </span>

                            </div>

                            <div class="text-danger small"
                                 id="passwordError"></div>

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

                            <label
                                class="form-check-label"
                                for="remember">

                                Ghi nhớ đăng nhập

                            </label>

                        </div>


                        <button
                            type="submit"
                            class="btn login-btn w-100"
                            style="color: #fff">

                            Đăng nhập

                        </button>

                    </form>


                    <div class="login-or">
                        <span>hoặc</span>
                    </div>


                    <a
                        href="{{ route('google.login') }}"
                        class="btn google-btn w-100">

                        <i class="bi bi-google"></i>

                        Đăng nhập bằng Google

                    </a>


                    <div class="text-center mt-3">

                        <a href="{{ route('password.request') }}">
                            Đổi mật khẩu
                        </a>

                    </div>


                    <div class="text-center mt-4 login-register">

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


<style>
    /* =========================================================
    LOGIN INTRO
    ========================================================= */

    .login-intro {
        display: flex;
        align-items: center;
    }

    .intro-content {
        max-width: 540px;
        padding: 20px 10px;
    }

    /* DÒNG NHỎ TRÊN CÙNG */

    .intro-line {
        width: 55px;
        height: 4px;

        border-radius: 10px;

        background: var(--main-color);

        margin-bottom: 18px;
    }

    .intro-small {
        color: var(--title-color);

        font-size: 0.85rem;

        font-weight: 700;

        letter-spacing: 3px;

        margin-bottom: 12px;
    }

    /* TITLE */

    .intro-title {
        color: #2b1404;

        font-size: clamp(2.4rem, 5vw, 4rem);

        font-weight: 700;

        line-height: 1.1;

        margin-bottom: 22px;
    }

    .intro-title span {
        color: var(--title-color);
    }

    /* DESCRIPTION */

    .intro-description {
        color: #2b1404;

        font-size: 1.05rem;

        line-height: 1.8;

        max-width: 500px;

        margin-bottom: 25px;
    }

    /* DIVIDER */

    .intro-divider {
        width: 100%;
        height: 1px;

        background: var(--border-color);

        opacity: 0.7;

        margin-bottom: 25px;
    }

    /* FEATURES */

    .intro-features {
        display: flex;
        flex-direction: column;

        gap: 18px;
    }

    .intro-feature {
        display: flex;
        align-items: center;

        gap: 15px;
    }

    .login-btn {
        background: var(--main-color);
        border: none;
        color: #fff;
        font-weight: 600;
        padding: 11px;
        border-radius: 8px;
        transition: 0.25s ease;
    }

    .login-btn:hover {
        opacity: 0.9;
        color: var(--text-color);
        transform: translateY(-1px);
    }

    .intro-feature > i {
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

    .intro-feature strong {
        display: block;

        color: #2b1404;

        font-size: 0.95rem;

        margin-bottom: 2px;
    }

    .intro-feature span {
        display: block;

        color: #976017;

        font-size: 0.85rem;
    }


    .login-form-column{
        background: #976017;
        padding: 20px 0;
    }

    /* QUOTE */

    .intro-quote {
        margin-top: 32px;

        padding-left: 18px;

        border-left: 3px solid var(--border-color);

        color: var(--title-color);

        font-size: 0.9rem;

        font-style: italic;

        line-height: 1.6;
    }

    .intro-quote > span {
        color: var(--title-color);

        font-size: 1.5rem;

        font-weight: 700;
    }


    /* =========================================================
    LOGIN OR
    ========================================================= */

    .login-or {
        display: flex;
        align-items: center;

        gap: 12px;

        margin: 20px 0;

        color: var(--title-color);

        font-size: 0.8rem;
    }

    .login-or::before,
    .login-or::after {
        content: "";

        flex: 1;

        height: 1px;

        background: var(--border-color);
    }

    .login-or span {
        white-space: nowrap;
    }


    /* =========================================================
    LOGIN REGISTER
    ========================================================= */

    .login-register {
        color: #2b1404;
        font-size: 0.9rem;
    }


    /* =========================================================
    RESPONSIVE
    ========================================================= */

    @media (max-width: 991.98px) {

        .login-page {
            padding-top: 30px;
            padding-bottom: 40px;
        }

        .login-intro {
            justify-content: center;

            text-align: center;
        }

        .intro-content {
            max-width: 650px;
        }

        .intro-line {
            margin-left: auto;
            margin-right: auto;
        }

        .intro-description {
            margin-left: auto;
            margin-right: auto;
        }

        .intro-divider {
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .intro-feature {
            text-align: left;
        }

        .intro-quote {
            text-align: left;
        }

    }


    @media (max-width: 575.98px) {

        .intro-title {
            font-size: 2.4rem;
        }

        .intro-description {
            font-size: 0.95rem;
        }

        .intro-feature span {
            font-size: 0.8rem;
        }

        .login-card .card-body {
            padding: 25px !important;
        }

    }
</style>
@section('scripts')

<script src="{{ asset('js/auth/login.js') }}"></script>

@endsection
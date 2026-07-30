<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">

</head>

<body>
    @include('partials.header')

    <main>
        <!-- Danh sách liên kết sidebar -->
        <div class="list position-fixed top-10 start-0 m-3">
          <button
            class="btn btn-dark"
            data-bs-toggle="offcanvas"
            data-bs-target="#menuCanvas"
          >
            <i class="bi bi-list"></i>
          </button>
        </div>
        <div class="offcanvas offcanvas-start" id="menuCanvas">
          <div class="offcanvas-header">
            <a href="" class="logo-link-sideBar"
              ><img
                src="{{ asset('images/LOGO.png') }}"
                alt="LOGO"
                class="logo-img rounded-circle"
            /></a>

            <button class="btn-close" data-bs-dismiss="offcanvas"></button>
          </div>

          <div class="offcanvas-body d-flex flex-column gap-3">
            <a href="/" class="pages-link-sideBar d-block {{ request()->is('/') ? 'active' : '' }}"> Trang chủ </a>
            <a href="{{ route('shop.index') }}" class="pages-link-sideBar d-block {{ request()->is('shop') ? 'active' : '' }}"> Sản phẩm </a>
            <a href="#" class="pages-link-sideBar d-block"> Giới thiệu </a>
            <a href="#" class="pages-link-sideBar d-block"> Về chúng tôi </a>
            <a href="#" class="pages-link-sideBar d-block"> Liên hệ </a>
            <span style="border-bottom: 1px solid #fff; display: block"></span>
            <div class="d-flex align-items-center">
              <!-- Đăng nhập trong side bar -->
              <div class="auth flex-grow-0 d-flex">
                <div class="auth-login">
                  @if(Auth::check())
                      <a href="{{ route('users.show', Auth::id()) }}"
                          class="auth-login-link">
                          <i class="bi bi-person-circle"></i>
                      </a>
                  @else
                      <a href="{{ route('login') }}" class="auth-login-link">
                          <i class="bi bi-box-arrow-right"></i>
                      </a>
                  @endif
                </div>
              </div>

              <!-- Giỏ hàng trong side bar -->
              <div class="cart flex-shrink-0 justify-content-center ms-4">
                <a href="{{ route('carts.index') }}" class="cart-link"><i class="bi bi-cart3"></i></a>
                <span class="cart-count">0</span>
              </div>
            </div>
          </div>
        </div>
        @yield('content')
    </main>

    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="{{ asset('js/app/app.js') }}"></script>
    @yield('scripts')
    

</body>
</html>
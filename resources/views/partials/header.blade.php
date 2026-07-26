
  <header
    class="d-flex justify-content-between align-items-center flex-column flex-lg-row gap-3 pt-4"
  >
    <!--flex-column: nếu là hiển thị trên điện thoại thì nó sẽ xếp dọc các phần tử bên trong nó-->
    <!-- flex-lg-row: nếu là hiển thị trên màn hình lớn (≥ 992px) trở lên thì nó sẽ xếp ngang lại các phần tử -->
    <!-- Logo của trang -->
    <div class="logo flex-shrink-0">
      <a href="" class="logo-link"
        ><img
          src="{{ asset('/images/LOGO.png') }}"
          alt="LOGO"
          class="logo-img rounded-circle"
      /></a>
    </div>

    <!-- Các trang liên kết -->
    <div
      class="pages flex-grow-1 d-none d-lg-flex d-flex flex-wrap flex-column flex-lg-row justify-content-center gap-3"
    >
      <!--flex-wrap: không cho các chữ xuống hàng-->
      <a href="/" class="pages-link">Trang chủ</a>
      <a href="product.html" class="pages-link">Sản phẩm</a>
      <a href="introduce.html" class="pages-link">Giới thiệu</a>
      <a href="" class="pages-link">Về chúng tôi</a>
      <a href="" class="pages-link">Liên hệ</a>
    </div>

    <!-- Thanh tìm kiếm -->
    <div class="find flex-grow-1 d-flex">
      <div class="search-box">
        <input class="find-input" type="text" placeholder="Tìm kiếm..." />
        <button class="find-btn">
          <i class="bi bi-search"></i>
        </button>
      </div>
    </div>

    <!-- Giỏ hàng -->
    <div
      class="cart flex-shrink-0 justify-content-center me-3 d-none d-lg-flex"
    >
      <a href="cart.html" class="cart-link"><i class="bi bi-cart3"></i></a>
      <div class="cart-information">
        <span><i class="bi bi-cart-x"></i> Chưa có sản phẩm nào</span>
      </div>
    </div>

    <!-- Đăng nhập -->
    <div class="auth flex-grow-0 d-flex d-none d-lg-flex gap-2">
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
  </header>


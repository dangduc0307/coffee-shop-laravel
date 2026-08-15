<aside class="sidebar">

    {{-- Logo --}}
    <div class="sidebar-logo">

        <i class="bi bi-shop-window"></i>

        <div>

            <h5 class="mb-0">MyShop</h5>

            <small>Admin Panel</small>

        </div>

    </div>

    {{-- Menu --}}
    <nav class="sidebar-menu">

        <a href="{{ route('admin.dashboard') }}"
        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>

        <span class="menu-title">
            Quản lý
        </span>

        <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.index') ? 'active' : '' }}">
            <i class="bi bi-grid"></i>
            Danh mục
        </a>

        <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
            <i class="bi bi-box-seam"></i>
            Sản phẩm
        </a>

        <a href="{{ route('admin.orders.index') }}", class="{{ request()->routeIs('admin.orders.index') ? 'active': '' }}">
            <i class="bi bi-bag-check"></i>
            Đơn hàng
        </a>

        <a href="{{ route('admin.payments.index') }}" class="{{ request()->routeIs('admin.payments.index') ? 'active' : '' }}">
            <i class="bi bi-credit-card"></i>
            Thanh toán
        </a>

        <a href="#">
            <i class="bi bi-arrow-counterclockwise"></i>
            Hoàn tiền
        </a>

        <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
            <i class="bi bi-people"></i>
            Người dùng
        </a>

        <span class="menu-title">

            Hệ thống

        </span>

        <a href="#">
            <i class="bi bi-images"></i>
            Slider
        </a>

        <a href="{{ route('admin.notifications.index') }}" class="{{ request()->routeIs('admin.notifications.index') ? 'active' : '' }}">
            <i class="bi bi-bell"></i>
            Thông báo
        </a>

        <a href="#">
            <i class="bi bi-gear"></i>
            Cài đặt
        </a>

    </nav>

    {{-- User --}}
    @auth
        <div class="sidebar-user">

            <div class="avatar">

                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

            </div>

            <div>

                <strong>{{ auth()->user()->name }}</strong>

                <small>Quản trị viên</small>

            </div>

        </div>
    @endauth

</aside>
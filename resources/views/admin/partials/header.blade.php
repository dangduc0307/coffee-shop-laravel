<header class="admin-header">

    <div class="header-left">

        <h4 class="mb-0">

            @yield('page-title','Dashboard')

        </h4>

    </div>


    <div class="header-right">

        <button class="btn btn-light position-relative">

            <i class="bi bi-bell"></i>

            <span
                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                0

            </span>

        </button>


        @auth

            <div class="dropdown">

                <button
                    class="btn btn-light dropdown-toggle"
                    data-bs-toggle="dropdown">

                    {{ auth()->user()->name }}

                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>

                        <a
                            class="dropdown-item"
                            href="#">

                            Hồ sơ

                        </a>

                    </li>

                    <li>

                        <a
                            class="dropdown-item"
                            href="#">

                            Đổi mật khẩu

                        </a>

                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>

                        <form
                            action="{{ route('admin-logout') }}"
                            method="POST">

                            @csrf

                            <button
                                type="submit"
                                class="dropdown-item">

                                Đăng xuất

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        @else

            <a
                href="{{ route('admin.login') }}"
                class="btn btn-light">

                Đăng nhập

            </a>

        @endauth

    </div>

</header>
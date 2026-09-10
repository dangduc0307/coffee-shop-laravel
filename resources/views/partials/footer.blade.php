<footer class="mt-5">

    {{-- FOOTER MAIN --}}
    <div
        class="py-5"
        style="
            background: linear-gradient(to right, #2b1404, #976017);
            color: #fff;
        "
    >

        <div class="container">

            <div class="row g-4">

                {{-- BRAND --}}
                <div class="col-12 col-md-6 col-lg-4">

                    <div class="d-flex align-items-center mb-3">

                        <img
                            src="{{ asset('images/LOGOWEB.png') }}"
                            alt="WebList"
                            width="55"
                            height="55"
                            class="rounded-circle bg-white p-1"
                        >

                        <div class="ms-3">
                            <h5 class="fw-bold mb-0">
                                WebList
                            </h5>

                            <small class="opacity-75">
                                Website & Digital Products
                            </small>
                        </div>

                    </div>

                    <p class="mb-0 opacity-75"
                       style="line-height: 1.8;">
                        Cung cấp những website được thiết kế chuyên nghiệp,
                        hiện đại và sẵn sàng sử dụng. Tiết kiệm thời gian,
                        chi phí và nhanh chóng đưa dự án của bạn lên Internet.
                    </p>

                </div>


                {{-- NAVIGATION --}}
                <div class="col-6 col-md-3 col-lg-2">

                    <h6 class="fw-bold mb-3">
                        Điều hướng
                    </h6>

                    <ul class="list-unstyled mb-0">

                        <li class="mb-2">
                            <a
                                href="{{ url('/') }}"
                                class="text-white text-decoration-none opacity-75"
                            >
                                Trang chủ
                            </a>
                        </li>

                        <li class="mb-2">
                            <a
                                href="{{ route('shop.index') }}"
                                class="text-white text-decoration-none opacity-75"
                            >
                                Sản phẩm
                            </a>
                        </li>

                        <li class="mb-2">
                            <a
                                href="{{ url('/about') }}"
                                class="text-white text-decoration-none opacity-75"
                            >
                                Giới thiệu
                            </a>
                        </li>

                        <li>
                            <a
                                href="{{ url('/contact') }}"
                                class="text-white text-decoration-none opacity-75"
                            >
                                Liên hệ
                            </a>
                        </li>

                    </ul>

                </div>


                {{-- SUPPORT --}}
                <div class="col-6 col-md-3 col-lg-2">

                    <h6 class="fw-bold mb-3">
                        Hỗ trợ
                    </h6>

                    <ul class="list-unstyled mb-0">

                        <li class="mb-2">
                            <a
                                href="{{ route('faq') }}"
                                class="text-white text-decoration-none opacity-75"
                            >
                                Câu hỏi thường gặp
                            </a>
                        </li>

                        <li class="mb-2">
                            <a
                                href="{{ route('privacy-policy') }}"
                                class="text-white text-decoration-none opacity-75"
                            >
                                Chính sách bảo mật
                            </a>
                        </li>

                        <li class="mb-2">
                            <a
                                href="{{ route('terms-of-service') }}"
                                class="text-white text-decoration-none opacity-75"
                            >
                                Điều khoản sử dụng
                            </a>
                        </li>

                        <li>
                            <a
                                href="{{ route('purchase-policy') }}"
                                class="text-white text-decoration-none opacity-75"
                            >
                                Chính sách mua hàng
                            </a>
                        </li>

                    </ul>

                </div>


                {{-- CONTACT --}}
                <div class="col-12 col-lg-4">

                    <h6 class="fw-bold mb-3">
                        Liên hệ
                    </h6>

                    <div class="mb-3 opacity-75">

                        <i class="bi bi-envelope me-2"></i>

                        <span>
                            support@weblist.vn
                        </span>

                    </div>

                    <div class="mb-3 opacity-75">

                        <i class="bi bi-telephone me-2"></i>

                        <span>
                            Hỗ trợ trực tuyến
                        </span>

                    </div>

                    <div class="d-flex gap-2 mt-3">

                        <a
                            href="#"
                            class="btn btn-outline-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px;"
                            aria-label="Facebook"
                        >
                            <i class="bi bi-facebook"></i>
                        </a>

                        <a
                            href="#"
                            class="btn btn-outline-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px;"
                            aria-label="Instagram"
                        >
                            <i class="bi bi-instagram"></i>
                        </a>

                        <a
                            href="#"
                            class="btn btn-outline-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px;"
                            aria-label="Email"
                        >
                            <i class="bi bi-envelope"></i>
                        </a>

                    </div>

                </div>

            </div>


            {{-- DIVIDER --}}
            <hr class="my-4 border-light opacity-25">


            {{-- FOOTER BOTTOM --}}
            <div
                class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2"
            >

                <small class="opacity-75 text-center text-md-start">
                    © {{ date('Y') }} WebList. All rights reserved.
                </small>

                <small class="opacity-75 text-center text-md-end">
                    Website & Digital Products
                </small>

            </div>

        </div>

    </div>

</footer>
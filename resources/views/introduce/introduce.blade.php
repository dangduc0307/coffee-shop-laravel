@extends('layouts.app')

@section('title', 'Giới thiệu')

@section('content')


{{-- =====================================================
     HERO
===================================================== --}}

<section class="introduce-hero">

    <div class="container">

        <div class="introduce-hero-content text-center">

            <span class="introduce-badge reveal-load">
                <i class="bi bi-info-circle me-2"></i>
                VỀ CHÚNG TÔI
            </span>

            <h1 class="reveal-load" style="transition-delay:.1s">
                GIẢI PHÁP WEBSITE
                <span>CHO MỌI DỰ ÁN</span>
            </h1>

            <p class="mx-auto reveal-load" style="transition-delay:.2s">
                Chúng tôi cung cấp những mẫu website và sản phẩm số
                được thiết kế chuyên nghiệp, hiện đại và dễ dàng
                triển khai cho cá nhân, doanh nghiệp và các dự án
                kinh doanh trực tuyến.
            </p>

        </div>

    </div>

</section>


{{-- =====================================================
     ABOUT US
===================================================== --}}

<section class="about-section">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-12 col-lg-6">

                <div class="about-image reveal">

                    <i class="bi bi-code-square"></i>

                </div>

            </div>


            <div class="col-12 col-lg-6">

                <div class="about-content reveal" style="transition-delay:.15s">

                    <h2>
                        CHÚNG TÔI LÀ AI?
                    </h2>

                    <p>
                        Chúng tôi xây dựng một nền tảng cung cấp các
                        website và sản phẩm số dành cho những người
                        muốn nhanh chóng sở hữu một website chuyên nghiệp
                        mà không phải bắt đầu mọi thứ từ con số 0.
                    </p>

                    <p>
                        Mỗi sản phẩm được xây dựng với mục tiêu mang lại
                        giao diện hiện đại, trải nghiệm sử dụng tốt và
                        khả năng tùy chỉnh linh hoạt.
                    </p>

                    <p>
                        Từ website doanh nghiệp, cửa hàng trực tuyến,
                        portfolio cho đến landing page, chúng tôi mong
                        muốn giúp bạn tiết kiệm thời gian và chi phí
                        trong quá trình phát triển dự án.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     VALUES
===================================================== --}}

<section class="values-section">

    <div class="container">

        <div class="text-center mb-5 reveal">

            <h2 class="section-title">
                GIÁ TRỊ CỦA CHÚNG TÔI
            </h2>

            <p class="section-description mt-3">
                Những tiêu chí chúng tôi luôn hướng đến
                trong từng sản phẩm.
            </p>

        </div>


        <div class="row g-4">

            {{-- Value 1 --}}
            <div class="col-12 col-md-6 col-lg-4">

                <div class="value-card reveal">

                    <div class="value-icon">
                        <i class="bi bi-palette"></i>
                    </div>

                    <h4>
                        Thiết kế chuyên nghiệp
                    </h4>

                    <p>
                        Giao diện được chú trọng về bố cục,
                        màu sắc và trải nghiệm người dùng để
                        tạo nên một website hiện đại.
                    </p>

                </div>

            </div>


            {{-- Value 2 --}}
            <div class="col-12 col-md-6 col-lg-4">

                <div class="value-card reveal"
                     style="transition-delay:.1s">

                    <div class="value-icon">
                        <i class="bi bi-phone"></i>
                    </div>

                    <h4>
                        Responsive
                    </h4>

                    <p>
                        Các website được thiết kế để hoạt động
                        tốt trên máy tính, tablet và điện thoại.
                    </p>

                </div>

            </div>


            {{-- Value 3 --}}
            <div class="col-12 col-md-6 col-lg-4">

                <div class="value-card reveal"
                     style="transition-delay:.2s">

                    <div class="value-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>

                    <h4>
                        Tiết kiệm thời gian
                    </h4>

                    <p>
                        Sử dụng sản phẩm có sẵn giúp bạn rút ngắn
                        thời gian phát triển và nhanh chóng đưa
                        dự án vào hoạt động.
                    </p>

                </div>

            </div>


            {{-- Value 4 --}}
            <div class="col-12 col-md-6 col-lg-4">

                <div class="value-card reveal"
                     style="transition-delay:.3s">

                    <div class="value-icon">
                        <i class="bi bi-code-slash"></i>
                    </div>

                    <h4>
                        Dễ tùy chỉnh
                    </h4>

                    <p>
                        Cấu trúc rõ ràng giúp bạn dễ dàng thay đổi
                        nội dung, giao diện và phát triển thêm
                        các chức năng.
                    </p>

                </div>

            </div>


            {{-- Value 5 --}}
            <div class="col-12 col-md-6 col-lg-4">

                <div class="value-card reveal"
                     style="transition-delay:.4s">

                    <div class="value-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h4>
                        Chất lượng
                    </h4>

                    <p>
                        Chúng tôi hướng đến những sản phẩm có chất lượng
                        tốt, rõ ràng và phù hợp với nhu cầu thực tế.
                    </p>

                </div>

            </div>


            {{-- Value 6 --}}
            <div class="col-12 col-md-6 col-lg-4">

                <div class="value-card reveal"
                     style="transition-delay:.5s">

                    <div class="value-icon">
                        <i class="bi bi-headset"></i>
                    </div>

                    <h4>
                        Hỗ trợ
                    </h4>

                    <p>
                        Luôn hướng đến việc mang lại trải nghiệm
                        thuận tiện cho khách hàng trong quá trình
                        sử dụng sản phẩm.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     PROCESS
===================================================== --}}

<section class="process-section">

    <div class="container">

        <div class="text-center mb-5 reveal">

            <h2 class="section-title">
                QUY TRÌNH MUA WEBSITE
            </h2>

            <p class="section-description mt-3">
                Đơn giản, nhanh chóng và thuận tiện.
            </p>

        </div>


        <div class="row g-4">

            {{-- Step 1 --}}
            <div class="col-12 col-md-6 col-lg-3">

                <div class="process-card reveal">

                    <div class="process-number">
                        1
                    </div>

                    <h5>
                        Chọn sản phẩm
                    </h5>

                    <p>
                        Tìm kiếm và lựa chọn website
                        phù hợp với nhu cầu của bạn.
                    </p>

                </div>

            </div>


            {{-- Step 2 --}}
            <div class="col-12 col-md-6 col-lg-3">

                <div class="process-card reveal"
                     style="transition-delay:.1s">

                    <div class="process-number">
                        2
                    </div>

                    <h5>
                        Thanh toán
                    </h5>

                    <p>
                        Thực hiện thanh toán nhanh chóng
                        thông qua hệ thống của chúng tôi.
                    </p>

                </div>

            </div>


            {{-- Step 3 --}}
            <div class="col-12 col-md-6 col-lg-3">

                <div class="process-card reveal"
                     style="transition-delay:.2s">

                    <div class="process-number">
                        3
                    </div>

                    <h5>
                        Tải sản phẩm
                    </h5>

                    <p>
                        Sau khi thanh toán thành công,
                        bạn có thể tải sản phẩm về.
                    </p>

                </div>

            </div>


            {{-- Step 4 --}}
            <div class="col-12 col-md-6 col-lg-3">

                <div class="process-card reveal"
                     style="transition-delay:.3s">

                    <div class="process-number">
                        4
                    </div>

                    <h5>
                        Bắt đầu sử dụng
                    </h5>

                    <p>
                        Cài đặt, tùy chỉnh và bắt đầu
                        phát triển website của riêng bạn.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     TECHNOLOGY
===================================================== --}}

<section class="technology-section">

    <div class="container">

        <div class="technology-box reveal">

            <div class="row align-items-center g-4">

                <div class="col-12 col-lg-6">

                    <div class="technology-content reveal">

                        <h2>
                            ĐƯỢC XÂY DỰNG VỚI CÔNG NGHỆ HIỆN ĐẠI
                        </h2>

                        <p>
                            Các sản phẩm được phát triển dựa trên những
                            công nghệ web phổ biến và hiện đại, giúp website
                            dễ dàng triển khai, tùy chỉnh và mở rộng.
                        </p>

                    </div>

                </div>


                <div class="col-12 col-lg-6">

                    <div class="row g-3">

                        {{-- HTML / CSS --}}
                        <div class="col-6">

                            <div class="technology-item reveal">

                                <i class="bi bi-filetype-html"></i>

                                <h6>
                                    HTML / CSS
                                </h6>

                            </div>

                        </div>


                        {{-- Bootstrap --}}
                        <div class="col-6">

                            <div class="technology-item reveal"
                                 style="transition-delay:.1s">

                                <i class="bi bi-bootstrap"></i>

                                <h6>
                                    Bootstrap
                                </h6>

                            </div>

                        </div>


                        {{-- JavaScript --}}
                        <div class="col-6">

                            <div class="technology-item reveal"
                                 style="transition-delay:.2s">

                                <i class="bi bi-filetype-js"></i>

                                <h6>
                                    JavaScript
                                </h6>

                            </div>

                        </div>


                        {{-- PHP / Laravel --}}
                        <div class="col-6">

                            <div class="technology-item reveal"
                                 style="transition-delay:.3s">

                                <i class="bi bi-code-slash"></i>

                                <h6>
                                    PHP / Laravel
                                </h6>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     CTA
===================================================== --}}

<section class="introduce-cta">

    <div class="container">

        <div class="cta-box reveal">

            <h2>
                SẴN SÀNG BẮT ĐẦU?
            </h2>

            <p>
                Khám phá các mẫu website và sản phẩm số
                để tìm ra giải pháp phù hợp nhất cho dự án
                của bạn.
            </p>

            <a href="{{ route('shop.index')}}"
               class="btn btn-main">

                <i class="bi bi-grid me-2"></i>

                Xem sản phẩm

            </a>

        </div>

    </div>

</section>


@endsection


{{-- =====================================================
     ANIMATION SCRIPT
===================================================== --}}

@section('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | HERO - HIỆN NGAY KHI LOAD TRANG
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('.reveal-load').forEach(function (el) {

        requestAnimationFrame(function () {

            el.classList.add('active');

        });

    });


    /*
    |--------------------------------------------------------------------------
    | CÁC PHẦN CÒN LẠI - HIỆN KHI CUỘN TỚI
    |--------------------------------------------------------------------------
    */

    const revealEls = document.querySelectorAll('.reveal');

    const observer = new IntersectionObserver(function (entries) {

        entries.forEach(function (entry) {

            if (entry.isIntersecting) {

                entry.target.classList.add('active');

                // Chỉ chạy animation một lần
                observer.unobserve(entry.target);

            }

        });

    }, {

        threshold: 0.15

    });


    revealEls.forEach(function (el) {

        observer.observe(el);

    });

});

</script>

@endsection
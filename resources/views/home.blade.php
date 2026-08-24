@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')


{{-- =====================================================
     HERO
===================================================== --}}

<section class="hero-section">

    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-8">
                
                <div class="hero-content">

                    <span class="hero-badge reveal-load">
                        <i class="bi bi-code-slash me-2"></i>
                        WEBSITE & DIGITAL PRODUCTS
                    </span>

                    <h1 class="hero-title reveal-load" style="transition-delay:.1s">
                        WEBSITE
                        <span>CHẤT LƯỢNG</span>
                        CHO MỌI DỰ ÁN
                    </h1>

                    <p class="hero-description reveal-load" style="transition-delay:.2s">
                        Khám phá những mẫu website được thiết kế chuyên nghiệp,
                        hiện đại và sẵn sàng sử dụng. Tiết kiệm thời gian,
                        chi phí và nhanh chóng đưa dự án của bạn lên Internet.
                    </p>

                    <div class="hero-buttons reveal-load" style="transition-delay:.3s">

                        <a href="{{ route('shop.index') }}"
                           class="btn btn-main me-2">
                            <i class="bi bi-grid me-2"></i>
                            Xem sản phẩm
                        </a>

                        <a href="#categories"
                           class="btn btn-outline-main">
                            Khám phá danh mục
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     FEATURES
===================================================== --}}

<section class="features-section">

    <div class="container">

        <div class="text-center mb-5 reveal">

            <h2 class="section-title">
                TẠI SAO CHỌN CHÚNG TÔI?
            </h2>

            <p class="section-description mt-3">
                Cung cấp các website và sản phẩm số được xây dựng
                với tiêu chí đẹp, dễ sử dụng và tiết kiệm thời gian.
            </p>

        </div>


        <div class="row g-4">

            {{-- Feature 1 --}}
            <div class="col-12 col-md-6 col-lg-4">

                <div class="feature-card reveal">

                    <div class="feature-icon">
                        <i class="bi bi-laptop"></i>
                    </div>

                    <h5>
                        Thiết kế hiện đại
                    </h5>

                    <p>
                        Giao diện chuyên nghiệp, hiện đại và phù hợp
                        với nhiều loại hình website khác nhau.
                    </p>

                </div>

            </div>


            {{-- Feature 2 --}}
            <div class="col-12 col-md-6 col-lg-4">

                <div class="feature-card reveal" style="transition-delay:.1s">

                    <div class="feature-icon">
                        <i class="bi bi-phone"></i>
                    </div>

                    <h5>
                        Responsive
                    </h5>

                    <p>
                        Website được tối ưu để hiển thị tốt trên
                        máy tính, tablet và điện thoại.
                    </p>

                </div>

            </div>


            {{-- Feature 3 --}}
            <div class="col-12 col-md-6 col-lg-4">

                <div class="feature-card reveal" style="transition-delay:.2s">

                    <div class="feature-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>

                    <h5>
                        Tiết kiệm thời gian
                    </h5>

                    <p>
                        Sử dụng website có sẵn giúp bạn rút ngắn
                        đáng kể thời gian phát triển dự án.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     CATEGORIES
===================================================== --}}

<section class="category-section" id="categories">

    <div class="container">

        <div class="text-center mb-5 reveal">

            <h2 class="section-title">
                KHÁM PHÁ SẢN PHẨM
            </h2>

            <p class="section-description mt-3">
                Tìm kiếm mẫu website phù hợp với nhu cầu
                và dự án của bạn.
            </p>

        </div>


        <div class="row g-4">

            {{-- Category 1 --}}
            <div class="col-12 col-sm-6 col-lg-4">

                <div class="category-card reveal">

                    <i class="bi bi-building"></i>

                    <h4>
                        Website doanh nghiệp
                    </h4>

                    <p>
                        Website giới thiệu công ty,
                        dịch vụ và thương hiệu.
                    </p>

                </div>

            </div>


            {{-- Category 2 --}}
            <div class="col-12 col-sm-6 col-lg-4">

                <div class="category-card reveal" style="transition-delay:.05s">

                    <i class="bi bi-cart3"></i>

                    <h4>
                        Website bán hàng
                    </h4>

                    <p>
                        Các mẫu website thương mại điện tử
                        và cửa hàng online.
                    </p>

                </div>

            </div>


            {{-- Category 3 --}}
            <div class="col-12 col-sm-6 col-lg-4">

                <div class="category-card reveal" style="transition-delay:.1s">

                    <i class="bi bi-person-badge"></i>

                    <h4>
                        Portfolio
                    </h4>

                    <p>
                        Website cá nhân, CV online và
                        portfolio chuyên nghiệp.
                    </p>

                </div>

            </div>


            {{-- Category 4 --}}
            <div class="col-12 col-sm-6 col-lg-4">

                <div class="category-card reveal" style="transition-delay:.15s">

                    <i class="bi bi-megaphone"></i>

                    <h4>
                        Landing Page
                    </h4>

                    <p>
                        Landing page phục vụ quảng cáo,
                        marketing và giới thiệu sản phẩm.
                    </p>

                </div>

            </div>


            {{-- Category 5 --}}
            <div class="col-12 col-sm-6 col-lg-4">

                <div class="category-card reveal" style="transition-delay:.2s">

                    <i class="bi bi-newspaper"></i>

                    <h4>
                        Blog & Tin tức
                    </h4>

                    <p>
                        Website blog, tin tức và
                        chia sẻ nội dung.
                    </p>

                </div>

            </div>


            {{-- Category 6 --}}
            <div class="col-12 col-sm-6 col-lg-4">

                <div class="category-card reveal" style="transition-delay:.25s">

                    <i class="bi bi-code-square"></i>

                    <h4>
                        Website khác
                    </h4>

                    <p>
                        Khám phá thêm nhiều mẫu website
                        phù hợp với dự án của bạn.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     CTA
===================================================== --}}

<section class="cta-section">

    <div class="container">

        <div class="cta-box reveal">

            <h2>
                BẮT ĐẦU DỰ ÁN CỦA BẠN NGAY HÔM NAY
            </h2>

            <p>
                Không cần bắt đầu từ con số 0.
                Chọn một website phù hợp và biến nó thành
                sản phẩm của riêng bạn.
            </p>

            <a href="{{ route('shop.index') }}"
               class="btn btn-main px-4 py-2">

                <i class="bi bi-arrow-right me-2"></i>

                Xem tất cả sản phẩm

            </a>

        </div>

    </div>

</section>


@endsection




@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Hero: hiện ngay khi load trang
        document.querySelectorAll('.reveal-load').forEach(function (el) {
            requestAnimationFrame(function () {
                el.classList.add('active');
            });
        });

        // Các phần còn lại: hiện khi cuộn tới
        const revealEls = document.querySelectorAll('.reveal');

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
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
@extends('layouts.app')

@section('title', 'Liên hệ')

@section('content')






{{-- =====================================================
     HERO
===================================================== --}}

<section class="contact-hero">

    <div class="container">

        <div class="contact-hero-content text-center">

            <span class="contact-badge">
                <i class="bi bi-envelope me-2"></i>
                LIÊN HỆ
            </span>

            <h1>
                HÃY <span>LIÊN HỆ</span> VỚI CHÚNG TÔI
            </h1>

            <p>
                Bạn có câu hỏi về sản phẩm, cần hỗ trợ hoặc muốn
                tìm hiểu thêm về WebList? Hãy gửi tin nhắn cho chúng tôi.
            </p>

        </div>

    </div>

</section>


{{-- =====================================================
     CONTACT
===================================================== --}}

<section class="contact-section">

    <div class="container">

        <div class="row g-5 align-items-start">

            {{-- CONTACT INFORMATION --}}
            <div class="col-12 col-lg-5">

                <div class="contact-info">

                    <h2>
                        THÔNG TIN LIÊN HỆ
                    </h2>

                    <p>
                        Chúng tôi luôn sẵn sàng hỗ trợ bạn trong quá trình
                        lựa chọn, mua và sử dụng các sản phẩm website
                        trên WebList.
                    </p>


                    {{-- Email --}}
                    <div class="contact-info-item">

                        <div class="contact-icon">
                            <i class="bi bi-envelope"></i>
                        </div>

                        <div>

                            <h6>
                                Email
                            </h6>

                            <p>
                                support@weblist.vn
                            </p>

                        </div>

                    </div>


                    {{-- Phone --}}
                    <div class="contact-info-item">

                        <div class="contact-icon">
                            <i class="bi bi-telephone"></i>
                        </div>

                        <div>

                            <h6>
                                Điện thoại
                            </h6>

                            <p>
                                0123 456 789
                            </p>

                        </div>

                    </div>


                    {{-- Working time --}}
                    <div class="contact-info-item">

                        <div class="contact-icon">
                            <i class="bi bi-clock"></i>
                        </div>

                        <div>

                            <h6>
                                Thời gian hỗ trợ
                            </h6>

                            <p>
                                Thứ 2 - Thứ 7
                                <br>
                                08:00 - 17:30
                            </p>

                        </div>

                    </div>


                    {{-- Website --}}
                    <div class="contact-info-item">

                        <div class="contact-icon">
                            <i class="bi bi-globe2"></i>
                        </div>

                        <div>

                            <h6>
                                Website
                            </h6>

                            <p>
                                WebList
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- CONTACT FORM --}}
            <div class="col-12 col-lg-7">
                @if(session('success'))

                    <div class="container mt-4">

                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            <i class="bi bi-check-circle me-2"></i>

                            {{ session('success') }}

                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                            ></button>

                        </div>

                    </div>

                @endif

                <div class="contact-form">

                    <h3>
                        GỬI TIN NHẮN CHO CHÚNG TÔI
                    </h3>

                    <form
                        action="{{ route('contact.send') }}"
                        method="POST"
                    >

                        @csrf

                        <div class="row g-3">

                            {{-- Name --}}
                            <div class="col-12 col-md-6">

                                <label
                                    for="name"
                                    class="form-label"
                                >
                                    Họ và tên
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control"
                                    placeholder="Nhập họ và tên"
                                    value="{{ old('name') }}"
                                    required
                                >

                            </div>


                            {{-- Email --}}
                            <div class="col-12 col-md-6">

                                <label
                                    for="email"
                                    class="form-label"
                                >
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control"
                                    placeholder="example@email.com"
                                    value="{{ old('email') }}"
                                    required
                                >

                            </div>


                            {{-- Subject --}}
                            <div class="col-12">

                                <label
                                    for="subject"
                                    class="form-label"
                                >
                                    Chủ đề
                                </label>

                                <input
                                    type="text"
                                    name="subject"
                                    id="subject"
                                    class="form-control"
                                    placeholder="Nhập chủ đề"
                                    value="{{ old('subject') }}"
                                    required
                                >

                            </div>


                            {{-- Message --}}
                            <div class="col-12">

                                <label
                                    for="message"
                                    class="form-label"
                                >
                                    Nội dung
                                </label>

                                <textarea
                                    name="message"
                                    id="message"
                                    class="form-control"
                                    placeholder="Nhập nội dung cần hỗ trợ..."
                                    required
                                >{{ old('message') }}</textarea>

                            </div>


                            {{-- Submit --}}
                            <div class="col-12">

                                <button
                                    type="submit"
                                    class="btn btn-main"
                                >

                                    <i class="bi bi-send me-2"></i>

                                    Gửi tin nhắn

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     FAQ
===================================================== --}}

<section class="faq-section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                CÂU HỎI THƯỜNG GẶP
            </h2>

            <p class="section-description mt-3">
                Một số câu hỏi khách hàng thường quan tâm
                khi mua sản phẩm trên WebList.
            </p>

        </div>


        <div
            class="accordion"
            id="contactFaq"
        >

            {{-- FAQ 1 --}}
            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqOne"
                    >
                        Sau khi thanh toán tôi nhận được sản phẩm như thế nào?
                    </button>

                </h2>

                <div
                    id="faqOne"
                    class="accordion-collapse collapse show"
                    data-bs-parent="#contactFaq"
                >

                    <div class="accordion-body">
                        Sau khi thanh toán thành công, hệ thống sẽ
                        cung cấp quyền tải sản phẩm theo thông tin
                        đơn hàng của bạn.
                    </div>

                </div>

            </div>


            {{-- FAQ 2 --}}
            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqTwo"
                    >
                        Tôi có thể tùy chỉnh website sau khi mua không?
                    </button>

                </h2>

                <div
                    id="faqTwo"
                    class="accordion-collapse collapse"
                    data-bs-parent="#contactFaq"
                >

                    <div class="accordion-body">
                        Có. Tùy từng sản phẩm, bạn có thể tùy chỉnh
                        giao diện, nội dung và các thành phần của website.
                        Vui lòng xem phần mô tả và yêu cầu của từng sản phẩm.
                    </div>

                </div>

            </div>


            {{-- FAQ 3 --}}
            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqThree"
                    >
                        Tôi gặp vấn đề khi tải sản phẩm thì phải làm sao?
                    </button>

                </h2>

                <div
                    id="faqThree"
                    class="accordion-collapse collapse"
                    data-bs-parent="#contactFaq"
                >

                    <div class="accordion-body">
                        Bạn có thể liên hệ với chúng tôi thông qua
                        email hoặc biểu mẫu liên hệ trên trang này.
                        Chúng tôi sẽ hỗ trợ bạn trong thời gian sớm nhất.
                    </div>

                </div>

            </div>


            {{-- FAQ 4 --}}
            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqFour"
                    >
                        Tôi có thể yêu cầu hỗ trợ trước khi mua không?
                    </button>

                </h2>

                <div
                    id="faqFour"
                    class="accordion-collapse collapse"
                    data-bs-parent="#contactFaq"
                >

                    <div class="accordion-body">
                        Hoàn toàn được. Nếu bạn chưa chắc chắn sản phẩm
                        có phù hợp với nhu cầu hay không, hãy liên hệ
                        với chúng tôi trước khi mua.
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     CTA
===================================================== --}}

<section class="contact-cta">

    <div class="container">

        <div class="cta-box">

            <h2>
                BẠN ĐANG TÌM MỘT WEBSITE?
            </h2>

            <p>
                Khám phá các sản phẩm website được thiết kế sẵn
                và tìm giải pháp phù hợp cho dự án của bạn.
            </p>

            <a
                href="{{ route('shop.index') }}"
                class="btn btn-main"
            >

                <i class="bi bi-grid me-2"></i>

                Xem sản phẩm

            </a>

        </div>

    </div>

</section>


@endsection
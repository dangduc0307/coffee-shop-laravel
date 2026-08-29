@extends('layouts.app')

@section('title', 'Liên hệ')

@section('content')


{{-- =====================================================
     HERO
===================================================== --}}

<section class="contact-hero">

    <div class="container">

        <div class="contact-hero-content text-center">

            <span class="contact-badge reveal-load">
                <i class="bi bi-envelope me-2"></i>
                LIÊN HỆ
            </span>

            <h1 class="reveal-load" style="transition-delay:.1s">
                HÃY <span>LIÊN HỆ</span> VỚI CHÚNG TÔI
            </h1>

            <p class="reveal-load" style="transition-delay:.2s">
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

            {{-- =================================================
                 CONTACT INFORMATION
            ================================================== --}}

            <div class="col-12 col-lg-5">

                <div class="contact-info reveal">

                    <h2>
                        THÔNG TIN LIÊN HỆ
                    </h2>

                    <p>
                        Chúng tôi luôn sẵn sàng hỗ trợ bạn trong quá trình
                        lựa chọn, mua và sử dụng các sản phẩm website
                        trên WebList.
                    </p>


                    {{-- Email --}}
                    <div class="contact-info-item reveal"
                         style="transition-delay:.1s">

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
                    <div class="contact-info-item reveal"
                         style="transition-delay:.2s">

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
                    <div class="contact-info-item reveal"
                         style="transition-delay:.3s">

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
                    <div class="contact-info-item reveal"
                         style="transition-delay:.4s">

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


            {{-- =================================================
                 CONTACT FORM
            ================================================== --}}

            <div class="col-12 col-lg-7">

                <div
                    id="contact-success"
                    class="alert alert-success alert-dismissible fade show d-none mt-4"
                    role="alert"
                >
                    <i class="bi bi-check-circle me-2"></i>

                    <span id="contact-success-message"></span>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>
                </div>


                <div class="contact-form reveal">

                    <h3>
                        GỬI TIN NHẮN CHO CHÚNG TÔI
                    </h3>

                    <form
                        id="contact-form"
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

        <div class="text-center mb-5 reveal">

            <h2 class="section-title">
                CÂU HỎI THƯỜNG GẶP
            </h2>

            <p class="section-description mt-3">
                Một số câu hỏi khách hàng thường quan tâm
                khi mua sản phẩm trên WebList.
            </p>

        </div>


        <div
            class="accordion reveal"
            id="contactFaq"
        >

            {{-- FAQ 1 --}}
            <div
                class="accordion-item reveal"
            >

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
            <div
                class="accordion-item reveal"
                style="transition-delay:.1s"
            >

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
            <div
                class="accordion-item reveal"
                style="transition-delay:.2s"
            >

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
            <div
                class="accordion-item reveal"
                style="transition-delay:.3s"
            >

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

        <div class="cta-box reveal">

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


{{-- =====================================================
     ANIMATION SCRIPT
===================================================== --}}

@section('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | HERO
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('.reveal-load').forEach(function (el) {

        requestAnimationFrame(function () {

            el.classList.add('active');

        });

    });


    /*
    |--------------------------------------------------------------------------
    | SCROLL REVEAL
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | CONTACT FORM AJAX
    |--------------------------------------------------------------------------
    */

    const contactForm = document.getElementById('contact-form');

    if (contactForm) {

        contactForm.addEventListener('submit', async function (e) {

            e.preventDefault();


            const submitButton = contactForm.querySelector(
                'button[type="submit"]'
            );

            const successAlert = document.getElementById(
                'contact-success'
            );

            const successMessage = document.getElementById(
                'contact-success-message'
            );


            /*
            |--------------------------------------------------------------------------
            | Lấy dữ liệu form
            |--------------------------------------------------------------------------
            */

            const formData = new FormData(contactForm);


            /*
            |--------------------------------------------------------------------------
            | Disable button tránh click nhiều lần
            |--------------------------------------------------------------------------
            */

            submitButton.disabled = true;

            submitButton.innerHTML = `
                <span
                    class="spinner-border spinner-border-sm me-2"
                    role="status"
                ></span>

                Đang gửi...
            `;


            try {

                const response = await fetch(
                    contactForm.action,
                    {
                        method: 'POST',

                        body: formData,

                        headers: {
                            'Accept': 'application/json',

                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }
                );


                const data = await response.json();


                /*
                |--------------------------------------------------------------------------
                | Thành công
                |--------------------------------------------------------------------------
                */

                if (response.ok) {

                    successMessage.textContent =
                        data.message ||
                        'Tin nhắn của bạn đã được gửi thành công!';

                    successAlert.classList.remove('d-none');


                    /*
                    |--------------------------------------------------------------------------
                    | Reset form
                    |--------------------------------------------------------------------------
                    */

                    contactForm.reset();


                    /*
                    |--------------------------------------------------------------------------
                    | Cuộn nhẹ tới thông báo
                    |--------------------------------------------------------------------------
                    */

                    successAlert.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });


                } else {

                    /*
                    |--------------------------------------------------------------------------
                    | Lỗi validation
                    |--------------------------------------------------------------------------
                    */

                    if (data.errors) {

                        const firstError =
                            Object.values(data.errors)[0][0];

                        alert(firstError);

                    } else {

                        alert(
                            data.message ||
                            'Có lỗi xảy ra. Vui lòng thử lại.'
                        );

                    }

                }

            } catch (error) {

                console.error(error);

                alert(
                    'Không thể gửi tin nhắn. Vui lòng thử lại sau.'
                );

            } finally {

                /*
                |--------------------------------------------------------------------------
                | Enable button lại
                |--------------------------------------------------------------------------
                */

                submitButton.disabled = false;

                submitButton.innerHTML = `
                    <i class="bi bi-send me-2"></i>

                    Gửi tin nhắn
                `;

            }

        });

    }

});

</script>

@endsection
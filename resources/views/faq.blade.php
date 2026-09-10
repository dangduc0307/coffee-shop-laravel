@extends('layouts.app')

@section('content')

<div class="bg-light py-5">

    <div class="container">

        {{-- HEADER --}}
        <div class="text-center mb-5">

            <span
                class="badge rounded-pill px-3 py-2 mb-3"
                style="
                    background: #fff3df;
                    color: #8b5412;
                    border: 1px solid #d9a85c;
                "
            >
                <i class="bi bi-question-circle me-1"></i>
                HỖ TRỢ
            </span>

            <h1
                class="fw-bold mb-3"
                style="color: #2b1404;"
            >
                Câu hỏi thường gặp
            </h1>

            <p class="text-muted mb-0">
                Những câu hỏi thường gặp khi sử dụng WebList
            </p>

        </div>


        {{-- FAQ --}}
        <div class="row justify-content-center">

            <div class="col-12 col-lg-9">

                <div class="accordion" id="faqAccordion">


                    {{-- FAQ 1 --}}
                    <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">

                        <h2 class="accordion-header">

                            <button
                                class="accordion-button fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq1"
                            >
                                WebList cung cấp những sản phẩm gì?
                            </button>

                        </h2>

                        <div
                            id="faq1"
                            class="accordion-collapse collapse show"
                            data-bs-parent="#faqAccordion"
                        >

                            <div class="accordion-body text-muted">

                                WebList cung cấp các sản phẩm website và
                                digital products như website doanh nghiệp,
                                website bán hàng, portfolio, landing page và
                                các sản phẩm kỹ thuật số khác.

                            </div>

                        </div>

                    </div>


                    {{-- FAQ 2 --}}
                    <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">

                        <h2 class="accordion-header">

                            <button
                                class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq2"
                            >
                                Tôi có cần đăng ký tài khoản để mua sản phẩm không?
                            </button>

                        </h2>

                        <div
                            id="faq2"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion"
                        >

                            <div class="accordion-body text-muted">

                                Có. Bạn cần đăng nhập tài khoản WebList để
                                thực hiện việc mua và quản lý các sản phẩm đã
                                mua.

                                <br><br>

                                Tài khoản giúp WebList xác định đơn hàng và
                                cung cấp quyền truy cập sản phẩm sau khi thanh
                                toán thành công.

                            </div>

                        </div>

                    </div>


                    {{-- FAQ 3 --}}
                    <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">

                        <h2 class="accordion-header">

                            <button
                                class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq3"
                            >
                                Tôi thanh toán xong thì nhận sản phẩm như thế nào?
                            </button>

                        </h2>

                        <div
                            id="faq3"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion"
                        >

                            <div class="accordion-body text-muted">

                                Sau khi hệ thống xác nhận thanh toán thành công,
                                sản phẩm kỹ thuật số sẽ được cung cấp thông qua
                                tài khoản của bạn hoặc phương thức được WebList
                                quy định cho từng sản phẩm.

                            </div>

                        </div>

                    </div>


                    {{-- FAQ 4 --}}
                    <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">

                        <h2 class="accordion-header">

                            <button
                                class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq4"
                            >
                                Tôi đã thanh toán nhưng chưa nhận được sản phẩm thì sao?
                            </button>

                        </h2>

                        <div
                            id="faq4"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion"
                        >

                            <div class="accordion-body text-muted">

                                Trước tiên, hãy kiểm tra trạng thái đơn hàng
                                trong tài khoản của bạn.

                                <br><br>

                                Nếu giao dịch đã được thanh toán nhưng hệ thống
                                chưa cập nhật, vui lòng liên hệ WebList qua:

                                <br><br>

                                <strong>
                                    support@weblist.vn
                                </strong>

                                <br><br>

                                Chúng tôi sẽ kiểm tra giao dịch và hỗ trợ bạn.

                            </div>

                        </div>

                    </div>


                    {{-- FAQ 5 --}}
                    <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">

                        <h2 class="accordion-header">

                            <button
                                class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq5"
                            >
                                Tôi có được tải sản phẩm nhiều lần không?
                            </button>

                        </h2>

                        <div
                            id="faq5"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion"
                        >

                            <div class="accordion-body text-muted">

                                Quyền tải xuống phụ thuộc vào điều kiện của
                                từng sản phẩm.

                                <br><br>

                                Một số sản phẩm có thể cho phép tải xuống
                                nhiều lần, trong khi một số sản phẩm có thể
                                áp dụng giới hạn riêng.

                                <br><br>

                                Bạn nên kiểm tra thông tin được công bố trên
                                trang sản phẩm trước khi mua.

                            </div>

                        </div>

                    </div>


                    {{-- FAQ 6 --}}
                    <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">

                        <h2 class="accordion-header">

                            <button
                                class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq6"
                            >
                                Tôi có được bán lại website đã mua không?
                            </button>

                        </h2>

                        <div
                            id="faq6"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion"
                        >

                            <div class="accordion-body text-muted">

                                Không mặc định.

                                <br><br>

                                Việc mua sản phẩm không đồng nghĩa với việc
                                bạn được quyền sao chép, phân phối hoặc bán lại
                                sản phẩm cho người khác.

                                <br><br>

                                Quyền sử dụng cụ thể phụ thuộc vào điều kiện
                                cấp phép của từng sản phẩm.

                            </div>

                        </div>

                    </div>


                    {{-- FAQ 7 --}}
                    <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">

                        <h2 class="accordion-header">

                            <button
                                class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq7"
                            >
                                Tôi có thể yêu cầu hoàn tiền không?
                            </button>

                        </h2>

                        <div
                            id="faq7"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion"
                        >

                            <div class="accordion-body text-muted">

                                Việc hoàn tiền phụ thuộc vào điều kiện được
                                quy định trong Chính sách hoàn tiền của WebList
                                và tình trạng cụ thể của đơn hàng.

                                <br><br>

                                Đối với sản phẩm kỹ thuật số, bạn nên kiểm tra
                                kỹ thông tin sản phẩm trước khi mua.

                            </div>

                        </div>

                    </div>


                    {{-- FAQ 8 --}}
                    <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">

                        <h2 class="accordion-header">

                            <button
                                class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq8"
                            >
                                Tôi quên mật khẩu tài khoản thì phải làm sao?
                            </button>

                        </h2>

                        <div
                            id="faq8"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion"
                        >

                            <div class="accordion-body text-muted">

                                Bạn có thể sử dụng chức năng
                                <strong>Quên mật khẩu</strong> trên trang đăng
                                nhập để thực hiện quá trình đặt lại mật khẩu.

                            </div>

                        </div>

                    </div>


                    {{-- FAQ 9 --}}
                    <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">

                        <h2 class="accordion-header">

                            <button
                                class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq9"
                            >
                                WebList có hỗ trợ sau khi mua sản phẩm không?
                            </button>

                        </h2>

                        <div
                            id="faq9"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion"
                        >

                            <div class="accordion-body text-muted">

                                Có. Nếu gặp vấn đề liên quan đến đơn hàng hoặc
                                sản phẩm, bạn có thể liên hệ WebList qua email
                                hỗ trợ:

                                <br><br>

                                <strong>
                                    support@weblist.vn
                                </strong>

                            </div>

                        </div>

                    </div>


                    {{-- FAQ 10 --}}
                    <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">

                        <h2 class="accordion-header">

                            <button
                                class="accordion-button collapsed fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq10"
                            >
                                Tôi cần hỗ trợ thêm thì liên hệ ở đâu?
                            </button>

                        </h2>

                        <div
                            id="faq10"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion"
                        >

                            <div class="accordion-body text-muted">

                                Bạn có thể liên hệ với WebList thông qua email:

                                <br><br>

                                <strong>
                                    support@weblist.vn
                                </strong>

                                <br><br>

                                Đội ngũ WebList sẽ tiếp nhận và hỗ trợ yêu cầu
                                của bạn trong thời gian phù hợp.

                            </div>

                        </div>

                    </div>


                </div>


                {{-- CONTACT BOX --}}
                <div
                    class="text-center mt-5 p-4 rounded-4"
                    style="
                        background: #fff;
                        border: 1px solid #eadfce;
                    "
                >

                    <i
                        class="bi bi-headset fs-2"
                        style="color: #976017;"
                    ></i>

                    <h5
                        class="fw-bold mt-3"
                        style="color: #2b1404;"
                    >
                        Bạn vẫn cần hỗ trợ?
                    </h5>

                    <p class="text-muted mb-3">
                        Hãy liên hệ với WebList, chúng tôi sẽ hỗ trợ bạn.
                    </p>

                    <a
                        href="{{ url('/contact') }}"
                        class="btn px-4"
                        style="
                            background: #976017;
                            color: #fff;
                        "
                    >
                        <i class="bi bi-envelope me-1"></i>
                        Liên hệ WebList
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
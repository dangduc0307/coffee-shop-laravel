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
                <i class="bi bi-cart-check me-1"></i>
                MUA HÀNG
            </span>

            <h1
                class="fw-bold mb-3"
                style="color: #2b1404;"
            >
                Chính sách mua hàng
            </h1>

            <p class="text-muted mb-0">
                Quy định về việc mua và nhận sản phẩm tại WebList
            </p>

            <small class="text-muted">
                Cập nhật lần cuối: 10/09/2026
            </small>

        </div>


        {{-- CONTENT --}}
        <div class="row justify-content-center">

            <div class="col-12 col-lg-9">

                <div
                    class="bg-white rounded-4 shadow-sm p-4 p-md-5"
                    style="line-height: 1.8;"
                >

                    {{-- 1 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            1. Giới thiệu
                        </h4>

                        <p>
                            WebList cung cấp các sản phẩm website và sản phẩm
                            kỹ thuật số nhằm giúp cá nhân, doanh nghiệp và các
                            dự án có thể nhanh chóng triển khai website.
                        </p>

                        <p class="mb-0">
                            Chính sách mua hàng này quy định các bước đặt hàng,
                            thanh toán và nhận sản phẩm khi khách hàng mua hàng
                            trên WebList.
                        </p>

                    </div>


                    {{-- 2 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            2. Lựa chọn sản phẩm
                        </h4>

                        <p>
                            Khách hàng có thể truy cập mục
                            <strong>Sản phẩm</strong> để xem các website và
                            digital products đang được cung cấp.
                        </p>

                        <p>
                            Trước khi mua, khách hàng nên kiểm tra các thông tin
                            được hiển thị trên trang sản phẩm, bao gồm:
                        </p>

                        <ul>
                            <li>Tên sản phẩm.</li>
                            <li>Mô tả sản phẩm.</li>
                            <li>Giá sản phẩm.</li>
                            <li>Tính năng.</li>
                            <li>Yêu cầu sử dụng hoặc cài đặt.</li>
                            <li>Thông tin demo nếu có.</li>
                            <li>Điều kiện sử dụng sản phẩm.</li>
                        </ul>

                        <p class="mb-0">
                            Nếu cần thêm thông tin trước khi mua, khách hàng có
                            thể liên hệ với WebList để được hỗ trợ.
                        </p>

                    </div>


                    {{-- 3 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            3. Đặt hàng
                        </h4>

                        <p>
                            Quy trình mua sản phẩm trên WebList được thực hiện
                            theo các bước cơ bản:
                        </p>

                        <ol>
                            <li>
                                Đăng nhập hoặc đăng ký tài khoản WebList.
                            </li>

                            <li>
                                Lựa chọn sản phẩm muốn mua.
                            </li>

                            <li>
                                Thêm sản phẩm vào giỏ hàng.
                            </li>

                            <li>
                                Kiểm tra thông tin đơn hàng.
                            </li>

                            <li>
                                Nhập các thông tin cần thiết cho giao dịch.
                            </li>

                            <li>
                                Thực hiện thanh toán theo phương thức được
                                WebList hỗ trợ.
                            </li>

                            <li>
                                Chờ hệ thống xác nhận giao dịch.
                            </li>

                            <li>
                                Truy cập sản phẩm sau khi thanh toán thành công.
                            </li>
                        </ol>

                    </div>


                    {{-- 4 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            4. Giá sản phẩm
                        </h4>

                        <p>
                            Giá của từng sản phẩm được hiển thị trực tiếp trên
                            website WebList.
                        </p>

                        <p>
                            WebList có thể thay đổi giá bán, chương trình
                            khuyến mãi hoặc ưu đãi vào từng thời điểm.
                        </p>

                        <p class="mb-0">
                            Đối với đơn hàng đã được xác nhận thành công, giá
                            áp dụng là giá được hiển thị tại thời điểm khách
                            hàng thực hiện giao dịch, trừ trường hợp có sai
                            sót rõ ràng hoặc vấn đề cần được xử lý theo quy
                            định áp dụng.
                        </p>

                    </div>


                    {{-- 5 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            5. Thanh toán
                        </h4>

                        <p>
                            WebList hỗ trợ các phương thức thanh toán được công
                            bố trên website tại thời điểm khách hàng đặt hàng.
                        </p>

                        <p>
                            Sau khi khách hàng thực hiện thanh toán, hệ thống
                            sẽ tiến hành kiểm tra và cập nhật trạng thái giao
                            dịch.
                        </p>

                        <div
                            class="alert mb-0"
                            style="
                                background: #fff8eb;
                                border: 1px solid #ead0a0;
                                color: #5d3812;
                            "
                        >
                            <i class="bi bi-shield-check me-2"></i>

                            <strong>Lưu ý:</strong>
                            WebList không yêu cầu khách hàng cung cấp mật khẩu
                            ngân hàng hoặc mã OTP cho nhân viên hỗ trợ.
                        </div>

                    </div>


                    {{-- 6 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            6. Xác nhận thanh toán
                        </h4>

                        <p>
                            Một đơn hàng chỉ được xem là thanh toán thành công
                            sau khi hệ thống WebList xác nhận giao dịch hợp lệ.
                        </p>

                        <p>
                            Trong trường hợp giao dịch đang được xử lý, khách
                            hàng có thể cần chờ hệ thống cập nhật trạng thái.
                        </p>

                        <p class="mb-0">
                            Nếu khách hàng đã thanh toán nhưng đơn hàng chưa
                            được cập nhật, vui lòng liên hệ WebList và cung cấp
                            thông tin giao dịch cần thiết để được kiểm tra.
                        </p>

                    </div>


                    {{-- 7 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            7. Cung cấp sản phẩm kỹ thuật số
                        </h4>

                        <p>
                            WebList chủ yếu cung cấp sản phẩm kỹ thuật số.
                            Sau khi thanh toán được xác nhận thành công, sản
                            phẩm có thể được cung cấp thông qua tài khoản của
                            khách hàng hoặc phương thức kỹ thuật phù hợp.
                        </p>

                        <p>
                            Đối với những sản phẩm hỗ trợ tải xuống, khách hàng
                            có thể tải sản phẩm từ khu vực được WebList cung
                            cấp sau khi đơn hàng đủ điều kiện.
                        </p>

                        <p class="mb-0">
                            Quyền truy cập hoặc tải xuống có thể phụ thuộc vào
                            điều kiện sử dụng riêng của từng sản phẩm.
                        </p>

                    </div>


                    {{-- 8 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            8. Kiểm tra sản phẩm trước khi mua
                        </h4>

                        <p>
                            Do sản phẩm trên WebList có thể là sản phẩm kỹ
                            thuật số, khách hàng nên kiểm tra kỹ:
                        </p>

                        <ul>
                            <li>Mô tả sản phẩm.</li>
                            <li>Hình ảnh và bản demo.</li>
                            <li>Tính năng được cung cấp.</li>
                            <li>Yêu cầu kỹ thuật.</li>
                            <li>Phiên bản sản phẩm.</li>
                            <li>Điều kiện cấp quyền sử dụng.</li>
                        </ul>

                        <p class="mb-0">
                            Việc đặt hàng đồng nghĩa với việc khách hàng đã có
                            cơ hội xem và kiểm tra các thông tin sản phẩm được
                            WebList công bố trước khi mua.
                        </p>

                    </div>


                    {{-- 9 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            9. Vấn đề sau khi mua hàng
                        </h4>

                        <p>
                            Nếu sản phẩm gặp vấn đề kỹ thuật hoặc khách hàng
                            không thể truy cập sản phẩm sau khi thanh toán,
                            vui lòng liên hệ WebList để được hỗ trợ.
                        </p>

                        <p class="mb-0">
                            WebList sẽ kiểm tra tình trạng đơn hàng và sản phẩm
                            để đưa ra phương án hỗ trợ phù hợp.
                        </p>

                    </div>


                    {{-- 10 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            10. Hủy đơn hàng và hoàn tiền
                        </h4>

                        <p>
                            Việc hủy đơn hàng hoặc hoàn tiền đối với sản phẩm
                            kỹ thuật số được thực hiện theo
                            <strong>Chính sách hoàn tiền</strong> của WebList
                            và điều kiện cụ thể của từng sản phẩm.
                        </p>

                        <p class="mb-0">
                            Khách hàng nên kiểm tra chính sách hoàn tiền trước
                            khi thực hiện giao dịch.
                        </p>

                    </div>


                    {{-- 11 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            11. Quyền sử dụng sản phẩm
                        </h4>

                        <p>
                            Việc mua sản phẩm không đồng nghĩa với việc khách
                            hàng được quyền sao chép, phân phối hoặc bán lại
                            sản phẩm cho bên thứ ba.
                        </p>

                        <p class="mb-0">
                            Quyền sử dụng sản phẩm được xác định theo Điều khoản
                            sử dụng và điều kiện cấp phép được công bố cùng
                            từng sản phẩm.
                        </p>

                    </div>


                    {{-- 12 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            12. Thay đổi chính sách
                        </h4>

                        <p class="mb-0">
                            WebList có thể cập nhật Chính sách mua hàng khi cần
                            thiết để phù hợp với thay đổi về sản phẩm, dịch vụ,
                            phương thức thanh toán hoặc quy định pháp luật.
                        </p>

                    </div>


                    {{-- 13 --}}
                    <div>

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            13. Liên hệ hỗ trợ
                        </h4>

                        <p>
                            Nếu bạn cần hỗ trợ liên quan đến đơn hàng hoặc quá
                            trình mua sản phẩm, vui lòng liên hệ WebList:
                        </p>

                        <div
                            class="rounded-3 p-4"
                            style="
                                background: #faf7f2;
                                border: 1px solid #eadfce;
                            "
                        >

                            <div class="mb-2">
                                <strong>WebList</strong>
                            </div>

                            <div class="mb-2">

                                <i
                                    class="bi bi-envelope me-2"
                                    style="color: #976017;"
                                ></i>

                                support@weblist.vn

                            </div>

                            <div>

                                <i
                                    class="bi bi-globe me-2"
                                    style="color: #976017;"
                                ></i>

                                WebList

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
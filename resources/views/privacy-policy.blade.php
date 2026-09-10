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
                <i class="bi bi-shield-lock me-1"></i>
                QUYỀN RIÊNG TƯ
            </span>

            <h1
                class="fw-bold mb-3"
                style="color: #2b1404;"
            >
                Chính sách bảo mật
            </h1>

            <p class="text-muted mb-0">
                Chính sách bảo mật và quyền riêng tư của WebList
            </p>

            <small class="text-muted">
                Cập nhật lần cuối: {{ date('d/m/Y') }}
            </small>

        </div>


        {{-- CONTENT --}}
        <div class="row justify-content-center">

            <div class="col-12 col-lg-9">

                <div
                    class="bg-white rounded-4 shadow-sm p-4 p-md-5"
                    style="line-height: 1.8;"
                >

                    {{-- INTRO --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            1. Giới thiệu
                        </h4>

                        <p>
                            WebList tôn trọng quyền riêng tư của khách hàng
                            và cam kết bảo vệ thông tin cá nhân được cung cấp
                            trong quá trình sử dụng website, đăng ký tài khoản,
                            mua sản phẩm và liên hệ với WebList.
                        </p>

                        <p class="mb-0">
                            Chính sách này giải thích cách WebList thu thập,
                            sử dụng, lưu trữ và bảo vệ thông tin của khách hàng
                            khi truy cập và sử dụng website.
                        </p>

                    </div>


                    {{-- INFORMATION --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            2. Thông tin chúng tôi thu thập
                        </h4>

                        <p>
                            Tùy thuộc vào cách bạn sử dụng website, WebList
                            có thể thu thập một số thông tin cần thiết như:
                        </p>

                        <ul>
                            <li>Họ và tên.</li>
                            <li>Địa chỉ email.</li>
                            <li>Số điện thoại nếu được cung cấp.</li>
                            <li>Thông tin tài khoản.</li>
                            <li>Thông tin đơn hàng và sản phẩm đã mua.</li>
                            <li>Thông tin liên quan đến giao dịch.</li>
                            <li>Nội dung liên hệ hoặc yêu cầu hỗ trợ.</li>
                            <li>
                                Một số dữ liệu kỹ thuật cần thiết để website
                                hoạt động ổn định.
                            </li>
                        </ul>

                    </div>


                    {{-- PURPOSE --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            3. Mục đích sử dụng thông tin
                        </h4>

                        <p>
                            WebList sử dụng thông tin được cung cấp nhằm:
                        </p>

                        <ul>
                            <li>Quản lý và duy trì tài khoản khách hàng.</li>
                            <li>Xử lý đơn hàng và giao dịch.</li>
                            <li>Cung cấp sản phẩm khách hàng đã mua.</li>
                            <li>Gửi thông báo liên quan đến đơn hàng.</li>
                            <li>Hỗ trợ và giải đáp yêu cầu của khách hàng.</li>
                            <li>Cải thiện chất lượng website và dịch vụ.</li>
                            <li>
                                Phát hiện và ngăn chặn các hành vi gian lận,
                                lạm dụng hoặc truy cập trái phép.
                            </li>
                            <li>
                                Đáp ứng các nghĩa vụ pháp lý khi cần thiết.
                            </li>
                        </ul>

                    </div>


                    {{-- ACCOUNT SECURITY --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            4. Bảo mật thông tin tài khoản
                        </h4>

                        <p>
                            WebList áp dụng các biện pháp kỹ thuật và quản lý
                            phù hợp nhằm bảo vệ thông tin khách hàng khỏi việc
                            truy cập, sử dụng, thay đổi hoặc tiết lộ trái phép.
                        </p>

                        <p>
                            Mật khẩu tài khoản được xử lý bằng các cơ chế bảo
                            mật phù hợp. WebList không yêu cầu khách hàng cung
                            cấp mật khẩu tài khoản thông qua email, tin nhắn
                            hoặc các kênh liên hệ không chính thức.
                        </p>

                        <p class="mb-0">
                            Khách hàng có trách nhiệm bảo vệ thông tin đăng nhập
                            của mình và không chia sẻ mật khẩu cho người khác.
                        </p>

                    </div>


                    {{-- PAYMENT --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            5. Thông tin thanh toán
                        </h4>

                        <p>
                            Trong quá trình thanh toán, một số thông tin giao
                            dịch có thể được xử lý bởi đơn vị cung cấp dịch vụ
                            thanh toán tương ứng.
                        </p>

                        <p>
                            WebList không yêu cầu khách hàng cung cấp mật khẩu
                            ngân hàng, mã OTP hoặc thông tin xác thực ngân hàng
                            thông qua email, tin nhắn hoặc nhân viên hỗ trợ.
                        </p>

                        <div
                            class="alert mb-0"
                            style="
                                background: #fff8eb;
                                border: 1px solid #ead0a0;
                                color: #5d3812;
                            "
                        >
                            <i class="bi bi-exclamation-triangle me-2"></i>

                            <strong>Lưu ý:</strong>
                            Không cung cấp mã OTP, mật khẩu ngân hàng hoặc
                            thông tin xác thực tài khoản cho bất kỳ người nào
                            tự nhận là nhân viên WebList.
                        </div>

                    </div>


                    {{-- THIRD PARTY --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            6. Chia sẻ thông tin với bên thứ ba
                        </h4>

                        <p>
                            WebList không bán hoặc cho thuê thông tin cá nhân
                            của khách hàng.
                        </p>

                        <p>
                            Trong một số trường hợp cần thiết, thông tin có thể
                            được chia sẻ với các đơn vị cung cấp dịch vụ hỗ trợ
                            hoạt động của website, chẳng hạn như:
                        </p>

                        <ul>
                            <li>Đơn vị cung cấp dịch vụ thanh toán.</li>
                            <li>Đơn vị cung cấp dịch vụ email.</li>
                            <li>Đơn vị cung cấp dịch vụ lưu trữ và máy chủ.</li>
                            <li>
                                Các đơn vị cung cấp dịch vụ kỹ thuật cần thiết
                                cho hoạt động của website.
                            </li>
                        </ul>

                        <p class="mb-0">
                            WebList chỉ cung cấp phạm vi thông tin cần thiết
                            cho mục đích thực hiện dịch vụ tương ứng hoặc khi
                            việc cung cấp thông tin được pháp luật yêu cầu.
                        </p>

                    </div>


                    {{-- COOKIE --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            7. Cookie và dữ liệu kỹ thuật
                        </h4>

                        <p>
                            WebList có thể sử dụng cookie và các công nghệ
                            tương tự để:
                        </p>

                        <ul>
                            <li>Duy trì trạng thái đăng nhập.</li>
                            <li>Hỗ trợ chức năng giỏ hàng.</li>
                            <li>Ghi nhớ một số lựa chọn của người dùng.</li>
                            <li>Cải thiện trải nghiệm sử dụng website.</li>
                            <li>Phân tích và cải thiện hiệu suất website.</li>
                        </ul>

                        <p class="mb-0">
                            Người dùng có thể điều chỉnh cài đặt cookie thông
                            qua trình duyệt của mình. Việc tắt một số cookie
                            có thể khiến một số chức năng của website hoạt động
                            không đầy đủ.
                        </p>

                    </div>


                    {{-- STORAGE --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            8. Thời gian lưu trữ thông tin
                        </h4>

                        <p>
                            WebList lưu trữ thông tin cá nhân trong khoảng thời
                            gian cần thiết để cung cấp sản phẩm, dịch vụ, quản
                            lý tài khoản, hỗ trợ khách hàng, xử lý giao dịch và
                            thực hiện các nghĩa vụ pháp lý liên quan.
                        </p>

                        <p class="mb-0">
                            Khi thông tin không còn cần thiết và không có nghĩa
                            vụ pháp lý phải tiếp tục lưu trữ, WebList có thể
                            xóa hoặc ẩn danh thông tin đó.
                        </p>

                    </div>


                    {{-- USER RIGHTS --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            9. Quyền của khách hàng
                        </h4>

                        <p>
                            Trong phạm vi pháp luật áp dụng, khách hàng có thể
                            yêu cầu WebList:
                        </p>

                        <ul>
                            <li>Kiểm tra thông tin cá nhân của mình.</li>
                            <li>Yêu cầu chỉnh sửa thông tin không chính xác.</li>
                            <li>
                                Yêu cầu xóa thông tin trong trường hợp phù hợp.
                            </li>
                            <li>
                                Yêu cầu hạn chế hoặc phản đối một số hoạt động
                                xử lý dữ liệu khi pháp luật cho phép.
                            </li>
                            <li>
                                Rút lại sự đồng ý đối với việc xử lý dữ liệu
                                trong trường hợp việc xử lý dựa trên sự đồng ý.
                            </li>
                        </ul>

                        <p class="mb-0">
                            Để thực hiện các yêu cầu liên quan đến thông tin cá
                            nhân, khách hàng có thể liên hệ với WebList thông
                            qua địa chỉ email hỗ trợ được công bố trên website.
                        </p>

                    </div>


                    {{-- THIRD PARTY LINKS --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            10. Liên kết đến website bên thứ ba
                        </h4>

                        <p class="mb-0">
                            Website WebList có thể chứa liên kết đến các website
                            hoặc dịch vụ của bên thứ ba. WebList không chịu
                            trách nhiệm về nội dung hoặc chính sách bảo mật
                            của các website bên thứ ba.
                        </p>

                    </div>


                    {{-- CHANGES --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            11. Thay đổi chính sách
                        </h4>

                        <p class="mb-0">
                            WebList có thể cập nhật Chính sách bảo mật và quyền
                            riêng tư khi cần thiết để phù hợp với thay đổi về
                            sản phẩm, dịch vụ, công nghệ hoặc quy định pháp luật.
                            Phiên bản cập nhật sẽ được đăng tải trên website
                            cùng với ngày cập nhật tương ứng.
                        </p>

                    </div>


                    {{-- CONTACT --}}
                    <div>

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            12. Liên hệ
                        </h4>

                        <p>
                            Nếu bạn có câu hỏi hoặc yêu cầu liên quan đến Chính
                            sách bảo mật và quyền riêng tư, vui lòng liên hệ:
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
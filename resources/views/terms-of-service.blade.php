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
                <i class="bi bi-file-earmark-text me-1"></i>
                ĐIỀU KHOẢN
            </span>

            <h1
                class="fw-bold mb-3"
                style="color: #2b1404;"
            >
                Điều khoản sử dụng
            </h1>

            <p class="text-muted mb-0">
                Các điều khoản áp dụng khi sử dụng dịch vụ của WebList
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
                            Chào mừng bạn đến với WebList – nền tảng cung cấp
                            website và các sản phẩm kỹ thuật số được thiết kế
                            nhằm hỗ trợ cá nhân, doanh nghiệp và các dự án
                            trực tuyến.
                        </p>

                        <p class="mb-0">
                            Khi truy cập, đăng ký tài khoản, mua sản phẩm hoặc
                            sử dụng bất kỳ dịch vụ nào trên WebList, bạn đồng ý
                            tuân thủ các Điều khoản sử dụng này.
                        </p>

                    </div>


                    {{-- 2 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            2. Tài khoản người dùng
                        </h4>

                        <p>
                            Một số chức năng trên WebList có thể yêu cầu người
                            dùng đăng ký tài khoản.
                        </p>

                        <p>
                            Khi đăng ký tài khoản, bạn cam kết cung cấp thông
                            tin chính xác, đầy đủ và cập nhật khi cần thiết.
                        </p>

                        <p>
                            Người dùng có trách nhiệm bảo mật thông tin đăng
                            nhập và chịu trách nhiệm đối với các hoạt động được
                            thực hiện thông qua tài khoản của mình.
                        </p>

                        <p class="mb-0">
                            Nếu phát hiện tài khoản có dấu hiệu bị truy cập trái
                            phép, người dùng cần thông báo cho WebList trong
                            thời gian sớm nhất.
                        </p>

                    </div>


                    {{-- 3 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            3. Sản phẩm kỹ thuật số
                        </h4>

                        <p>
                            Các sản phẩm được cung cấp trên WebList có thể bao
                            gồm website, giao diện, mã nguồn, template,
                            tài nguyên thiết kế và các sản phẩm kỹ thuật số
                            khác.
                        </p>

                        <p>
                            Thông tin về tính năng, yêu cầu hệ thống, phạm vi
                            sử dụng và các điều kiện liên quan sẽ được mô tả
                            trên trang sản phẩm hoặc trong tài liệu đi kèm.
                        </p>

                        <p class="mb-0">
                            Người dùng có trách nhiệm kiểm tra thông tin sản
                            phẩm trước khi thực hiện giao dịch.
                        </p>

                    </div>


                    {{-- 4 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            4. Quyền sử dụng sản phẩm
                        </h4>

                        <p>
                            Việc mua một sản phẩm trên WebList không mặc nhiên
                            đồng nghĩa với việc người mua được sở hữu toàn bộ
                            quyền sở hữu trí tuệ đối với sản phẩm.
                        </p>

                        <p>
                            Trừ khi có quy định khác trên trang sản phẩm hoặc
                            trong thỏa thuận riêng, người mua chỉ được sử dụng
                            sản phẩm trong phạm vi và mục đích được WebList
                            cho phép.
                        </p>

                        <p>
                            Người dùng không được tự ý sao chép, phân phối,
                            bán lại, cho thuê, chia sẻ hoặc cung cấp sản phẩm
                            cho bên thứ ba nếu hành vi đó vi phạm điều kiện
                            cấp phép của sản phẩm.
                        </p>

                        <p class="mb-0">
                            Đối với các sản phẩm có giấy phép hoặc điều kiện sử
                            dụng riêng, điều kiện được công bố cùng sản phẩm
                            sẽ được ưu tiên áp dụng.
                        </p>

                    </div>


                    {{-- 5 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            5. Giá sản phẩm và thanh toán
                        </h4>

                        <p>
                            Giá bán của sản phẩm được hiển thị trên WebList tại
                            thời điểm khách hàng thực hiện giao dịch.
                        </p>

                        <p>
                            WebList có quyền thay đổi giá sản phẩm, chương
                            trình khuyến mãi hoặc ưu đãi vào bất kỳ thời điểm
                            nào. Những thay đổi này không ảnh hưởng đến các
                            giao dịch đã được xác nhận trước đó, trừ khi có
                            thỏa thuận khác.
                        </p>

                        <p class="mb-0">
                            Khách hàng có trách nhiệm cung cấp thông tin cần
                            thiết và thực hiện thanh toán theo phương thức được
                            WebList hỗ trợ.
                        </p>

                    </div>


                    {{-- 6 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            6. Cung cấp sản phẩm
                        </h4>

                        <p>
                            Đối với sản phẩm kỹ thuật số, sau khi giao dịch được
                            xác nhận thành công, WebList có thể cung cấp sản
                            phẩm thông qua tài khoản người dùng, liên kết tải
                            xuống hoặc phương thức kỹ thuật phù hợp khác.
                        </p>

                        <p>
                            Quyền tải xuống hoặc sử dụng sản phẩm có thể phụ
                            thuộc vào trạng thái thanh toán và điều kiện của
                            từng sản phẩm.
                        </p>

                        <p class="mb-0">
                            Người dùng không được chia sẻ liên kết tải xuống
                            hoặc thông tin truy cập sản phẩm cho người khác
                            nếu điều này vi phạm điều kiện sử dụng.
                        </p>

                    </div>


                    {{-- 7 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            7. Hành vi bị nghiêm cấm
                        </h4>

                        <p>
                            Khi sử dụng WebList, người dùng không được:
                        </p>

                        <ul>
                            <li>
                                Sử dụng website cho mục đích trái pháp luật.
                            </li>

                            <li>
                                Cố gắng truy cập trái phép vào hệ thống,
                                tài khoản hoặc dữ liệu của người khác.
                            </li>

                            <li>
                                Can thiệp, phá hoại hoặc gây ảnh hưởng đến
                                hoạt động bình thường của website.
                            </li>

                            <li>
                                Sử dụng công cụ hoặc phương thức tự động nhằm
                                khai thác trái phép dữ liệu hoặc sản phẩm.
                            </li>

                            <li>
                                Sao chép, phân phối hoặc bán lại sản phẩm
                                trái với điều kiện cấp phép.
                            </li>

                            <li>
                                Sử dụng tài khoản của người khác mà không được
                                phép.
                            </li>

                            <li>
                                Thực hiện hành vi gian lận hoặc lợi dụng hệ
                                thống thanh toán.
                            </li>
                        </ul>

                    </div>


                    {{-- 8 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            8. Quyền sở hữu trí tuệ
                        </h4>

                        <p>
                            Các nội dung thuộc WebList, bao gồm nhưng không
                            giới hạn ở logo, thương hiệu, giao diện website,
                            nội dung, hình ảnh, mã nguồn và tài nguyên được
                            WebList sở hữu hoặc được cấp quyền sử dụng, đều
                            được bảo vệ theo quy định pháp luật hiện hành.
                        </p>

                        <p class="mb-0">
                            Việc mua hoặc sử dụng sản phẩm không đồng nghĩa với
                            việc chuyển giao quyền sở hữu trí tuệ, trừ khi có
                            thỏa thuận rõ ràng khác.
                        </p>

                    </div>


                    {{-- 9 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            9. Trách nhiệm của WebList
                        </h4>

                        <p>
                            WebList nỗ lực duy trì website và dịch vụ hoạt động
                            ổn định, an toàn và chính xác.
                        </p>

                        <p>
                            Tuy nhiên, WebList không đảm bảo website sẽ luôn
                            hoạt động liên tục hoặc không xảy ra lỗi trong mọi
                            trường hợp.
                        </p>

                        <p class="mb-0">
                            Website có thể tạm thời không khả dụng do bảo trì,
                            nâng cấp, sự cố kỹ thuật hoặc các nguyên nhân nằm
                            ngoài khả năng kiểm soát hợp lý của WebList.
                        </p>

                    </div>


                    {{-- 10 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            10. Trách nhiệm của người dùng
                        </h4>

                        <p>
                            Người dùng chịu trách nhiệm đối với việc sử dụng
                            website, tài khoản và các sản phẩm đã mua.
                        </p>

                        <p class="mb-0">
                            Người dùng không được sử dụng sản phẩm hoặc dịch vụ
                            của WebList để thực hiện các hành vi vi phạm pháp
                            luật hoặc xâm phạm quyền và lợi ích hợp pháp của
                            tổ chức, cá nhân khác.
                        </p>

                    </div>


                    {{-- 11 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            11. Tạm ngừng hoặc chấm dứt tài khoản
                        </h4>

                        <p>
                            WebList có quyền tạm ngừng hoặc hạn chế quyền truy
                            cập tài khoản trong trường hợp phát hiện hành vi
                            gian lận, lạm dụng hệ thống, vi phạm Điều khoản sử
                            dụng hoặc có yêu cầu từ cơ quan có thẩm quyền.
                        </p>

                        <p class="mb-0">
                            Trong trường hợp phù hợp, WebList có thể xem xét
                            và hỗ trợ người dùng giải quyết vấn đề trước khi
                            áp dụng biện pháp hạn chế tài khoản.
                        </p>

                    </div>


                    {{-- 12 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            12. Liên kết đến bên thứ ba
                        </h4>

                        <p class="mb-0">
                            WebList có thể cung cấp liên kết đến website hoặc
                            dịch vụ của bên thứ ba. Những website này hoạt động
                            theo điều khoản và chính sách riêng của họ.
                            WebList không chịu trách nhiệm đối với nội dung,
                            dịch vụ hoặc chính sách của các website bên thứ ba.
                        </p>

                    </div>


                    {{-- 13 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            13. Thay đổi điều khoản
                        </h4>

                        <p class="mb-0">
                            WebList có thể cập nhật hoặc thay đổi Điều khoản
                            sử dụng khi cần thiết để phù hợp với hoạt động
                            kinh doanh, sản phẩm, dịch vụ, công nghệ hoặc quy
                            định pháp luật.
                        </p>

                    </div>


                    {{-- 14 --}}
                    <div class="mb-5">

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            14. Luật áp dụng
                        </h4>

                        <p class="mb-0">
                            Các Điều khoản sử dụng này được áp dụng và giải
                            thích theo pháp luật Việt Nam, trong phạm vi pháp
                            luật hiện hành.
                        </p>

                    </div>


                    {{-- 15 --}}
                    <div>

                        <h4
                            class="fw-bold mb-3"
                            style="color: #8b5412;"
                        >
                            15. Liên hệ
                        </h4>

                        <p>
                            Nếu bạn có câu hỏi liên quan đến Điều khoản sử dụng,
                            vui lòng liên hệ với WebList:
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
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">

    <title>
        Liên hệ WebList
    </title>
</head>

<body style="
    margin: 0;
    padding: 0;
    background: #f5f5f5;
    font-family: Arial, Helvetica, sans-serif;
">

    <div style="
        max-width: 650px;
        margin: 30px auto;
        background: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #e5e5e5;
    ">

        {{-- Header --}}
        <div style="
            background: linear-gradient(to right, #2b1404, #976017);
            padding: 30px;
            text-align: center;
            color: #eef5ea;
        ">
            {{-- Logo --}}
            <img
                src="{{ asset('images/LOGOWEB.png') }}"
                alt="WebList Logo"
                style="
                    width: 90px;
                    height: 90px;
                    object-fit: cover;
                    border-radius: 50%;
                    display: block;
                    margin: 0 auto 15px;
                    border: 3px solid #e9d3b4;
                "
            >

            <h1 style="
                margin: 0;
                font-size: 28px;
            ">
                WebList
            </h1>

            <p style="
                margin: 10px 0 0;
                color: #e9d3b4;
            ">
                Có khách hàng mới gửi liên hệ
            </p>

        </div>


        {{-- Content --}}
        <div style="
            padding: 30px;
        ">

            <h2 style="
                color: #2b1404;
                margin-top: 0;
            ">
                Thông tin liên hệ
            </h2>


            <p>
                <strong>Họ và tên:</strong>
                {{ $name }}
            </p>


            <p>
                <strong>Email:</strong>
                {{ $contactMessage }}
            </p>


            <p>
                <strong>Chủ đề:</strong>
                {{ $contactSubject }}
            </p>


            <div style="
                margin-top: 25px;
                padding: 20px;
                background: #f8f6f3;
                border-left: 4px solid #976017;
                border-radius: 6px;
            ">

                <strong>Nội dung:</strong>

                <p style="
                    line-height: 1.7;
                    white-space: pre-line;
                    margin-bottom: 0;
                ">
                    {{ $contactMessage }}
                </p>

            </div>

        </div>


        {{-- Footer --}}
        <div style="
            padding: 20px 30px;
            background: #2b1404;
            color: #eef5ea;
            text-align: center;
            font-size: 13px;
        ">

            Email được gửi từ form liên hệ của WebList.

        </div>

    </div>

</body>

</html>
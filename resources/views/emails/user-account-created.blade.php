<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thông tin tài khoản</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6;">

    <h2>Xin chào {{ $name }},</h2>

    

    <p>
        Tài khoản của bạn đã được tạo thành công.
    </p>

    <p>
        Dưới đây là thông tin đăng nhập:
    </p>

    <table cellpadding="8" cellspacing="0">
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $email }}</td>
        </tr>

        <tr>
            <td><strong>Mật khẩu:</strong></td>
            <td>{{ $password }}</td>
        </tr>
    </table>

    <p>
        Vui lòng đăng nhập và thay đổi mật khẩu sau lần đăng nhập đầu tiên.
    </p>

    <p>
        Trân trọng,<br>
        Ban quản trị
    </p>

</body>

</html>
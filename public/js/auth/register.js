const form = document.getElementById("registerForm");
//Submit form(Là nút bấm form nếu form sai thì dừng việc chuyển trang lại)
form.addEventListener("submit", function (e) {
    //Nếu phần nào nhập đúng thì bỏ lỗi và viền dòng đó
    clearErrors();

    let valid = true;

    valid = validateName() && valid;
    valid = validateEmail() && valid;
    valid = validatePhone() && valid;
    valid = validatePassword() && valid;
    valid = validateConfirmPassword() && valid;

    if (!valid) {
        e.preventDefault();
    }
});

//Validate name(Kiểm tra trường name có rỗng không?)
function validateName() {
    const input = document.getElementById("name");
    const value = input.value.trim();

    if (value === "") {
        setInvalid("name", "nameError", "Vui lòng nhập họ tên");
        return false;
    }

    setValid("name", "nameError");
    return true;
}
//Validate email(Kiểm tra trường email có rỗng không và nhập vào có đúng dịnh dạng email không?)
function validateEmail() {
    const input = document.getElementById("email");
    const value = input.value.trim();

    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (value === "") {
        setInvalid("email", "emailError", "Vui lòng nhập email");
        return false;
    }

    if (!regex.test(value)) {
        setInvalid("email", "emailError", "Email không đúng định dạng");
        return false;
    }

    //Không gọi setValid nữa
    // setValid("email", "emailError");
    return true;
}

//Validate phone(Kiểm tra số điện thoại có rỗng không và có nhập vào đủ 10 số trở lên không?)
function validatePhone() {
    const input = document.getElementById("phone");
    const value = input.value.trim();

    const regex = /^[0-9]{10}$/;

    if (value === "") {
        setInvalid("phone", "phoneError", "Vui lòng nhập số điện thoại");
        return false;
    }

    if (!regex.test(value)) {
        setInvalid("phone", "phoneError", "Số điện thoại phải gồm 10 chữ số");
        return false;
    }

    setValid("phone", "phoneError");
    return true;
}

//validate password (Kiểm tra xem password có rỗng không và password có >= 6 ký tự không?)
function validatePassword() {
    const input = document.getElementById("password");
    const value = input.value;

    if (value === "") {
        setInvalid("password", "passwordError", "Vui lòng nhập mật khẩu");
        return false;
    }

    if (value.length < 6) {
        setInvalid(
            "password",
            "passwordError",
            "Mật khẩu phải có ít nhất 6 ký tự",
        );
        return false;
    }

    setValid("password", "passwordError");
    return true;
}

//Validate confirmation(Kiểm tra xác nhận password có rỗng không và có giống password không?)
function validateConfirmPassword() {
    const password = document.getElementById("password").value;
    const confirm = document.getElementById("password_confirmation").value;

    if (confirm === "") {
        setInvalid(
            "password_confirmation",
            "confirmError",
            "Vui lòng xác nhận mật khẩu",
        );
        return false;
    }

    if (password !== confirm) {
        setInvalid(
            "password_confirmation",
            "confirmError",
            "Mật khẩu xác nhận không khớp",
        );
        return false;
    }

    setValid("password_confirmation", "confirmError");
    return true;
}

//Thiết lập khi nhập sai thì hiện thông báo lỗi và viền đỏ
function setInvalid(inputId, errorId, message) {
    const input = document.getElementById(inputId);

    input.classList.remove("is-valid");
    input.classList.add("is-invalid");

    document.getElementById(errorId).textContent = message;
}

//Thiết lập khi nhập đúng thị hiện viền xanh
function setValid(inputId, errorId) {
    const input = document.getElementById(inputId);

    input.classList.remove("is-invalid");
    input.classList.add("is-valid");

    document.getElementById(errorId).textContent = "";
}

/*
    Hàm addInputListeners()
    Chức năng: Tự động kiểm tra dữ liệu ngay lập tức khi người dùng gõ phím (Real-time Validation).

    Cách hoạt động:

    Tìm các ô nhập liệu theo id (Họ tên, Email, Số điện thoại, Mật khẩu, Xậc nhận mật khẩu).

    Lắng nghe sự kiện "input" (mỗi khi giá trị trong ô thay đổi).

    Chạy ngay hàm kiểm tra tương ứng (ví dụ: gõ vào ô email thì hàm validateEmail sẽ chạy ngay 
    để check xem email đúng định dạng chưa).
*/

function addInputListeners() {
    let emailTimer = null;
    document.getElementById("name").addEventListener("input", validateName);
    // document.getElementById("email").addEventListener("input", validateEmail);
    document.getElementById("email").addEventListener("input", function () {
        // Hủy lần kiểm tra trước nếu người dùng vẫn đang gõ
        clearTimeout(emailTimer);

        // Kiểm tra rỗng và định dạng trước
        if (!validateEmail()) {
            return;
        }

        // Hiện trạng thái đang kiểm tra
        document.getElementById("emailError").textContent =
            "Đang kiểm tra email...";

        // Đợi 700ms sau khi người dùng ngừng gõ mới gọi API
        emailTimer = setTimeout(() => {
            checkEmailExists();
        }, 700);
    });
    document.getElementById("phone").addEventListener("input", validatePhone);
    document
        .getElementById("password")
        .addEventListener("input", validatePassword);
    document
        .getElementById("password_confirmation")
        .addEventListener("input", validateConfirmPassword);
}

/*
    Chức năng: Xóa sạch tất cả thông báo lỗi đang hiển thị trên giao diện.

    Cách hoạt động:

    Duyệt qua danh sách các id của thẻ chứa lỗi (nameError, emailError,...).

    Đặt nội dung chữ (textContent) của các thẻ này về rỗng "".

    Thường được gọi trước khi người dùng nhấn nút "Nhập lại" (Reset) 
    hoặc trước khi thực hiện một lượt kiểm tra dữ liệu mới.
*/
function clearErrors() {
    [
        "nameError",
        "emailError",
        "phoneError",
        "passwordError",
        "confirmError",
    ].forEach((id) => {
        document.getElementById(id).textContent = "";
    });
}

//Kiểm tra email có tồn tại hay không?
async function checkEmailExists() {
    const input = document.getElementById("email");
    const email = input.value.trim();

    // Kiểm tra định dạng trước
    if (!validateEmail()) {
        return;
    }

    try {
        const response = await fetch("/check-email", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]',
                ).content,
            },
            body: JSON.stringify({
                email: email,
            }),
        });

        const result = await response.json();

        if (!result.valid) {
            setInvalid("email", "emailError", result.message);
        } else {
            setValid("email", "emailError");
        }
    } catch (error) {
        console.error(error);
    }
}

addInputListeners();

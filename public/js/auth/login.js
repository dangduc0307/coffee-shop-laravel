const form = document.getElementById("loginForm");
//Submit form(Là nút bấm form nếu form sai thì dừng việc chuyển trang lại)
form.addEventListener("submit", function (e) {
    clearErrors();

    let valid = true;

    valid = validateEmail() && valid;
    valid = validatePassword() && valid;

    if (!valid) {
        e.preventDefault();
    }
});

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

    setValid("email", "emailError");
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

*/
function addInputListeners() {
    document.getElementById("email").addEventListener("input", validateEmail);
    document
        .getElementById("password")
        .addEventListener("input", validatePassword);
}

/*
    Chức năng: Xóa sạch tất cả thông báo lỗi đang hiển thị trên giao diện.

*/
function clearErrors() {
    ["emailError", "passwordError"].forEach((id) => {
        document.getElementById(id).textContent = "";
    });
}

addInputListeners();

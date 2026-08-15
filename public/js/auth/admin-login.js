const form = document.getElementById("adminLoginForm");

// Submit form
form.addEventListener("submit", function (e) {
    clearErrors();

    let valid = true;

    valid = validateEmail() && valid;
    valid = validatePassword() && valid;

    if (!valid) {
        e.preventDefault();
    }
});

// Validate email
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

// Validate password
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

// Thiết lập lỗi
function setInvalid(inputId, errorId, message) {
    const input = document.getElementById(inputId);

    input.classList.remove("is-valid");
    input.classList.add("is-invalid");

    document.getElementById(errorId).textContent = message;
}

// Thiết lập hợp lệ
function setValid(inputId, errorId) {
    const input = document.getElementById(inputId);

    input.classList.remove("is-invalid");
    input.classList.add("is-valid");

    document.getElementById(errorId).textContent = "";
}

// Real-time validation
function addInputListeners() {
    document.getElementById("email").addEventListener("input", validateEmail);

    document
        .getElementById("password")
        .addEventListener("input", validatePassword);
}

// Xóa lỗi
function clearErrors() {
    ["emailError", "passwordError"].forEach((id) => {
        document.getElementById(id).textContent = "";
    });
}

addInputListeners();

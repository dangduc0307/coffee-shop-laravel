//Hàm phát hiện lỗi
function showError(id, message) {
    const input = document.getElementById(id);

    input.classList.add("is-invalid");

    document.getElementById(id + "-error").textContent = message;
}

//Hàm xóa lỗi
function clearError(id) {
    const input = document.getElementById(id);

    input.classList.remove("is-invalid");

    document.getElementById(id + "-error").textContent = "";
}

//Hàm validate

function validateProduct() {
    let valid = true;

    clearError("name");
    clearError("price");
    clearError("stock");

    if (document.getElementById("name").value.trim() === "") {
        showError("name", "Vui lòng nhập tên sản phẩm");

        valid = false;
    }

    if (document.getElementById("description").value.trim() === "") {
        showError("description", "Vui lòng nhập mô tả");
        valid = false;
    }

    if (document.getElementById("price").value === "") {
        showError("price", "Vui lòng nhập giá");

        valid = false;
    }

    if (document.getElementById("stock").value === "") {
        showError("stock", "Vui lòng nhập tồn kho");

        valid = false;
    }

    if (document.getElementById("thumbnail").files.length === 0) {
        showError("thumbnail", "Vui lòng chọn ảnh đại diện");
        valid = false;
    }

    return valid;
}

//Kiểm tra người dùng đang nhập tên (có nghĩa là khi họ nhập đúng thì tắt hiển thị lỗi)
document.getElementById("name").addEventListener("input", function () {
    if (this.value.trim() !== "") {
        clearError("name");
    } else {
        showError("name", "Vui lòng nhập tên sản phẩm");
    }
});

// Kiểm tra người dùng đang nhập mô tả (có nghĩa là khi họ nhập đúng thì tắt hiển thị lỗi)
document.getElementById("description").addEventListener("input", function () {
    if (this.value.trim() !== "") {
        clearError("description");
    } else {
        showError("description", "Vui lòng nhập mô tả");
    }
});

//Kiểm tra người dùng đang nhập giá (có nghĩa là khi họ nhập đúng thì tắt hiển thị lỗi)
document.getElementById("price").addEventListener("input", function () {
    if (this.value !== "") {
        clearError("price");
    } else {
        showError("price", "Vui lòng nhập giá");
    }
});

//Kiểm tra người dùng đang nhập hàng tồn kho (có nghĩa là khi họ nhập đúng thì tắt hiển thị lỗi)
document.getElementById("stock").addEventListener("input", function () {
    if (this.value !== "") {
        clearError("stock");
    } else {
        showError("stock", "Vui lòng nhập giá");
    }
});

// Kiểm tra người dùng chọn ảnh (có nghĩa là khi họ nhập đúng thì tắt hiển thị lỗi)
document.getElementById("thumbnail").addEventListener("change", function () {
    if (this.files.length > 0) {
        clearError("thumbnail");
    } else {
        showError("thumbnail", "Vui lòng chọn ảnh đại diện");
    }
});

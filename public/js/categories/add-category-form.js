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

function validateCategory() {
    let valid = true;

    clearError("name");
    clearError("description");

    if (document.getElementById("name").value.trim() === "") {
        showError("name", "Vui lòng nhập vào tên loại sản phẩm!");
        valid = false;
    }

    if (document.getElementById("description").value.trim() === "") {
        showError("description", "Vui lòng nhập vào mô tả loại sản phẩm!");
        valid = false;
    }

    if (document.getElementById("image").value.trim() === "") {
        showError("image", "Vui lòng nhập vào mô tả loại sản phẩm!");
        valid = false;
    }

    return valid;
}

document.getElementById("name").addEventListener("input", function () {
    if (this.value.trim() !== "") {
        clearError("name");
    } else {
        showError("name", "Vui lòng nhập vào tên loại sản phẩm!");
    }
});

document.getElementById("description").addEventListener("input", function () {
    if (this.value.trim() !== "") {
        clearError("description");
    } else {
        showError("description", "Vui lòng nhập vào mô tả loại sản phẩm");
    }
});

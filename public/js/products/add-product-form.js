// ===============================
// HÀM PHÁT HIỆN LỖI
// ===============================

function showError(id, message) {
    const input = document.getElementById(id);

    input.classList.add("is-invalid");

    document.getElementById(id + "-error").textContent = message;
}

// ===============================
// HÀM XÓA LỖI
// ===============================

function clearError(id) {
    const input = document.getElementById(id);

    input.classList.remove("is-invalid");

    document.getElementById(id + "-error").textContent = "";
}

// ===============================
// VALIDATE PRODUCT
// ===============================

function validateProduct() {
    let valid = true;

    // Xóa lỗi cũ

    clearError("name_vi");
    clearError("name_en");

    clearError("description_vi");
    clearError("description_en");

    clearError("price");
    clearError("thumbnail");
    clearError("file");
    clearError("file_size");
    clearError("demo_url");
    clearError("documentation_url");
    clearError("requirements");

    // Tên tiếng Việt

    if (document.getElementById("name_vi").value.trim() === "") {
        showError("name_vi", "Vui lòng nhập tên sản phẩm");

        valid = false;
    }

    // Tên tiếng Anh

    if (document.getElementById("name_en").value.trim() === "") {
        showError("name_en", "Vui lòng nhập tên sản phẩm bằng tiếng Anh");

        valid = false;
    }

    // Mô tả tiếng Việt

    if (document.getElementById("description_vi").value.trim() === "") {
        showError("description_vi", "Vui lòng nhập mô tả");

        valid = false;
    }

    // Mô tả tiếng Anh

    if (document.getElementById("description_en").value.trim() === "") {
        showError("description_en", "Vui lòng nhập mô tả bằng tiếng Anh");

        valid = false;
    }

    // Giá

    if (document.getElementById("price").value === "") {
        showError("price", "Vui lòng nhập giá");

        valid = false;
    }

    // Thumbnail

    if (document.getElementById("thumbnail").files.length === 0) {
        showError("thumbnail", "Vui lòng chọn ảnh đại diện");

        valid = false;
    }

    // File source

    if (document.getElementById("file").files.length === 0) {
        showError("file", "Vui lòng chọn file source");

        valid = false;
    }

    return valid;
}

// ===============================
// NAME VI
// ===============================

document.getElementById("name_vi").addEventListener("input", function () {
    if (this.value.trim() !== "") {
        clearError("name_vi");
    } else {
        showError("name_vi", "Vui lòng nhập tên sản phẩm");
    }
});

// ===============================
// NAME EN
// ===============================

document.getElementById("name_en").addEventListener("input", function () {
    if (this.value.trim() !== "") {
        clearError("name_en");
    } else {
        showError("name_en", "Vui lòng nhập tên sản phẩm bằng tiếng Anh");
    }
});

// ===============================
// DESCRIPTION VI
// ===============================

document
    .getElementById("description_vi")
    .addEventListener("input", function () {
        if (this.value.trim() !== "") {
            clearError("description_vi");
        } else {
            showError("description_vi", "Vui lòng nhập mô tả");
        }
    });

// ===============================
// DESCRIPTION EN
// ===============================

document
    .getElementById("description_en")
    .addEventListener("input", function () {
        if (this.value.trim() !== "") {
            clearError("description_en");
        } else {
            showError("description_en", "Vui lòng nhập mô tả bằng tiếng Anh");
        }
    });

// ===============================
// PRICE
// ===============================

document.getElementById("price").addEventListener("input", function () {
    if (this.value !== "") {
        clearError("price");
    } else {
        showError("price", "Vui lòng nhập giá");
    }
});

// ===============================
// THUMBNAIL
// ===============================

document.getElementById("thumbnail").addEventListener("change", function () {
    if (this.files.length > 0) {
        clearError("thumbnail");
    } else {
        showError("thumbnail", "Vui lòng chọn ảnh đại diện");
    }
});

// ===============================
// FILE SOURCE
// ===============================

document.getElementById("file").addEventListener("change", function () {
    if (this.files.length > 0) {
        clearError("file");
    } else {
        showError("file", "Vui lòng chọn file source");
    }
});

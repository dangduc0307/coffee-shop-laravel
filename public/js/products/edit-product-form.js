function validateEditProduct() {
    let valid = true;

    // Xóa lỗi cũ

    clearError("edit_name_vi");
    clearError("edit_name_en");

    clearError("edit_description_vi");
    clearError("edit_description_en");

    clearError("edit_price");
    clearError("edit_stock");
    clearError("edit_thumbnail");

    // ===============================
    // NAME VI
    // ===============================

    if (document.getElementById("edit_name_vi").value.trim() === "") {
        showError("edit_name_vi", "Vui lòng nhập tên sản phẩm");

        valid = false;
    }

    // ===============================
    // NAME EN
    // ===============================

    if (document.getElementById("edit_name_en").value.trim() === "") {
        showError("edit_name_en", "Vui lòng nhập tên sản phẩm bằng tiếng Anh");

        valid = false;
    }

    // ===============================
    // DESCRIPTION VI
    // ===============================

    if (document.getElementById("edit_description_vi").value.trim() === "") {
        showError("edit_description_vi", "Vui lòng nhập mô tả");

        valid = false;
    }

    // ===============================
    // DESCRIPTION EN
    // ===============================

    if (document.getElementById("edit_description_en").value.trim() === "") {
        showError("edit_description_en", "Vui lòng nhập mô tả bằng tiếng Anh");

        valid = false;
    }

    // ===============================
    // PRICE
    // ===============================

    if (document.getElementById("edit_price").value === "") {
        showError("edit_price", "Vui lòng nhập giá");

        valid = false;
    }

    // ===============================
    // STOCK
    // ===============================

    if (document.getElementById("edit_stock").value === "") {
        showError("edit_stock", "Vui lòng nhập tồn kho");

        valid = false;
    }

    return valid;
}

// ===============================
// NAME VI
// ===============================

document.getElementById("edit_name_vi").addEventListener("input", function () {
    if (this.value.trim() !== "") {
        clearError("edit_name_vi");
    } else {
        showError("edit_name_vi", "Vui lòng nhập tên sản phẩm");
    }
});

// ===============================
// NAME EN
// ===============================

document.getElementById("edit_name_en").addEventListener("input", function () {
    if (this.value.trim() !== "") {
        clearError("edit_name_en");
    } else {
        showError("edit_name_en", "Vui lòng nhập tên sản phẩm bằng tiếng Anh");
    }
});

// ===============================
// DESCRIPTION VI
// ===============================

document
    .getElementById("edit_description_vi")
    .addEventListener("input", function () {
        if (this.value.trim() !== "") {
            clearError("edit_description_vi");
        } else {
            showError("edit_description_vi", "Vui lòng nhập mô tả");
        }
    });

// ===============================
// DESCRIPTION EN
// ===============================

document
    .getElementById("edit_description_en")
    .addEventListener("input", function () {
        if (this.value.trim() !== "") {
            clearError("edit_description_en");
        } else {
            showError(
                "edit_description_en",
                "Vui lòng nhập mô tả bằng tiếng Anh",
            );
        }
    });

// ===============================
// PRICE
// ===============================

document.getElementById("edit_price").addEventListener("input", function () {
    if (this.value !== "") {
        clearError("edit_price");
    } else {
        showError("edit_price", "Vui lòng nhập giá");
    }
});

// ===============================
// STOCK
// ===============================

document.getElementById("edit_stock").addEventListener("input", function () {
    if (this.value !== "") {
        clearError("edit_stock");
    } else {
        showError("edit_stock", "Vui lòng nhập tồn kho");
    }
});

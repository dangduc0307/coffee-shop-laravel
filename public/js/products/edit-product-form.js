function validateEditProduct() {
    let valid = true;

    clearError("edit_name");
    clearError("edit_description");
    clearError("edit_price");
    clearError("edit_stock");
    clearError("edit_thumbnail");

    if (document.getElementById("edit_name").value.trim() === "") {
        showError("edit_name", "Vui lòng nhập tên sản phẩm");
        valid = false;
    }

    if (document.getElementById("edit_description").value.trim() === "") {
        showError("edit_description", "Vui lòng nhập mô tả");
        valid = false;
    }

    if (document.getElementById("edit_price").value === "") {
        showError("edit_price", "Vui lòng nhập giá");
        valid = false;
    }

    if (document.getElementById("edit_stock").value === "") {
        showError("edit_stock", "Vui lòng nhập tồn kho");
        valid = false;
    }

    return valid;
}

document.getElementById("edit_name").addEventListener("input", function () {
    if (this.value.trim() !== "") {
        clearError("edit_name");
    } else {
        showError("edit_name", "Vui lòng nhập tên sản phẩm");
    }
});

document
    .getElementById("edit_description")
    .addEventListener("input", function () {
        if (this.value.trim() !== "") {
            clearError("edit_description");
        } else {
            showError("edit_description", "Vui lòng nhập mô tả");
        }
    });

document.getElementById("edit_price").addEventListener("input", function () {
    if (this.value !== "") {
        clearError("edit_price");
    } else {
        showError("edit_price", "Vui lòng nhập giá");
    }
});

document.getElementById("edit_stock").addEventListener("input", function () {
    if (this.value !== "") {
        clearError("edit_stock");
    } else {
        showError("edit_stock", "Vui lòng nhập tồn kho");
    }
});

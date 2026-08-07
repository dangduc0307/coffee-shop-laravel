function validateEditCategory() {
    let valid = true;
    clearError("edit_name");
    clearError("edit_description");

    if (document.getElementById("edit_name").value.trim() === "") {
        showError("edit_name", "Vui lòng nhập vào tên loại sản phẩm muốn sửa");
        valid = false;
    }

    if (document.getElementById("edit_description").value.trim() === "") {
        showError(
            "edit_description",
            "Vui lòng nhập vào mô tả loại sản phẩm muốn sửa",
        );
        valid = false;
    }

    return valid;
}

document.getElementById("edit_name").addEventListener("input", function () {
    if (this.value.trim() !== "") {
        clearError("edit_name");
    } else {
        showError("edit_name", "Vui lòng nhập vào tên loại sản phẩm muốn sửa");
    }
});

document
    .getElementById("edit_description")
    .addEventListener("input", function () {
        if (this.value.trim() !== "") {
            clearError("edit_description");
        } else {
            showError(
                "edit_description",
                "Vui lòng nhập vào mô tả loại sản phẩm muốn sửa",
            );
        }
    });

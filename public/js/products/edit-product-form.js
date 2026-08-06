function validateEditProduct() {
    //ban đầu mặc định cho rằng dữ liệu hợp lệ và nếu phát hiện lỗi thì nó sẽ đổi thành false;
    let valid = true;

    //Xóa toàn bộ lỗi cũ trước khi kiểm tra lại
    clearError("edit_name");
    clearError("edit_description");
    clearError("edit_price");
    clearError("edit_stock");
    clearError("edit_thumbnail");

    //Nếu người dùng chưa nhập vào thì thông báo lỗi chưa nhập name
    if (document.getElementById("edit_name").value.trim() === "") {
        showError("edit_name", "Vui lòng nhập tên sản phẩm");
        valid = false;
    }

    //Nếu người dùng chưa nhập vào thì thông báo lỗi chưa nhập description
    if (document.getElementById("edit_description").value.trim() === "") {
        showError("edit_description", "Vui lòng nhập mô tả");
        valid = false;
    }

    //Nếu người dùng chưa nhập vào thì thông báo lỗi chưa nhập price
    if (document.getElementById("edit_price").value === "") {
        showError("edit_price", "Vui lòng nhập giá");
        valid = false;
    }

    //Nếu người dùng chưa nhập vào thì thông báo lỗi chưa nhập stock
    if (document.getElementById("edit_stock").value === "") {
        showError("edit_stock", "Vui lòng nhập tồn kho");
        valid = false;
    }

    return valid;
}

//Kiểm tra khi người dùng đang nhập name
document.getElementById("edit_name").addEventListener("input", function () {
    if (this.value.trim() !== "") {
        clearError("edit_name");
    } else {
        showError("edit_name", "Vui lòng nhập tên sản phẩm");
    }
});

//Kiểm tra khi người dùng đang nhập description
document
    .getElementById("edit_description")
    .addEventListener("input", function () {
        if (this.value.trim() !== "") {
            clearError("edit_description");
        } else {
            showError("edit_description", "Vui lòng nhập mô tả");
        }
    });

//Kiểm tra khi người dùng đang nhập price
document.getElementById("edit_price").addEventListener("input", function () {
    if (this.value !== "") {
        clearError("edit_price");
    } else {
        showError("edit_price", "Vui lòng nhập giá");
    }
});

//Kiểm tra khi người dùng đang nhập stock
document.getElementById("edit_stock").addEventListener("input", function () {
    if (this.value !== "") {
        clearError("edit_stock");
    } else {
        showError("edit_stock", "Vui lòng nhập tồn kho");
    }
});

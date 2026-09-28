function validateEditProduct() {
    let valid = true;

    // Xóa lỗi cũ

    clearError("edit_name_vi");
    clearError("edit_name_en");

    clearError("edit_description_vi");
    clearError("edit_description_en");

    clearError("edit_price");

    clearError("edit_file_size");
    clearError("edit_demo_url");
    clearError("edit_documentation_url");
    clearError("edit_requirements");
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
    // VIDEO DEMO
    // ===============================

    const demoVideo = document.getElementById("edit_demo_url");

    if (demoVideo.files.length > 0) {
        const file = demoVideo.files[0];

        const allowedTypes = ["video/mp4", "video/webm", "video/ogg"];

        if (!allowedTypes.includes(file.type)) {
            showError(
                "edit_demo_url",
                "Video phải có định dạng MP4, WebM hoặc OGG",
            );

            valid = false;
        }
    }

    // ===============================
    // DOCUMENTATION URL
    // ===============================

    const documentationUrl = document
        .getElementById("edit_documentation_url")
        .value.trim();

    if (documentationUrl !== "") {
        try {
            new URL(documentationUrl);

            clearError("edit_documentation_url");
        } catch (error) {
            showError("edit_documentation_url", "Link hướng dẫn không hợp lệ");

            valid = false;
        }
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
// VIDEO DEMO
// ===============================

document
    .getElementById("edit_demo_url")
    .addEventListener("change", function () {
        if (this.files.length === 0) {
            clearError("edit_demo_url");
            return;
        }

        const file = this.files[0];

        const allowedTypes = ["video/mp4", "video/webm", "video/ogg"];

        if (!allowedTypes.includes(file.type)) {
            showError(
                "edit_demo_url",
                "Video phải có định dạng MP4, WebM hoặc OGG",
            );
        } else {
            clearError("edit_demo_url");
        }
    });

// ===============================
// DOCUMENTATION URL
// ===============================

document
    .getElementById("edit_documentation_url")
    .addEventListener("input", function () {
        const value = this.value.trim();

        if (value === "") {
            clearError("edit_documentation_url");
            return;
        }

        try {
            new URL(value);

            clearError("edit_documentation_url");
        } catch (error) {
            showError("edit_documentation_url", "Link hướng dẫn không hợp lệ");
        }
    });

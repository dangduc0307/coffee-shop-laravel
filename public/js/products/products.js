const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

// ===============================
// LOAD PRODUCTS
// ===============================

async function loadProducts(page = 1) {
    const keyword = document.getElementById("search-products").value;

    const response = await fetch(
        "/admin/products?page=" +
            page +
            "&search=" +
            encodeURIComponent(keyword),
        {
            headers: {
                Accept: "application/json",
            },
        },
    );

    const result = await response.json();

    renderTable(result.data);

    renderPagination(result);
}

// ===============================
// RENDER TABLE
// ===============================

function renderTable(products) {
    const table = document.getElementById("productTable");

    table.innerHTML = "";

    products.forEach((product) => {
        const locale = document.documentElement.lang || "vi";

        const fileName = product.file ? product.file.split("/").pop() : null;

        const fileHtml = fileName
            ? `<span title="${fileName}">${fileName}</span>`
            : `<span class="text-muted">Chưa có</span>`;

        const demoHtml = product.demo_url
            ? `
                <a
                    href="${product.demo_url}"
                    target="_blank"
                    class="btn btn-sm btn-primary">
                    Xem demo
                </a>
            `
            : `<span class="text-muted">Không có</span>`;

        const name = product.name?.[locale] ?? product.name?.vi ?? "";

        const description =
            product.description?.[locale] ?? product.description?.vi ?? "";

        table.innerHTML += `
            <tr>

                <td>
                    ${product.id}
                </td>

                <td>

                    ${
                        product.thumbnail
                            ? `
                                <img
                                    src="/uploaded-images/${product.thumbnail}"
                                    width="60">
                              `
                            : ""
                    }

                </td>

                <td>
                    ${name}
                </td>

                <td>
                    ${description}
                </td>

                <td>
                    ${product.category ? product.category.name : ""}
                </td>

                <td>
                    ${product.price}
                </td>

                <td>
                    ${fileHtml}
                </td>

                <td>
                    ${demoHtml}
                </td>

                <td>
                    ${product.featured ? "Có" : "Không"}
                </td>

                <td>
                    ${product.status ? "Hiển thị" : "Ẩn"}
                </td>

                <td>

                    ${
                        window.productPermissions.update
                            ? `
                                <button
                                    class="btn btn-warning btn-sm"
                                    onclick="editProduct(${product.id})">

                                    Sửa

                                </button>
                            `
                            : ""
                    }

                    ${
                        window.productPermissions.delete
                            ? `
                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="deleteProduct(${product.id})">

                                    Xóa

                                </button>
                            `
                            : ""
                    }

                </td>

            </tr>
        `;
    });
}

// ===============================
// PAGINATION
// ===============================

function renderPagination(result) {
    const pagination = document.getElementById("pagination");

    pagination.innerHTML = "";

    if (result.last_page <= 1) {
        return;
    }

    let html = `
        <nav>
            <ul class="pagination">
    `;

    // Previous

    html += `
        <li class="page-item ${result.current_page === 1 ? "disabled" : ""}">

            <button
                class="page-link"
                onclick="loadProducts(${result.current_page - 1})">

                Trước

            </button>

        </li>
    `;

    // Pages

    for (let page = 1; page <= result.last_page; page++) {
        html += `
            <li class="page-item ${
                page === result.current_page ? "active" : ""
            }">

                <button
                    class="page-link"
                    onclick="loadProducts(${page})">

                    ${page}

                </button>

            </li>
        `;
    }

    // Next

    html += `
        <li class="page-item ${
            result.current_page === result.last_page ? "disabled" : ""
        }">

            <button
                class="page-link"
                onclick="loadProducts(${result.current_page + 1})">

                Sau

            </button>

        </li>
    `;

    html += `
            </ul>
        </nav>
    `;

    pagination.innerHTML = html;
}

// ===============================
// ADD PRODUCT
// ===============================

async function addProduct() {
    if (!validateProduct()) {
        return;
    }

    const thumbnail = document.getElementById("thumbnail").files[0];

    const file = document.getElementById("file").files[0];

    const fileSize = document.getElementById("file_size").value;
    const demoUrl = document.getElementById("demo_url").value;
    const documentationUrl = document.getElementById("documentation_url").value;
    const requirements = document.getElementById("requirements").value;

    const nameVi = document.getElementById("name_vi").value;

    const nameEn = document.getElementById("name_en").value;

    const descriptionVi = document.getElementById("description_vi").value;

    const descriptionEn = document.getElementById("description_en").value;

    const category_id = document.getElementById("category_id").value;

    const price = document.getElementById("price").value;

    const featured = document.getElementById("featured").value;

    const status = document.getElementById("status").value;

    const formData = new FormData();

    if (thumbnail) {
        formData.append("thumbnail", thumbnail);
    }

    if (file) {
        formData.append("file", file);
    }

    // NAME

    formData.append("name[vi]", nameVi);

    formData.append("name[en]", nameEn);

    // DESCRIPTION

    formData.append("description[vi]", descriptionVi);

    formData.append("description[en]", descriptionEn);

    // OTHER FIELDS

    formData.append("category_id", category_id);

    formData.append("price", price);

    formData.append("featured", featured);

    formData.append("status", status);

    formData.append("file_size", fileSize);
    formData.append("demo_url", demoUrl);
    formData.append("documentation_url", documentationUrl);
    formData.append("requirements", requirements);

    await fetch("/admin/products", {
        method: "POST",

        headers: {
            "X-CSRF-TOKEN": csrfToken,
            Accept: "application/json",
        },

        body: formData,
    });

    const modal = bootstrap.Modal.getInstance(
        document.getElementById("addModal"),
    );

    modal.hide();

    // RESET FORM

    document.getElementById("thumbnail").value = "";

    document.getElementById("file").value = "";
    document.getElementById("file_size").value = "";
    document.getElementById("demo_url").value = "";
    document.getElementById("documentation_url").value = "";
    document.getElementById("requirements").value = "";

    document.getElementById("name_vi").value = "";

    document.getElementById("name_en").value = "";

    document.getElementById("description_vi").value = "";

    document.getElementById("description_en").value = "";

    document.getElementById("category_id").selectedIndex = 0;

    document.getElementById("price").value = "";

    document.getElementById("featured").selectedIndex = 0;

    document.getElementById("status").selectedIndex = 0;

    loadProducts();
}

// ===============================
// DELETE PRODUCT
// ===============================

async function deleteProduct(id) {
    await fetch("/admin/products/" + id, {
        method: "DELETE",

        headers: {
            "X-CSRF-TOKEN": csrfToken,
            Accept: "application/json",
        },
    });

    loadProducts();
}

// ===============================
// EDIT PRODUCT
// ===============================

async function editProduct(id) {
    clearError("edit_name_vi");
    clearError("edit_name_en");

    clearError("edit_description_vi");
    clearError("edit_description_en");

    clearError("edit_price");
    clearError("edit_thumbnail");

    const response = await fetch("/admin/products/" + id, {
        headers: {
            Accept: "application/json",
        },
    });

    const product = await response.json();

    document.getElementById("edit_id").value = product.id;

    // NAME

    document.getElementById("edit_name_vi").value = product.name?.vi ?? "";

    document.getElementById("edit_name_en").value = product.name?.en ?? "";

    // DESCRIPTION

    document.getElementById("edit_description_vi").value =
        product.description?.vi ?? "";

    document.getElementById("edit_description_en").value =
        product.description?.en ?? "";

    // OTHER FIELDS

    document.getElementById("edit_category_id").value = product.category_id;

    document.getElementById("edit_price").value = product.price;

    document.getElementById("edit_featured").value = product.featured;

    document.getElementById("edit_status").value = product.status;

    document.getElementById("edit_file_size").value = product.file_size ?? "";

    document.getElementById("edit_demo_url").value = product.demo_url ?? "";

    document.getElementById("edit_documentation_url").value =
        product.documentation_url ?? "";

    document.getElementById("edit_requirements").value =
        product.requirements ?? "";

    if (product.file) {
        document.getElementById("edit_file_current").textContent =
            "File hiện tại: " + product.file;
    } else {
        document.getElementById("edit_file_current").textContent =
            "Chưa có file source";
    }

    // THUMBNAIL

    if (product.thumbnail) {
        document.getElementById("edit_thumbnail_preview").src =
            "/uploaded-images/" + product.thumbnail;
    }

    const modal = new bootstrap.Modal(document.getElementById("editModal"));

    modal.show();
}

// ===============================
// UPDATE PRODUCT
// ===============================

async function updateProduct() {
    if (!validateEditProduct()) {
        return;
    }

    const id = document.getElementById("edit_id").value;

    const thumbnail = document.getElementById("edit_thumbnail").files[0];

    const file = document.getElementById("edit_file").files[0];

    const fileSize = document.getElementById("edit_file_size").value;

    const demoUrl = document.getElementById("edit_demo_url").value;

    const documentationUrl = document.getElementById(
        "edit_documentation_url",
    ).value;

    const requirements = document.getElementById("edit_requirements").value;

    const nameVi = document.getElementById("edit_name_vi").value;

    const nameEn = document.getElementById("edit_name_en").value;

    const descriptionVi = document.getElementById("edit_description_vi").value;

    const descriptionEn = document.getElementById("edit_description_en").value;

    const category_id = document.getElementById("edit_category_id").value;

    const price = document.getElementById("edit_price").value;

    const featured = document.getElementById("edit_featured").value;

    const status = document.getElementById("edit_status").value;

    const formData = new FormData();

    formData.append("_method", "PUT");

    // NAME

    formData.append("name[vi]", nameVi);

    formData.append("name[en]", nameEn);

    // DESCRIPTION

    formData.append("description[vi]", descriptionVi);

    formData.append("description[en]", descriptionEn);

    // OTHER FIELDS

    formData.append("category_id", category_id);

    formData.append("price", price);

    formData.append("featured", featured);

    formData.append("status", status);
    formData.append("file_size", fileSize);
    formData.append("demo_url", demoUrl);
    formData.append("documentation_url", documentationUrl);
    formData.append("requirements", requirements);

    if (thumbnail) {
        formData.append("thumbnail", thumbnail);
    }

    if (file) {
        formData.append("file", file);
    }

    await fetch("/admin/products/" + id, {
        method: "POST",

        headers: {
            "X-CSRF-TOKEN": csrfToken,
            Accept: "application/json",
        },

        body: formData,
    });

    const modal = bootstrap.Modal.getInstance(
        document.getElementById("editModal"),
    );

    modal.hide();

    loadProducts();
}

// ===============================
// SEARCH
// ===============================

let searchTimeout;

document
    .getElementById("search-products")
    .addEventListener("input", function () {
        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(() => {
            loadProducts();
        }, 300);
    });

loadProducts();

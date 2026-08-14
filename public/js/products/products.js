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
                    ${product.stock}
                </td>

                <td>
                    ${product.featured}
                </td>

                <td>
                    ${product.status}
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

    const nameVi = document.getElementById("name_vi").value;

    const nameEn = document.getElementById("name_en").value;

    const descriptionVi = document.getElementById("description_vi").value;

    const descriptionEn = document.getElementById("description_en").value;

    const category_id = document.getElementById("category_id").value;

    const price = document.getElementById("price").value;

    const stock = document.getElementById("stock").value;

    const featured = document.getElementById("featured").value;

    const status = document.getElementById("status").value;

    const formData = new FormData();

    if (thumbnail) {
        formData.append("thumbnail", thumbnail);
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

    formData.append("stock", stock);

    formData.append("featured", featured);

    formData.append("status", status);

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

    document.getElementById("name_vi").value = "";

    document.getElementById("name_en").value = "";

    document.getElementById("description_vi").value = "";

    document.getElementById("description_en").value = "";

    document.getElementById("category_id").selectedIndex = 0;

    document.getElementById("price").value = "";

    document.getElementById("stock").value = "";

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
    clearError("edit_stock");
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

    document.getElementById("edit_stock").value = product.stock;

    document.getElementById("edit_featured").value = product.featured;

    document.getElementById("edit_status").value = product.status;

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

    const nameVi = document.getElementById("edit_name_vi").value;

    const nameEn = document.getElementById("edit_name_en").value;

    const descriptionVi = document.getElementById("edit_description_vi").value;

    const descriptionEn = document.getElementById("edit_description_en").value;

    const category_id = document.getElementById("edit_category_id").value;

    const price = document.getElementById("edit_price").value;

    const stock = document.getElementById("edit_stock").value;

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

    formData.append("stock", stock);

    formData.append("featured", featured);

    formData.append("status", status);

    if (thumbnail) {
        formData.append("thumbnail", thumbnail);
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

const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

//Hàm load dữ liệu

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

//Hàm render
function renderTable(products) {
    const table = document.getElementById("productTable");
    //xóa toàn bộ nội dung cũ của bảng trước khi vẽ lại dữ liệu mới.
    table.innerHTML = "";

    products.forEach((product) => {
        table.innerHTML += `
        <tr>
            <td>${product.id}</td>
            <td>
                <img src="/uploaded-images/${product.thumbnail}" width="60">
            </td>
            <td>${product.name}</td>
            <td>${product.description}</td>
            <td>${product.category ? product.category.name : ""}</td>
            <td>${product.price}</td>
            <td>${product.stock}</td>
            <td>${product.featured}</td>
            <td>${product.status}</td>
            <td>
                <button
                    class="btn btn-warning btn-sm"
                    onclick="editProduct(${product.id})">

                    Sửa

                </button>

                <button
                    class="btn btn-danger btn-sm"
                    onclick="deleteProduct(${product.id})">

                    Xóa

                </button>
            </td>
        </tr>
        `;
    });
}

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

    // Nút Previous
    html += `
        <li class="page-item ${result.current_page === 1 ? "disabled" : ""}">
            <button
                class="page-link"
                onclick="loadProducts(${result.current_page - 1})">
                Trước
            </button>
        </li>
    `;

    // Các số trang
    for (let page = 1; page <= result.last_page; page++) {
        html += `
            <li class="page-item ${page === result.current_page ? "active" : ""}">
                <button
                    class="page-link"
                    onclick="loadProducts(${page})">
                    ${page}
                </button>
            </li>
        `;
    }

    // Nút Next
    html += `
        <li class="page-item ${result.current_page === result.last_page ? "disabled" : ""}">
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

//Add product

async function addProduct() {
    if (!validateProduct()) {
        return;
    }
    const thumbnail = document.getElementById("thumbnail").files[0];
    const name = document.getElementById("name").value;
    const description = document.getElementById("description").value;
    const category_id = document.getElementById("category_id").value;
    const price = document.getElementById("price").value;
    const stock = document.getElementById("stock").value;
    const featured = document.getElementById("featured").value;
    const status = document.getElementById("status").value;

    const formData = new FormData();

    formData.append("thumbnail", thumbnail);
    formData.append("name", name);
    formData.append("description", description);
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

    document.getElementById("thumbnail").value = "";
    document.getElementById("name").value = "";
    document.getElementById("description").value = "";
    // document.getElementById("category_id").value = "";
    document.getElementById("category_id").selectedIndex = 0;
    document.getElementById("price").value = "";
    document.getElementById("stock").value = "";
    // document.getElementById("featured").value = "";
    // document.getElementById("status").value = "";
    document.getElementById("featured").selectedIndex = 0;
    document.getElementById("status").selectedIndex = 0;

    loadProducts();
}

//delete Product
async function deleteProduct(id) {
    await fetch("/admin/products/" + id, {
        method: "DELETE",

        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
    });

    loadProducts();
}

//editProduct
async function editProduct(id) {
    clearError("edit_name");
    clearError("edit_description");
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
    document.getElementById("edit_name").value = product.name;
    document.getElementById("edit_description").value =
        product.description ?? "";
    document.getElementById("edit_category_id").value = product.category_id;
    document.getElementById("edit_price").value = product.price;
    document.getElementById("edit_stock").value = product.stock;
    document.getElementById("edit_featured").value = product.featured;
    document.getElementById("edit_status").value = product.status;

    if (product.thumbnail) {
        document.getElementById("edit_thumbnail_preview").src =
            "/uploaded-images/" + product.thumbnail;
    }

    const modal = new bootstrap.Modal(document.getElementById("editModal"));
    modal.show();
}

//update Product

async function updateProduct() {
    if (!validateEditProduct()) {
        return;
    }
    const id = document.getElementById("edit_id").value;

    const thumbnail = document.getElementById("edit_thumbnail").files[0];
    const name = document.getElementById("edit_name").value;
    const description = document.getElementById("edit_description").value;
    const category_id = document.getElementById("edit_category_id").value;
    const price = document.getElementById("edit_price").value;
    const stock = document.getElementById("edit_stock").value;
    const featured = document.getElementById("edit_featured").value;
    const status = document.getElementById("edit_status").value;

    const formData = new FormData();

    formData.append("_method", "PUT");
    formData.append("name", name);
    formData.append("description", description);
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

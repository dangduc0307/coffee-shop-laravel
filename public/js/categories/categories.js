const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

//Hàm load dữ liệu

async function loadCategories(page = 1) {
    const keyword = document.getElementById("search").value;
    const response = await fetch(
        "/admin/categories?page=" +
            page +
            "&search=" +
            encodeURIComponent(keyword),
        {
            headers: {
                Accept: "application/json",
            },
        },
    );

    // const categories = await response.json();
    const results = await response.json();
    renderTable(results.data);
    renderPagination(results);
}

//Hàm render
function renderTable(categories) {
    const table = document.getElementById("categoryTable");
    table.innerHTML = "";

    categories.forEach((category) => {
        table.innerHTML += `
        <tr>
            <td>${category.id}</td>
            <td>
                <img src="/uploaded-images/${category.image}" width="60">
            </td>
            <td>${category.name}</td>
            <td>${category.description}</td>
            <td>${category.status}</td>
            <td>
                <button
                    class="btn btn-warning btn-sm"
                    onclick="editCategory(${category.id})">

                    Sửa

                </button>

                <button
                    class="btn btn-danger btn-sm"
                    onclick="deleteCategory(${category.id})">

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

    // Previous

    html += `
        <li class="page-item ${result.current_page === 1 ? "disabled" : ""}">

            <button
                class="page-link"
                onclick="loadCategories(${result.current_page - 1})">

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
                    onclick="loadCategories(${page})">

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
                onclick="loadCategories(${result.current_page + 1})">

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

async function addCategory() {
    if (!validateCategory()) {
        return;
    }
    const image = document.getElementById("image").files[0];
    const name = document.getElementById("name").value;
    const description = document.getElementById("description").value;
    const status = document.getElementById("status").value;

    const formData = new FormData();

    formData.append("image", image);
    formData.append("name", name);
    formData.append("description", description);
    formData.append("status", status);

    await fetch("/admin/categories", {
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

    document.getElementById("image").value = "";
    document.getElementById("name").value = "";
    document.getElementById("description").value = "";
    document.getElementById("status").selectedIndex = 0;

    loadCategories();
}

//delete Category
async function deleteCategory(id) {
    await fetch("/admin/categories/" + id, {
        method: "DELETE",

        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
    });

    loadCategories();
}

//editCategory
async function editCategory(id) {
    const response = await fetch("/admin/categories/" + id, {
        headers: {
            Accept: "application/json",
        },
    });

    const category = await response.json();

    document.getElementById("edit_id").value = category.id;
    document.getElementById("edit_name").value = category.name;
    document.getElementById("edit_description").value =
        category.description ?? "";
    document.getElementById("edit_status").value = category.status;

    if (category.image) {
        document.getElementById("edit_image_preview").src =
            "/uploaded-images/" + category.image;
    }

    const modal = new bootstrap.Modal(document.getElementById("editModal"));
    modal.show();
}

//update Category

async function updateCategory() {
    if (!validateEditCategory()) {
        return;
    }
    const id = document.getElementById("edit_id").value;

    const image = document.getElementById("edit_image").files[0];
    const name = document.getElementById("edit_name").value;
    const description = document.getElementById("edit_description").value;
    const status = document.getElementById("edit_status").value;

    const formData = new FormData();

    formData.append("_method", "PUT");
    formData.append("name", name);
    formData.append("description", description);
    formData.append("status", status);

    if (image) {
        formData.append("image", image);
    }

    await fetch("/admin/categories/" + id, {
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

    loadCategories();
}

let searchTimeout;

document.getElementById("search").addEventListener("input", function () {
    clearTimeout(searchTimeout);

    searchTimeout = setTimeout(() => {
        loadCategories();
    }, 300);
});

loadCategories();

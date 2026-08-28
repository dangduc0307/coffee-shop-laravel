const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

// ===============================
// LOAD USERS
// ===============================

async function loadUsers(page = 1) {
    const keyword = document.getElementById("search-users").value;

    const response = await fetch(
        "/admin/users?page=" + page + "&search=" + encodeURIComponent(keyword),
        {
            headers: {
                Accept: "application/json",
            },
        },
    );

    const result = await response.json();

    window.usersPagination = result;

    renderTable(result.data);

    renderPagination(result);
}

// ===============================
// RENDER TABLE
// ===============================

function renderTable(users) {
    const table = document.getElementById("users-table");

    table.innerHTML = "";

    if (users.length === 0) {
        table.innerHTML = `
            <tr>
                <td colspan="8" class="text-center py-5 text-muted">
                    <i class="bi bi-people fs-2 d-block mb-2"></i>
                    Không tìm thấy người dùng nào.
                </td>
            </tr>
        `;

        return;
    }

    users.forEach((user, index) => {
        // ===============================
        // ROLES
        // ===============================

        let rolesHtml = "";

        if (user.roles && user.roles.length > 0) {
            user.roles.forEach((role) => {
                rolesHtml += `
                    <span class="badge bg-primary me-1">
                        ${role.name}
                    </span>
                `;
            });
        } else {
            rolesHtml = `
                <span class="text-muted">
                    Chưa có vai trò
                </span>
            `;
        }

        // ===============================
        // STATUS
        // ===============================

        const statusHtml = user.status
            ? `
                <span class="badge bg-success">
                    Hoạt động
                </span>
            `
            : `
                <span class="badge bg-secondary">
                    Không hoạt động
                </span>
            `;

        // ===============================
        // LAST LOGIN
        // ===============================

        let lastLoginHtml = `
            <span class="text-muted">
                Chưa đăng nhập
            </span>
        `;

        if (user.last_login_at) {
            const date = new Date(user.last_login_at);

            lastLoginHtml = date.toLocaleString("vi-VN", {
                hour: "2-digit",
                minute: "2-digit",
                day: "2-digit",
                month: "2-digit",
                year: "numeric",
            });
        }

        // ===============================
        // AVATAR
        // ===============================

        const firstLetter = user.name ? user.name.charAt(0).toUpperCase() : "?";

        // ===============================
        // TABLE ROW
        // ===============================

        table.innerHTML += `
            <tr>

                <td>
                    ${resultIndex(index)}
                </td>

                <td>

                    <div class="d-flex align-items-center gap-2">

                        <div
                            class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px;">

                            ${firstLetter}

                        </div>

                        <div>

                            <div class="fw-semibold">
                                ${user.name}
                            </div>

                        </div>

                    </div>

                </td>


                <td>
                    ${user.email}
                </td>


                <td>
                    ${user.phone ?? "—"}
                </td>


                <td>
                    ${rolesHtml}
                </td>


                <td>
                    ${statusHtml}
                </td>


                <td>
                    ${lastLoginHtml}
                </td>


                <td>

                    <div class="d-flex gap-1">

                        <button
                            type="button"
                            class="btn btn-sm btn-outline-primary"
                            title="Chỉnh sửa"
                            onclick="editUser(${user.id})">

                            <i class="bi bi-pencil"></i>

                        </button>


                        <button
                            type="button"
                            class="btn btn-sm btn-outline-danger"
                            title="Xóa"
                            onclick="deleteUser(${user.id})">

                            <i class="bi bi-trash"></i>

                        </button>

                    </div>

                </td>

            </tr>
        `;
    });
}

// ===============================
// STT
// ===============================

function resultIndex(index) {
    // const pagination = document.getElementById("pagination");

    // // Nếu muốn STT bắt đầu lại từ 1 ở mỗi trang
    // // thì chỉ cần index + 1

    // return index + 1;

    const paginationData = window.usersPagination;

    return (
        (paginationData.current_page - 1) * paginationData.per_page + index + 1
    );
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

    // ===============================
    // PREVIOUS
    // ===============================

    html += `
        <li class="page-item ${result.current_page === 1 ? "disabled" : ""}">

            <button
                class="page-link"
                ${
                    result.current_page === 1
                        ? "disabled"
                        : `onclick="loadUsers(${result.current_page - 1})"`
                }>

                Trước

            </button>

        </li>
    `;

    // ===============================
    // PAGES
    // ===============================

    for (let page = 1; page <= result.last_page; page++) {
        html += `
            <li class="page-item ${
                page === result.current_page ? "active" : ""
            }">

                <button
                    class="page-link"
                    onclick="loadUsers(${page})">

                    ${page}

                </button>

            </li>
        `;
    }

    // ===============================
    // NEXT
    // ===============================

    html += `
        <li class="page-item ${
            result.current_page === result.last_page ? "disabled" : ""
        }">

            <button
                class="page-link"
                ${
                    result.current_page === result.last_page
                        ? "disabled"
                        : `onclick="loadUsers(${result.current_page + 1})"`
                }>

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

let searchTimeout;

document.getElementById("search-users").addEventListener("input", function () {
    clearTimeout(searchTimeout);

    searchTimeout = setTimeout(() => {
        loadUsers(1);
    }, 300);
});

loadUsers();

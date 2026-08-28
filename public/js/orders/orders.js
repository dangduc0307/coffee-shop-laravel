const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

// Hàm bất đồng bộ dùng để tải danh sách đơn hàng từ server
async function loadOrders(page = 1) {
    // Gửi yêu cầu GET đến route /admin/orders
    // await: đợi server trả kết quả rồi mới chạy tiếp
    const keyword = document.getElementById("search-orders").value;
    const response = await fetch(
        "/admin/orders?page=" + page + "&search=" + encodeURIComponent(keyword),
        {
            // Gửi Header cho Laravel biết rằng
            // "Tôi muốn nhận dữ liệu dạng JSON"
            headers: {
                Accept: "application/json",
            },
        },
    );

    // Chuyển dữ liệu JSON mà server trả về
    // thành Object hoặc Array của JavaScript
    // const orders = await response.json();
    const results = await response.json();

    // Gọi hàm renderTable()
    // để hiển thị danh sách đơn hàng lên bảng HTML
    renderTable(results.data);
    renderPagination(results);
}

function renderTable(orders) {
    const table = document.getElementById("orderTable");
    table.innerHTML = "";

    orders.forEach((order) => {
        table.innerHTML += `
            <tr>
                <td>${order.id}</td>
                <td>${order.customer_name}</td>
                <td>${order.phone}</td>
                <td>${order.email}</td>
                <td>${numberFormat(order.total_price)}đ</td>
                <td>${order.payment_method}</td>
                <td>${renderStatus(order.status)}</td>
                <td>${formatDateTime(order.created_at)}</td>
                
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
                onclick="loadOrders(${result.current_page - 1})">

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
                    onclick="loadOrders(${page})">

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
                onclick="loadOrders(${result.current_page + 1})">

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

document.getElementById("search-orders").addEventListener("input", function () {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        loadOrders();
    }, 300);
});

loadOrders();

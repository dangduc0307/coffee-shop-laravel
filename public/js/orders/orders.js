const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

// Hàm bất đồng bộ dùng để tải danh sách đơn hàng từ server
async function loadOrders() {
    // Gửi yêu cầu GET đến route /admin/orders
    // await: đợi server trả kết quả rồi mới chạy tiếp
    const response = await fetch("/admin/orders", {
        // Gửi Header cho Laravel biết rằng
        // "Tôi muốn nhận dữ liệu dạng JSON"
        headers: {
            Accept: "application/json",
        },
    });

    // Chuyển dữ liệu JSON mà server trả về
    // thành Object hoặc Array của JavaScript
    const orders = await response.json();

    // Gọi hàm renderTable()
    // để hiển thị danh sách đơn hàng lên bảng HTML
    renderTable(orders);
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
                <td>${order.address}</td>
                <td>${numberFormat(order.total_price)}đ</td>
                <td>${order.payment_method}</td>
                <td>${renderStatus(order.status)}</td>
                <td>${formatDateTime(order.created_at)}</td>
                
            </tr>
        `;
    });
}

loadOrders();

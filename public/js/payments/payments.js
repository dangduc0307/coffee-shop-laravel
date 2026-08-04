const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

async function loadPayments() {
    const response = await fetch("/admin/payments", {
        headers: {
            Accept: "application/json",
        },
    });

    const payments = await response.json();
    renderTable(payments);
}

function createRowHTML(payment) {
    const userName = payment.order?.user?.name || "N/A";
    return `
        <tr id="payment-row-${payment.id}">
            <td>${payment.id}</td>
            <td>${payment.payment_code}</td>
            <td>${userName}</td>
            <td>${payment.payment_method}</td>
            <td>${payment.gateway}</td>
            <td>${numberFormat(payment.amount)}</td>
            <td>${renderStatus(payment.status)}</td>
            <td>${formatDateTime(payment.paid_at)}</td>
        </tr>
    `;
}

function renderTable(payments) {
    const table = document.getElementById("paymentTable");
    table.innerHTML = payments.map((p) => createRowHTML(p)).join("");
}

// Hàm chèn bản ghi mới lên đầu bảng
function prependPayment(payment) {
    const table = document.getElementById("paymentTable");

    // Nếu bản ghi đã có trong bảng thì không chèn nữa (tránh trùng)
    if (document.getElementById(`payment-row-${payment.id}`)) return;

    table.insertAdjacentHTML("afterbegin", createRowHTML(payment));
}

// Tải danh sách ban đầu
loadPayments();

// Lắng nghe sự kiện Real-time qua CDN Echo đã khởi tạo ở Layout
if (window.Echo) {
    window.Echo.channel("payments").listen(".PaymentCreated", (e) => {
        console.log("Dữ liệu nhận được:", e); // Thêm log để kiểm tra
        prependPayment(e.payment);
    });
}

function prependPayment(payment) {
    const table = document.getElementById("paymentTable");
    const existingRow = document.getElementById(`payment-row-${payment.id}`);

    // Nếu dòng này ĐÃ TỒN TẠI (VD: từ Pending chuyển thành Paid)
    if (existingRow) {
        existingRow.outerHTML = createRowHTML(payment);

        // Lấy lại dòng vừa cập nhật và thêm màu xanh nhẹ trong 3 giây
        const updatedRow = document.getElementById(`payment-row-${payment.id}`);
        if (updatedRow) {
            updatedRow.classList.add("table-success");
            setTimeout(() => {
                updatedRow.classList.remove("table-success");
            }, 3000);
        }
        return;
    }

    // Nếu chưa có -> Chèn mới lên đầu bảng
    table.insertAdjacentHTML("afterbegin", createRowHTML(payment));
}

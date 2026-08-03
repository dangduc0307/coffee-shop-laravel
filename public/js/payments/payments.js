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

async function renderTable(payments) {
    const table = document.getElementById("paymentTable");
    table.innerHTML = "";

    payments.forEach((payment) => {
        table.innerHTML += `
            <tr>
                <td>${payment.id}</td>
                <td>${payment.payment_code}</td>
                <td>${payment.order.user.name}</td>
                <td>${payment.payment_method}</td>
                <td>${payment.gateway}</td>
                <td>${payment.amount}</td>
                <td>${payment.status}</td>
                <td>${formatDateTime(payment.paid_at)}</td>
            </tr>
        `;
    });
}

function formatDateTime(dateString) {
    if (!dateString) return "-";

    return new Date(dateString).toLocaleString("vi-VN", {
        hour: "2-digit",
        minute: "2-digit",
        day: "2-digit",
        month: "2-digit",
        year: "numeric",
    });
}

loadPayments();

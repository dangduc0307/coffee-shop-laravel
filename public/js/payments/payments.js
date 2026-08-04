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
                <td>${numberFormat(payment.amount)}</td>
                <td>${renderStatus(payment.status)}</td>
                <td>${formatDateTime(payment.paid_at)}</td>
            </tr>
        `;
    });
}

loadPayments();

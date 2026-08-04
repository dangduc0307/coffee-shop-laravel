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

function numberFormat(number) {
    return Number(number).toLocaleString("vi-VN");
}

function renderStatus(status) {
    switch (status) {
        case "pending":
            return `<span class="badge bg-warning text-dark">Chờ thanh toán</span>`;

        case "paid":
            return `<span class="badge bg-success">Đã thanh toán</span>`;

        default:
            return `<span class="badge bg-secondary">${status}</span>`;
    }
}

const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

//Hàm load dữ liệu
// async function loadNotifications() {
//     const response = await fetch("/notifications");

//     const notifications = await response.json();

//     renderTable(notifications);
// }

async function loadNotifications() {
    const response = await fetch("/notifications", {
        headers: {
            Accept: "application/json",
        },
    });

    const notifications = await response.json();

    renderTable(notifications);
}

//Hàm render
function renderTable(notifications) {
    const table = document.getElementById("notificationTable");

    table.innerHTML = "";

    notifications.forEach((notification) => {
        table.innerHTML += `

        <tr>

            <td>${notification.id}</td>

            <td>${notification.title}</td>

            <td>${notification.message}</td>

            <td>

                <button
                    class="btn btn-warning btn-sm"
                    onclick="editNotification(${notification.id})">

                    Sửa

                </button>

                <button
                    class="btn btn-danger btn-sm"
                    onclick="deleteNotification(${notification.id})">

                    Xóa

                </button>

            </td>

        </tr>

        `;
    });
}

//Add notification

async function addNotification() {
    const title = document.getElementById("title").value;

    const message = document.getElementById("message").value;

    await fetch("/notifications", {
        method: "POST",

        headers: {
            "Content-Type": "application/json",

            "X-CSRF-TOKEN": csrfToken,
        },

        body: JSON.stringify({
            title: title,

            message: message,
        }),
    });

    const modal = bootstrap.Modal.getInstance(
        document.getElementById("addModal"),
    );

    modal.hide();

    document.getElementById("title").value = "";
    document.getElementById("message").value = "";

    loadNotifications();
}

//delete Notification
async function deleteNotification(id) {
    await fetch("/notifications/" + id, {
        method: "DELETE",

        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
    });

    loadNotifications();
}

//edit Notificaton
async function editNotification(id) {
    const response = await fetch("/notifications/" + id);

    const notification = await response.json();

    document.getElementById("edit_id").value = notification.id;
    document.getElementById("edit_title").value = notification.title;
    document.getElementById("edit_message").value = notification.message;

    const modal = new bootstrap.Modal(document.getElementById("editModal"));

    modal.show();
}

//update Notification
async function updateNotification() {
    const id = document.getElementById("edit_id").value;

    await fetch("/notifications/" + id, {
        method: "PUT",

        headers: {
            "Content-Type": "application/json",

            "X-CSRF-TOKEN": csrfToken,
        },

        body: JSON.stringify({
            title: document.getElementById("edit_title").value,

            message: document.getElementById("edit_message").value,
        }),
    });

    const modal = bootstrap.Modal.getInstance(
        document.getElementById("editModal"),
    );

    modal.hide();

    loadNotifications();
}

loadNotifications();

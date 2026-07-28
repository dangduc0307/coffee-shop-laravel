const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

//Hàm load dữ liệu

async function loadCategories() {
    const response = await fetch("/categories", {
        headers: {
            Accept: "application/json",
        },
    });

    const categories = await response.json();
    renderTable(categories);
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
                
            </td>
        </tr>
        `;
    });
}

//Add product

async function addCategory() {
    const image = document.getElementById("image").files[0];
    const name = document.getElementById("name").value;
    const description = document.getElementById("description").value;
    const status = document.getElementById("status").value;

    const formData = new FormData();

    formData.append("image", image);
    formData.append("name", name);
    formData.append("description", description);
    formData.append("status", status);

    await fetch("/categories", {
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
    document.getElementById("status").value = "";

    loadCategories();
}

loadCategories();

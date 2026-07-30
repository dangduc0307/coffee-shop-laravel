async function loadCartCount() {
    const response = await fetch("/carts/count");

    const result = await response.json();

    document.querySelectorAll(".cart-count").forEach((element) => {
        element.textContent = result.count;
    });
}

async function loadCartSummary() {
    const cartInformation = document.getElementById("cartInformation");

    const response = await fetch("/carts/summary");

    const cartItems = await response.json();

    cartInformation.innerHTML = "";

    if (cartItems.length === 0) {
        cartInformation.innerHTML = `
            <span>
                <i class="bi bi-cart-x"></i>
                Chưa có sản phẩm nào
            </span>
        `;

        return;
    }

    cartItems.forEach((item) => {
        cartInformation.innerHTML += `
            <div class="cart-item">

                <img src="/uploaded-images/${item.product.thumbnail}"
                     alt="${item.product.name}">

                <span class="me-2">${item.product.name}</span>

                <span>x${item.quantity}</span>

            </div>
        `;
    });
}

loadCartCount();
loadCartSummary();

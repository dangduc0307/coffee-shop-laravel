async function loadCartCount() {
    const response = await fetch("/carts/count");

    const result = await response.json();

    document.querySelectorAll(".cart-count").forEach((element) => {
        element.textContent = result.count;
    });
}

loadCartCount();

const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

async function loadCartCount() {
    const response = await fetch("/carts/count");

    const result = await response.json();

    document.querySelectorAll(".cart-count").forEach((element) => {
        element.textContent = result.count;
    });
}

document.querySelectorAll(".add-cart").forEach((button) => {
    button.onclick = async () => {
        const response = await fetch("/carts", {
            method: "POST",

            headers: {
                "Content-Type": "application/json",

                "X-CSRF-TOKEN": csrfToken,
            },

            body: JSON.stringify({
                product_id: button.dataset.id,

                quantity: 1,
            }),
        });

        const result = await response.json();

        if (result.success) {
            loadCartCount();
        }
    };
});

loadCartCount();

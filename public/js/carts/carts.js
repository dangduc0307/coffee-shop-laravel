const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

async function loadCartCount() {
    const response = await fetch("/carts/count");

    const result = await response.json();

    document.querySelectorAll(".cart-count").forEach((element) => {
        element.textContent = result.count;
    });
}

// async function loadCartSummary() {
//     const cartInformation = document.getElementById("cartInformation");

//     if (cartInformation.dataset.auth === "0") {
//         return;
//     }

//     // const response = await fetch("/carts/summary");
//     const response = await fetch("/carts/summary", {
//         headers: {
//             Accept: "application/json",
//         },
//     });

//     const cartItems = await response.json();

//     cartInformation.innerHTML = "";

//     if (cartItems.length === 0) {
//         cartInformation.innerHTML = `
//             <span>
//                 <i class="bi bi-cart-x"></i>
//                 Chưa có sản phẩm nào
//             </span>
//         `;

//         return;
//     }

//     cartItems.forEach((item) => {
//         const productName =
//             item.product.name.vi ?? item.product.name.en ?? "Sản phẩm";
//         cartInformation.innerHTML += `
//             <div class="cart-item">

//                 <img src="/uploaded-images/${item.product.thumbnail}"
//                      alt="${item.product.name}">

//                 <span class="me-2">${productName}</span>

//                 <span>x${item.quantity}</span>

//             </div>
//         `;
//     });
// }

async function loadCartSummary() {
    const cartInformation = document.getElementById("cartInformation");

    // Nếu trang hiện tại không có cartInformation
    if (!cartInformation) {
        return;
    }

    // Nếu chưa đăng nhập
    if (cartInformation.dataset.auth === "0") {
        return;
    }

    const response = await fetch("/carts/summary", {
        headers: {
            Accept: "application/json",
        },
    });

    const cartItems = await response.json();

    // =====================================================
    // CẬP NHẬT NÚT "THÊM VÀO GIỎ"
    // =====================================================

    cartItems.forEach((item) => {
        const button = document.querySelector(
            `.add-cart[data-id="${item.product_id}"]`,
        );

        if (!button) {
            return;
        }

        const buttonText = button.querySelector(".cart-button-text");

        const buttonIcon = button.querySelector("i");

        // Đổi trạng thái nút
        button.disabled = true;

        button.classList.add("cart-added");

        if (buttonIcon) {
            buttonIcon.className =
                "bi bi-check-circle-fill me-1 cart-success-icon";
        }

        if (buttonText) {
            buttonText.textContent = "Đã thêm vào giỏ hàng";
        }
    });

    // =====================================================
    // HIỂN THỊ CART SUMMARY
    // =====================================================

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
        const productName =
            item.product.name.vi ?? item.product.name.en ?? "Sản phẩm";

        cartInformation.innerHTML += `
            <div class="cart-item">

                <img
                    src="/uploaded-images/${item.product.thumbnail}"
                    alt="${productName}"
                >

                <span class="me-2">
                    ${productName}
                </span>

                <span>
                    x${item.quantity}
                </span>

            </div>
        `;
    });
}

// document.querySelectorAll(".add-cart").forEach((button) => {
//     button.onclick = async () => {
//         const response = await fetch("/carts", {
//             method: "POST",

//             headers: {
//                 "Content-Type": "application/json",

//                 "X-CSRF-TOKEN": csrfToken,
//             },

//             body: JSON.stringify({
//                 product_id: button.dataset.id,

//                 quantity: 1,
//             }),
//         });

//         const result = await response.json();

//         if (result.success) {
//             loadCartCount();
//             loadCartSummary();
//         }
//     };
// });

// // tăng số lượng sản phẩm
// document.querySelectorAll(".increase-btn").forEach((button) => {
//     button.addEventListener("click", async function () {
//         const id = this.dataset.id;

//         const quantityElement = document.getElementById("quantity-" + id);

//         let quantity = parseInt(quantityElement.textContent);

//         const stock = parseInt(quantityElement.dataset.stock);

//         if (quantity >= stock) return;

//         quantity++;

//         await updateQuantity(id, quantity);
//     });
// });

// // giảm số lượng sản phẩm
// document.querySelectorAll(".decrease-btn").forEach((button) => {
//     button.addEventListener("click", async function () {
//         const id = this.dataset.id;

//         const quantityElement = document.getElementById("quantity-" + id);

//         let quantity = parseInt(quantityElement.textContent);

//         if (quantity <= 1) return;

//         quantity--;

//         await updateQuantity(id, quantity);
//     });
// });

//Cập nhật số lượng sản phẩm
async function updateQuantity(id, quantity) {
    const response = await fetch(`/carts/${id}`, {
        method: "PUT",

        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },

        body: JSON.stringify({
            quantity: quantity,
        }),
    });

    const data = await response.json();

    if (data.success) {
        // cập nhật số lượng
        const quantityElement = document.getElementById("quantity-" + id);

        quantityElement.textContent = data.quantity;

        // cập nhật thành tiền
        document.getElementById("subtotal-" + id).textContent =
            data.subtotal.toLocaleString() + " VNĐ";
        // Cập nhật tổng tiền
        document.getElementById("cart-total").textContent =
            data.cart_total.toLocaleString() + " VNĐ";

        loadCartCount();
        loadCartSummary();
    }
}

async function deleteCart(id) {
    const response = await fetch("/carts/" + id, {
        method: "DELETE",

        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
    });

    const data = await response.json();

    if (data.success) {
        document.getElementById("cart-row-" + id).remove();

        loadCartCount();
        loadCartSummary();

        // Cập nhật tổng tiền
        const cartTotal = document.getElementById("cart-total");

        if (cartTotal) {
            cartTotal.textContent = data.cart_total.toLocaleString() + " VNĐ";
        }

        // Kiểm tra còn sản phẩm không
        const rows = document.querySelectorAll("tbody tr");

        if (rows.length === 0) {
            document.getElementById("cartContainer").classList.add("d-none");

            document.getElementById("emptyCart").classList.remove("d-none");
        }
    }
}

loadCartCount();
loadCartSummary();

// =====================================================
// ADD TO CART
// =====================================================

document.addEventListener("click", async function (event) {
    const button = event.target.closest(".add-cart");

    if (!button) {
        return;
    }

    // Đang xử lý hoặc đã thêm rồi
    if (button.disabled) {
        return;
    }

    const productId = button.dataset.id;

    const buttonText = button.querySelector(".cart-button-text");

    const buttonIcon = button.querySelector("i");

    // =================================================
    // ĐANG THÊM
    // =================================================

    button.disabled = true;

    button.classList.add("cart-loading");

    buttonText.textContent = "Đang thêm...";

    buttonIcon.className = "bi bi-arrow-repeat me-1 cart-loading-icon";

    try {
        const response = await fetch("/carts", {
            method: "POST",

            headers: {
                "Content-Type": "application/json",

                Accept: "application/json",

                "X-CSRF-TOKEN": csrfToken,
            },

            body: JSON.stringify({
                product_id: productId,

                quantity: 1,
            }),
        });

        const data = await response.json();

        // =================================================
        // THÊM THÀNH CÔNG
        // =================================================

        if (response.ok && data.success) {
            button.classList.remove("cart-loading");

            button.classList.add("cart-added");

            buttonIcon.className =
                "bi bi-check-circle-fill me-1 cart-success-icon";

            buttonText.textContent = "Đã thêm vào giỏ hàng";

            button.disabled = true;

            // Cập nhật số lượng giỏ hàng
            await loadCartCount();

            // Cập nhật cart summary
            await loadCartSummary();

            return;
        }

        // =================================================
        // SẢN PHẨM ĐÃ CÓ TRONG GIỎ
        // =================================================

        if (response.status === 409) {
            button.classList.remove("cart-loading");

            button.classList.add("cart-added");

            buttonIcon.className =
                "bi bi-check-circle-fill me-1 cart-success-icon";

            buttonText.textContent = "Đã thêm vào giỏ hàng";

            button.disabled = true;

            return;
        }

        // =================================================
        // LỖI
        // =================================================

        throw new Error(
            data.message || "Không thể thêm sản phẩm vào giỏ hàng.",
        );
    } catch (error) {
        console.error(error);

        // Cho phép thử lại nếu request lỗi
        button.disabled = false;

        button.classList.remove("cart-loading");

        button.classList.remove("cart-added");

        buttonIcon.className = "bi bi-cart-plus me-1";

        buttonText.textContent = "Thêm vào giỏ";

        alert(error.message);
    }
});

document.addEventListener("DOMContentLoaded", function () {
    /*
    |--------------------------------------------------------------------------
    | LOAD PRODUCTS
    |--------------------------------------------------------------------------
    */

    window.loadShopProducts = async function (page = 1) {
        const productList = document.getElementById("productList");

        if (!productList) {
            return;
        }

        try {
            // Hiển thị loading
            productList.innerHTML = `
                <div class="col-12 text-center py-5">
                    <div class="spinner-border text-warning" role="status">
                        <span class="visually-hidden">Đang tải...</span>
                    </div>

                    <div class="mt-2 text-muted">
                        Đang tải sản phẩm...
                    </div>
                </div>
            `;

            /*
            |--------------------------------------------------------------------------
            | CATEGORY
            |--------------------------------------------------------------------------
            */

            const category = currentCategory
                ? `&category=${encodeURIComponent(currentCategory)}`
                : "";

            /*
            |--------------------------------------------------------------------------
            | REQUEST
            |--------------------------------------------------------------------------
            */

            const response = await fetch(`/shop?page=${page}${category}`, {
                headers: {
                    Accept: "application/json",
                },
            });

            if (!response.ok) {
                throw new Error("Không thể tải sản phẩm.");
            }

            const result = await response.json();

            /*
            |--------------------------------------------------------------------------
            | RENDER
            |--------------------------------------------------------------------------
            */

            renderProducts(result.data);

            renderPagination(result);
        } catch (error) {
            console.error(error);

            productList.innerHTML = `
                <div class="col-12">
                    <div class="alert alert-danger">
                        Không thể tải sản phẩm. Vui lòng thử lại.
                    </div>
                </div>
            `;
        }
    };

    /*
    |--------------------------------------------------------------------------
    | RENDER PRODUCTS
    |--------------------------------------------------------------------------
    */

    function renderProducts(products) {
        const productList = document.getElementById("productList");

        productList.innerHTML = "";

        /*
        |--------------------------------------------------------------------------
        | KHÔNG CÓ SẢN PHẨM
        |--------------------------------------------------------------------------
        */

        if (!products || products.length === 0) {
            productList.innerHTML = `
                <div class="col-12 text-center py-5">

                    <i class="bi bi-box-seam fs-1 text-muted"></i>

                    <p class="text-muted mt-3">
                        Không có sản phẩm nào.
                    </p>

                </div>
            `;

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | PRODUCTS
        |--------------------------------------------------------------------------
        */

        products.forEach(function (product) {
            const isPurchased = purchasedProductIds.includes(product.id);

            const isInCart = cartProductIds.includes(product.id);

            const locale = document.documentElement.lang || "vi";

            const name =
                product.name?.[locale] ??
                product.name?.vi ??
                product.name?.en ??
                "";

            const description =
                product.description?.[locale] ??
                product.description?.vi ??
                product.description?.en ??
                "";

            /*
            |--------------------------------------------------------------------------
            | DEMO
            |--------------------------------------------------------------------------
            */

            const demoHtml = product.demo_url
                ? `
                    <p>
                        <a
                            href="${product.demo_url}"
                            target="_blank"
                            class="btn btn-outline-primary btn-sm"
                        >
                            Xem Demo
                        </a>
                    </p>
                `
                : "";

            /*
            |--------------------------------------------------------------------------
            | ACTION BUTTON
            |--------------------------------------------------------------------------
            */

            let actionHtml = "";

            /*
            |----------------------------------------------------------------------
            | ĐÃ MUA
            |----------------------------------------------------------------------
            */

            if (isPurchased) {
                const downloadUrl = shopDownloadRoute.replace(
                    "__PRODUCT_ID__",
                    product.id,
                );

                actionHtml = `

                    <div class="text-success fw-bold mb-2">

                        <i class="bi bi-check-circle-fill"></i>

                        Đã mua

                    </div>


                    <a
                        href="${downloadUrl}"
                        class="btn btn-success w-100"
                        data-no-transition
                    >

                        <i class="bi bi-download"></i>

                        Tải xuống

                    </a>

                `;
            } else if (isInCart) {
                /*
            |----------------------------------------------------------------------
            | ĐÃ CÓ TRONG GIỎ
            |----------------------------------------------------------------------
            */
                actionHtml = `

                    <button
                        type="button"
                        class="btn btn-primary w-100 add-cart cart-added"
                        data-id="${product.id}"
                        disabled
                    >

                        <span class="cart-button-content">

                            <i class="bi bi-check-circle-fill me-1 cart-success-icon"></i>

                            <span class="cart-button-text">
                                Đã thêm vào giỏ hàng
                            </span>

                        </span>

                    </button>

                `;
            } else {
                /*
            |----------------------------------------------------------------------
            | CHƯA CÓ TRONG GIỎ
            |----------------------------------------------------------------------
            */
                actionHtml = `

                    <button
                        type="button"
                        class="btn btn-primary w-100 add-cart"
                        data-id="${product.id}"
                    >

                        <span class="cart-button-content">

                            <i class="bi bi-cart-plus me-1"></i>

                            <span class="cart-button-text">
                                Thêm vào giỏ
                            </span>

                        </span>

                    </button>

                `;
            }

            /*
            |--------------------------------------------------------------------------
            | CARD
            |--------------------------------------------------------------------------
            */

            productList.innerHTML += `

                <div class="col-md-3 mb-4">

                    <div class="card h-100">

                        <img
                            src="/uploaded-images/${product.thumbnail}"
                            class="card-img-top"
                            style="height:220px;object-fit:cover;"
                            alt="${name}"
                        >

                        <div class="card-body">

                            <h5>
                                ${name}
                            </h5>

                            <p class="text-muted small">
                                ${description}
                            </p>

                            <p>
                                ${Number(product.price || 0).toLocaleString("vi-VN")} đ
                            </p>


                            ${demoHtml}


                            <p class="text-muted mb-2">

                                File:
                                ${product.file_size ?? "Đang cập nhật"}

                            </p>


                            ${actionHtml}

                        </div>

                    </div>

                </div>

            `;
        });
    }

    /*
    |--------------------------------------------------------------------------
    | PAGINATION
    |--------------------------------------------------------------------------
    */

    function renderPagination(result) {
        const pagination = document.getElementById("pagination");

        pagination.innerHTML = "";

        /*
        |--------------------------------------------------------------------------
        | CHỈ CÓ 1 TRANG
        |--------------------------------------------------------------------------
        */

        if (result.last_page <= 1) {
            return;
        }

        let html = `

            <nav aria-label="Shop pagination">

                <ul class="pagination justify-content-center">

        `;

        /*
        |--------------------------------------------------------------------------
        | TRANG TRƯỚC
        |--------------------------------------------------------------------------
        */

        html += `

            <li class="page-item ${
                result.current_page === 1 ? "disabled" : ""
            }">

                <button
                    class="page-link"
                    onclick="loadShopProducts(${result.current_page - 1})"
                    ${result.current_page === 1 ? "disabled" : ""}
                >

                    <i class="bi bi-chevron-left"></i>

                </button>

            </li>

        `;

        /*
        |--------------------------------------------------------------------------
        | CÁC TRANG
        |--------------------------------------------------------------------------
        */

        for (let page = 1; page <= result.last_page; page++) {
            html += `

                <li class="page-item ${
                    page === result.current_page ? "active" : ""
                }">

                    <button
                        class="page-link"
                        onclick="loadShopProducts(${page})"
                    >

                        ${page}

                    </button>

                </li>

            `;
        }

        /*
        |--------------------------------------------------------------------------
        | TRANG SAU
        |--------------------------------------------------------------------------
        */

        html += `

            <li class="page-item ${
                result.current_page === result.last_page ? "disabled" : ""
            }">

                <button
                    class="page-link"
                    onclick="loadShopProducts(${result.current_page + 1})"
                    ${
                        result.current_page === result.last_page
                            ? "disabled"
                            : ""
                    }
                >

                    <i class="bi bi-chevron-right"></i>

                </button>

            </li>

        `;

        html += `

                </ul>

            </nav>

        `;

        pagination.innerHTML = html;
    }

    /*
    |--------------------------------------------------------------------------
    | LOAD TRANG ĐẦU TIÊN
    |--------------------------------------------------------------------------
    */

    loadShopProducts(1);
});

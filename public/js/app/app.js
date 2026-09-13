async function loadCartCount() {
    const response = await fetch("/carts/count");

    const result = await response.json();

    document.querySelectorAll(".cart-count").forEach((element) => {
        element.textContent = result.count;
    });
}

async function loadCartSummary() {
    const cartInformation = document.getElementById("cartInformation");

    if (cartInformation.dataset.auth === "0") {
        return;
    }

    // const response = await fetch("/carts/summary");
    const response = await fetch("/carts/summary", {
        headers: {
            Accept: "application/json",
        },
    });

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
        const productName =
            item.product.name.vi ?? item.product.name.en ?? "Sản phẩm";
        cartInformation.innerHTML += `
            <div class="cart-item">

                <img src="/uploaded-images/${item.product.thumbnail}"
                     alt="${item.product.name}">

                <span class="me-2">${productName}</span>

                <span>x${item.quantity}</span>

            </div>
        `;
    });
}

loadCartCount();
loadCartSummary();

/*
=========================================================
                    JS PAGE TRANSITION
=========================================================

Đợi HTML tải xong
        ↓
Lấy 2 phần tử HTML
        ↓
Kiểm tra có tồn tại không
        ↓
Kiểm tra trang vừa được chuyển tới hay tải/reload?
        ↓
        ┌───────────────────────┐
        │                       │
      TẢI LẠI               CHUYỂN TRANG
        ↓                       ↓
  Fill 0 → 100%          Bắt sự kiện click
                                ↓
                         Kiểm tra link
                                ↓
                         Link có hợp lệ?
                                ↓
                       Chặn chuyển trang
                                ↓
                       Ghi nhớ trạng thái
                                ↓
                       Hiện transition
                                ↓
                         Fill 0 → 100%
                                ↓
                       Chuyển sang URL mới


ĐẶC BIỆT:
Nếu bấm BACK / FORWARD
        ↓
Trang được khôi phục từ bfcache
        ↓
Hiện lại trang bình thường
        ↓
Ẩn transition
        ↓
Reset fill về 0%
=========================================================
*/

/* =====================================================
   ĐỢI HTML TẢI XONG
===================================================== */

document.addEventListener("DOMContentLoaded", function () {
    /* =================================================
       LẤY 2 PHẦN TỬ HTML
    ================================================= */

    const transition = document.getElementById("page-transition");
    const fill = document.getElementById("page-transition-fill");

    /* =================================================
       KIỂM TRA 2 PHẦN TỬ CÓ TỒN TẠI KHÔNG

       Nếu không tồn tại:
       → dừng JavaScript
    ================================================= */

    if (!transition || !fill) {
        return;
    }

    /* =================================================
       BIẾN GHI NHỚ ĐANG CHUYỂN TRANG

       false = chưa chuyển trang
       true  = đang chuyển trang

       Dùng để tránh click nhiều lần.
    ================================================= */

    let navigating = false;

    /* =================================================
       KIỂM TRA TRANG VỪA ĐƯỢC MỞ BẰNG TRANSITION

       true  → vừa chuyển từ trang khác sang
       false → tải trang / F5 / reload
    ================================================= */

    const isPageNavigation =
        sessionStorage.getItem("weblist_page_navigation") === "true";

    /* =================================================
       XÓA TRẠNG THÁI NGAY SAU KHI ĐỌC

       Trạng thái này chỉ dùng 1 lần.
    ================================================= */

    sessionStorage.removeItem("weblist_page_navigation");

    /* =================================================
       KHI TẢI / RELOAD TRANG

       Nếu không phải trang vừa được chuyển tới
       → chạy animation.
    ================================================= */

    if (!isPageNavigation) {
        /* =============================================
           HIỆN TRANSITION
        ============================================= */

        transition.classList.add("active");

        /* =============================================
           RESET FILL VỀ 0%

           Tắt transition trước khi reset
           để không xảy ra animation ngược.
        ============================================= */

        fill.style.transition = "none";
        fill.style.width = "0%";

        /* =============================================
           CHỜ TRÌNH DUYỆT RENDER 0%

           Sau đó mới chạy 0% → 100%.
        ============================================= */

        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                /* =====================================
                   CHO PHÉP ANIMATION
                ===================================== */

                fill.style.transition =
                    "width 700ms cubic-bezier(0.65, 0, 0.35, 1)";

                /* =====================================
                   FILL TỪ 0% → 100%
                ===================================== */

                fill.style.width = "100%";

                /* =====================================
                   FILL ĐẦY → ẨN TRANSITION
                ===================================== */

                setTimeout(function () {
                    transition.classList.remove("active");

                    fill.style.transition = "none";
                    fill.style.width = "0%";
                }, 700);
            });
        });
    }

    /* =================================================
       XỬ LÝ BACK / FORWARD CỦA TRÌNH DUYỆT

       Khi người dùng bấm:

            ← BACK
            →
            FORWARD

       trình duyệt có thể khôi phục trang từ
       Back/Forward Cache (bfcache).

       Khi đó DOMContentLoaded không chạy lại.

       Vì vậy phải dùng pageshow.
    ================================================= */

    window.addEventListener("pageshow", function (event) {
        /* =============================================
           KIỂM TRA CÓ PHẢI TRANG ĐƯỢC KHÔI PHỤC
           TỪ BFCACHE KHÔNG
        ============================================= */

        if (event.persisted) {
            /* =========================================
               HỦY TRẠNG THÁI ĐANG CHUYỂN TRANG
            ========================================= */

            navigating = false;

            /* =========================================
               ẨN TRANSITION NGAY LẬP TỨC
            ========================================= */

            transition.classList.remove("active");

            /* =========================================
               RESET FILL VỀ 0%

               Tắt animation để thanh không chạy
               khi trang được khôi phục.
            ========================================= */

            fill.style.transition = "none";
            fill.style.width = "0%";
        }
    });

    /* =================================================
                  CHUYỂN TRANG KHI BẤM LINK
    ================================================= */

    document.querySelectorAll("a[href]").forEach(function (link) {
        /* =============================================
           BẮT SỰ KIỆN CLICK
        ============================================= */

        link.addEventListener("click", function (event) {
            const href = this.href;

            /* =========================================
               KIỂM TRA TRƯỜNG HỢP ĐẶC BIỆT

               Không xử lý:

               - Đang chuyển trang
               - Mở tab mới
               - Download
               - href="#"
               - javascript:
            ========================================= */

            if (
                navigating ||
                this.target === "_blank" ||
                this.hasAttribute("download") ||
                this.hasAttribute("data-no-transition") ||
                this.getAttribute("href") === "#" ||
                href.startsWith("javascript:")
            ) {
                return;
            }

            /* =========================================
               KIỂM TRA LINK NỘI BỘ
            ========================================= */

            try {
                const url = new URL(href);

                /*
                 * Nếu khác domain
                 * → không chạy transition.
                 */

                if (url.origin !== window.location.origin) {
                    return;
                }
            } catch (error) {
                /*
                 * URL không hợp lệ
                 * → bỏ qua.
                 */

                return;
            }

            /* =========================================
               KIỂM TRA CÓ ĐANG Ở ĐÚNG TRANG KHÔNG
            ========================================= */

            if (
                href === window.location.href ||
                href === window.location.href.split("#")[0]
            ) {
                return;
            }

            /* =========================================
               CHẶN CHUYỂN TRANG NGAY LẬP TỨC

               Bình thường:

               Click
                 ↓
               Browser chuyển trang ngay

               Chúng ta muốn:

               Click
                 ↓
               Animation
                 ↓
               100%
                 ↓
               Chuyển trang
            ========================================= */

            event.preventDefault();

            /* =========================================
               ĐÁNH DẤU ĐANG CHUYỂN TRANG
            ========================================= */

            navigating = true;

            /* =========================================
               GHI NHỚ TRẠNG THÁI

               Trang tiếp theo sẽ biết rằng nó vừa
               được mở bằng page transition.

               Vì vậy nó không chạy animation lần nữa.
            ========================================= */

            sessionStorage.setItem("weblist_page_navigation", "true");

            /* =========================================
               HIỆN TRANSITION
            ========================================= */

            transition.classList.add("active");

            /* =========================================
               RESET FILL VỀ 0%
            ========================================= */

            fill.style.transition = "none";
            fill.style.width = "0%";

            /* =========================================
               CHỜ TRÌNH DUYỆT RENDER 0%

               Sau đó mới chạy animation.
            ========================================= */

            requestAnimationFrame(function () {
                requestAnimationFrame(function () {
                    /* =================================
                       CHO PHÉP ANIMATION
                    ================================= */

                    fill.style.transition =
                        "width 700ms cubic-bezier(0.65, 0, 0.35, 1)";

                    /* =================================
                       FILL TỪ 0% → 100%
                    ================================= */

                    fill.style.width = "100%";

                    /* =================================
                       ĐẦY 100% → CHUYỂN TRANG
                    ================================= */

                    setTimeout(function () {
                        window.location.href = href;
                    }, 700);
                });
            });
        });
    });
});

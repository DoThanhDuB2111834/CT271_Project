const buttonOpenCartModal = document.querySelectorAll(".toogle-cart-button");

buttonOpenCartModal.forEach((button) => {
    button.addEventListener("click", function (event) {
        const cartBlurring = document.getElementById("cart-blurring");
        if (cartBlurring.classList.contains("hidden")) {
            cartBlurring.classList.remove("hidden");
        } else {
            cartBlurring.classList.add("hidden");
        }

        const cartModal = document.getElementById("cart-right-modal");
        if (cartModal.classList.contains("translate-x-[100%]")) {
            cartModal.classList.remove("translate-x-[100%]");
        } else {
            cartModal.classList.add("translate-x-[100%]");
        }
    });
});

const buttonOpenAuthModal = document.querySelectorAll(".toogle-auth-modal");

buttonOpenAuthModal.forEach((button) => {
    button.addEventListener("click", function (event) {
        const blurring = document.getElementById("auth-modal-blurring");
        if (blurring.classList.contains("hidden")) {
            blurring.classList.remove("hidden");
        } else {
            blurring.classList.add("hidden");
        }

        const modal = document.getElementById("auth-modal-view");
        if (modal.classList.contains("translate-x-[100%]")) {
            modal.classList.remove("translate-x-[100%]");
        } else {
            modal.classList.add("translate-x-[100%]");
        }
    });
});

function getBaseUrl() {
    const { protocol, hostname, port } = window.location;
    return `${protocol}//${hostname}${port ? `:${port}` : ""}/`;
}

const baseUrl = getBaseUrl();

function formatCurrency(amount) {
    return (
        new Intl.NumberFormat("vi-VN", { style: "currency", currency: "VND" })
            .format(amount)
            .replace("₫", "") + "₫"
    );
}

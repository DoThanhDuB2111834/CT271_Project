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

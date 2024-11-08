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
        if (modal.classList.contains("hidden")) {
            modal.classList.remove("hidden");
            modal.classList.add("flex");
        } else {
            modal.classList.add("hidden");
            modal.classList.remove("flex");
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

document.querySelectorAll(".expand-categories-child").forEach((label) => {
    label.addEventListener("click", function () {
        const nextUl = label.nextElementSibling;
        if (nextUl && nextUl.tagName === "UL") {
            nextUl.classList.toggle("hidden");
        }
    });
});

const buttonsIncrease = document.querySelectorAll(".btn-increase");

buttonsIncrease.forEach((button) => {
    button.addEventListener("click", function (event) {
        const id = event.target.dataset.id;
        var quantityInput = document.getElementById(`quantityOfProduct${id}`);
        var currentQuantity = Number(quantityInput.value) + 1;
        quantityInput.setAttribute("value", currentQuantity);
    });
});

const buttonsDecrease = document.querySelectorAll(".btn-decrease");

buttonsDecrease.forEach((button) => {
    button.addEventListener("click", function (event) {
        const id = event.target.dataset.id;
        var quantityInput = document.getElementById(`quantityOfProduct${id}`);
        var currentQuantity = Number(quantityInput.value) - 1;
        if (currentQuantity >= 1) {
            quantityInput.setAttribute("value", currentQuantity);
        }
    });
});

var topbar_search_result = document.getElementById("topbar-search-result");

document
    .getElementById("topbar-search")
    .addEventListener("keyup", async function (event) {
        value = event.target.value;

        const key = event.key;

        if (value == "") {
            topbar_search_result.innerHTML = "";
        } else if (
            value != "" &&
            (/^[A-Za-z]$/.test(key) || key === "Backspace")
        ) {
            const response = await fetch(`${baseUrl}api/product/${value}`, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
            });

            const ApiData = await response.json();

            topbar_search_result.innerHTML = "";

            const products = ApiData.products;

            products.forEach((product) => {
                console.log(product);
                var html = `<li >
                <a href="product/${product.id}" class="flex flex-row p-3">
                <div class="topbar-search-result-image basis-1/4 bg-no-repeat bg-cover bg-center h-[50px]"
                    style="background-image: url(${baseUrl}${
                    product.imageUrl
                });"></div>
                <div class="topbar-search-result-name text-center">
                    ${product.name}
                </div>
                <div class="topbar-search-result-price">
                    ${formatCurrency(product.price)}
                </div>
                </a>
            </li>
            <hr class="my-3"></hr>`;
                topbar_search_result.innerHTML += html;
            });
        }
    });

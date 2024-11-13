import { cartitem } from "./cartitem.js";
import { Cart } from "./GuestCart.js";

var cartList = document.getElementById("cart-list");

const cart = new Cart();
var cartItems = cart.items;

var cart_totalprice = document.getElementById("cart-itemsprice");
cart_totalprice.textContent = formatCurrency(cart.getTotalCartPrice());

cartItems.forEach((element) => {
    var html = `<div class="cart-item mt-5 flex flex-row" data-id="${
        element.productId
    }" data-name="${element.productName}">
                    <div class="cart-item-image basis-1/4 h-[110px] bg-cover bg-no-repeat bg-center"
                        style="background-image: url(${
                            baseUrl + element.imageUrl
                        });">
                    </div>
                    <div class="flex flex-row justify-between basis-3/4">
                        <div class="cart-item-infor basis-3/4">
                            <h1 class="text-[#0A0A0B]">${
                                element.productName
                            }</h1>
                            <p class="text-[#7d7d7d] text-sm mt-5">${
                                element.size
                            }</p>
                            <p class="text-[#BC5B64] mt-2">${formatCurrency(
                                element.price
                            )}</p>
                        </div>
                        <div class="cart-item-action basis-1/4 flex flex-col justify-between items-center">
                            <button class="remove-cartItem" data-id="${
                                element.productId
                            }">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <div class="quantity-control">
                                <button class="btn-decrease" data-id="${
                                    element.productId
                                }">-</button>
                                <input type="number" id="quantityOfProduct${
                                    element.productId
                                }" value="${element.quantity}" min="1">
                                <button class="btn-increase" data-id="${
                                    element.productId
                                }">+</button>
                            </div>
                        </div>
                    </div>
                </div><hr class="my-4">`;
    cartList.innerHTML += html;
});

document
    .getElementById("update-cart-button")
    .addEventListener("click", async function (event) {
        const cartItems = document.querySelectorAll(".cart-item");

        for (const item of cartItems) {
            const productId = item.dataset.id;
            const productName = item.dataset.name;
            const quantityInput = item.querySelector("input[type='number']");
            const quantity = Number(quantityInput.value);

            if ((await cart.syncItems(productId, quantity)) == false) {
                await Swal.fire({
                    title: "Thất bại!",
                    text: `Số lượng sản phẩm ${productName} trong kho không đủ`,
                    icon: "error",
                });
                return;
            }
        }

        await Swal.fire({
            title: "Thành công!",
            text: `Cập nhật giỏ hàng thành công thành công`,
            icon: "success",
        });

        location.reload();
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

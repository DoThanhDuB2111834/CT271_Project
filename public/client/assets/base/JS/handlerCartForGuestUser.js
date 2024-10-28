import { cartitem } from "./cartitem.js";
import { Cart } from "./cart.js";

const cart = new Cart();
var cartItems = cart.items;
var rightCartModalBody = document.querySelector(".cart-right-modal-body");
var cart_right_modal_footer_total_price = document.querySelector(
    "#cart-right-modal-footer-total-price"
);
cart_right_modal_footer_total_price.textContent = formatCurrency(
    cart.getTotalCartPrice()
);

const cart_amount_labels = document.querySelectorAll(".cart-amount-label");

cart_amount_labels.forEach((button) => {
    if (cart.getAmountItems() > 0) {
        button.textContent = cart.getAmountItems();
    }
});
cartItems.forEach((element) => {
    var html = `<div class="flex flex-row pt-4 mt-4">
                                                                                    <div class="cart-product-image basis-1/6 h-[50px] bg-cover bg-no-repeat bg-center"
                                                                                        style="flex-basis: 16.666667%; background-image: url(${
                                                                                            baseUrl +
                                                                                            element.imageUrl
                                                                                        });">

                                                                                    </div>
                                                                                    <div class="basis-5/6 flex flex-row justify-between" style="flex-basis: 83.333333%;">
                                                                                        <div>
                                                                                            <p>${
                                                                                                element.productName
                                                                                            }</p>
                                                                                            <p class="text-[#666666d9]">${
                                                                                                element.quantity
                                                                                            } x ${formatCurrency(
        element.price
    )}</p>
                                                                                        </div>
                                                                                        <button class="remove-cartItem" data-id="${
                                                                                            element.productId
                                                                                        }"><i class="fa-solid fa-xmark"></i></button>
                                                                                    </div>
                                                                                </div>`;
    rightCartModalBody.innerHTML += html;
});
// cart.reset();
const buttonsIncrease = document.querySelectorAll(".btn-increase");

buttonsIncrease.forEach((button) => {
    button.addEventListener("click", function (event) {
        const id = event.target.dataset.id;
        var quantityInput = document.getElementById(`quantityOfProduct${id}`);
        var currentQuantity = Number(quantityInput.value) + 1;
        if (currentQuantity > 1) {
            quantityInput.setAttribute("value", currentQuantity);
        }
    });
});

const buttonsDecrease = document.querySelectorAll(".btn-decrease");

buttonsDecrease.forEach((button) => {
    button.addEventListener("click", function (event) {
        const id = event.target.dataset.id;
        var quantityInput = document.getElementById(`quantityOfProduct${id}`);
        var currentQuantity = Number(quantityInput.value) - 1;
        quantityInput.setAttribute("value", currentQuantity);
    });
});

const buttonsAddCart = document.querySelectorAll(".btn-add-cart");

buttonsAddCart.forEach((button) => {
    button.addEventListener("click", async function (event) {
        const productId = event.target.dataset.id;
        const name = event.target.dataset.name;
        const price = event.target.dataset.price;
        const imageUrl = event.target.dataset.imageurl;
        const size = event.target.dataset.size;
        var quantityInput = document.getElementById(
            `quantityOfProduct${productId}`
        );

        const quantity =
            quantityInput == null ? 1 : Number(quantityInput.value);
        var cartItem = new cartitem(
            price,
            quantity,
            productId,
            name,
            imageUrl,
            size
        );

        cart.addItem(cartItem);
        cart.displayCart();
        await Swal.fire({
            title: "Thành công!",
            text: "Sản phẩm đã được thêm vào giỏ hàng",
            icon: "success",
        });
        location.reload();
    });
});

const buttonsRemoveCartItem = document.querySelectorAll(".remove-cartItem");

buttonsRemoveCartItem.forEach((button) => {
    button.addEventListener("click", async function (event) {
        const id = event.currentTarget.dataset.id;
        cart.removeItem(id);
        cart.displayCart();
        await Swal.fire({
            title: "Thành công!",
            text: "Sản phẩm đã được xóa khỏi giỏ hàng",
            icon: "success",
        });
        location.reload();
    });
});

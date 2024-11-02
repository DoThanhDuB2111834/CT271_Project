import { Cart } from "./UserCart.js";

var cart = await Cart.createInstance();
var cartItems = cart.items;

var cart_itemsprice = document.getElementById("cart-itemsprice");
cart_itemsprice.textContent = formatCurrency(cart.getTotalCartPrice());

var cart_totalprice = document.getElementById("cart-totalprice");
cart_totalprice.value = cart.getTotalCartPrice();
cart_totalprice.textContent = formatCurrency(cart.getTotalCartPrice());

var cart_infor_items_body = document.getElementById("cart-infor-items-body");

cartItems.forEach((element) => {
    var html = `<hr class="m-4">
                <div class="cari-item-infor flex flex-row">

                    <div class="cart-item-image basis-1/4 h-[90px] bg-cover bg-no-repeat bg-center"
                        style="background-image: url(${
                            baseUrl + element.imageUrl
                        });">
                    </div>
                    <div class="cart-item-name basis-2/4 flex items-center justify-center">${
                        element.productName
                    }<span
                            class="font-bold ml-2 text-lg">x ${
                                element.quantity
                            }</span></div>
                    <div class="cart-item-price basis-1/4 flex items-center justify-center">${formatCurrency(
                        element.price
                    )}</div>
                </div>`;

    cart_infor_items_body.innerHTML += html;
});

async function getCouponFromServer(id) {
    const response = await fetch(`${baseUrl}api/getCoupon/${id}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    });
    const ApiData = await response.json();
    return ApiData;
}

var searchCouponButton = document.getElementById("find-coupon");

searchCouponButton.addEventListener("click", async function (event) {
    event.preventDefault();
    var couponInput = document.getElementById("coupon-input");
    var couponId = couponInput.value;
    var selector = `input[value="${couponId}"]`;
    const inputs = document.querySelectorAll(selector);
    let inputExists = false;
    inputs.forEach((input) => {
        if (input.value === couponId) {
            inputExists = true;
        }
    });
    if (!inputExists) {
        var ApiData = await getCouponFromServer(couponId);
        if (ApiData.success) {
            await Swal.fire({
                title: "Thành công!",
                text: "Coupon đã được áp dụng thành công",
                icon: "success",
            });
            var coupon = ApiData.coupon;
            var couponList = document.getElementById("coupon-cartpage-list");
            var decreasePrice = formatCurrency(
                (cart.getTotalCartPrice() * coupon.value) / 100
            );
            var couponElement = document.createElement("p");
            couponElement.classList.add("text-end");
            couponElement.textContent = `(-${coupon.value}%) - ${decreasePrice}`;
            var couponInput = document.createElement("input");
            couponInput.type = "hidden";
            couponInput.value = `${coupon.id}`;
            couponInput.setAttribute("name", "couponIds[]");
            couponList.appendChild(couponElement);
            couponList.appendChild(couponInput);

            var totalPrice = Number(cart_totalprice.value);
            cart_totalprice.textContent = formatCurrency(
                totalPrice - (totalPrice * coupon.value) / 100
            );
            cart_totalprice.value =
                totalPrice - (totalPrice * coupon.value) / 100;
        } else {
            await Swal.fire({
                title: "Thất bại!",
                text: `${ApiData.message}`,
                icon: "error",
            });
        }
    } else {
        await Swal.fire({
            title: "Thông báo",
            text: "Coupon đã được áp vào đơn hàng rồi!",
            icon: "info",
        });
    }
});

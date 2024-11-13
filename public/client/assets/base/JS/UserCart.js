export class Cart {
    constructor(data) {
        this.items = data;
    }

    static async createInstance() {
        var data = [];
        if (localStorage.getItem("cartItems") !== null) {
            await Cart.sync(); // Sử dụng tên class trực tiếp
        }
        data = await Cart.getCartItems();
        return new Cart(data);
    }

    static async getCartItems() {
        const response = await fetch(`${baseUrl}api/getCartItems`, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        });
        const ApiData = await response.json();
        return ApiData.items;
    }

    static async sync() {
        console.log("sync");
        const csrfToken = document
            .querySelector('input[name="_token"]')
            .getAttribute("value");
        const cartItems = JSON.parse(localStorage.getItem("cartItems"));
        const response = await fetch(`${baseUrl}api/sync-cart`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ items: cartItems, _token: csrfToken }),
        });
        const ApiData = await response.json();
        if (ApiData.success) {
            await Swal.fire({
                title: "Thành công!",
                text: "Sản phẩm trong giỏ hàng khách đã được đồng bộ vào csdl",
                icon: "success",
            });
            localStorage.removeItem("cartItems");
        } else if (response.status == 403) {
            return;
        } else {
            await Swal.fire({
                title: "Thất bại!",
                text: ApiData.message,
                icon: "error",
            });
        }
    }

    getAmountItems() {
        return this.items.length;
    }

    getTotalCartPrice() {
        return this.items.reduce(
            (total, item) => total + item.price * item.quantity,
            0
        );
    }

    async addOrUpdateItem(item) {
        const csrfToken = document
            .querySelector('input[name="_token"]')
            .getAttribute("value");
        const response = await fetch(`${baseUrl}api/addOrUpdateCart`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ item: item, _token: csrfToken }),
        });
        const ApiData = await response.json();
        return ApiData.success ? true : false;
    }

    async removeItem(id) {
        const csrfToken = document
            .querySelector('input[name="_token"]')
            .getAttribute("value");
        const response = await fetch(`${baseUrl}api/removeCart/${id}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ _token: csrfToken }),
        });
        const ApiData = await response.json();
        return ApiData.success ? true : false;
    }

    async syncItem(productId, quantity) {
        const csrfToken = document
            .querySelector('input[name="_token"]')
            .getAttribute("value");
        const response = await fetch(`${baseUrl}api/syncItem`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                productId: productId,
                quantity: quantity,
                _token: csrfToken,
            }),
        });
        const ApiData = await response.json();
        return ApiData.success ? true : false;
    }

    displayCart() {
        this.items.forEach((item) => {
            console.log(
                `id sản phẩm: ${item.productId}, Giá: ${item.price}, Số lượng: ${item.quantity}`
            );
        });
    }
}

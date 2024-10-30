export class Cart {
    constructor() {
        this.items = JSON.parse(localStorage.getItem("cartItems")) || []; // Lấy giỏ hàng từ Local Storage nếu có
    }

    async getQuantityProduct(id) {
        const response = await fetch(`${baseUrl}api/getQuantityProduct/${id}`, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        });

        const ApiData = await response.json();
        return ApiData.quantity;
    }

    async addOrUpdateItem(item) {
        var hasAlreadyAdd = false;
        for (var i = 0; i < this.items.length; i++) {
            if (this.items[i].productId == item.productId) {
                if (
                    (await this.getQuantityProduct(item.productId)) <
                    item.quantity + this.items[i].quantity
                ) {
                    return false;
                }
                this.items[i].quantity += item.quantity;
                hasAlreadyAdd = true;
                break;
            }
        }
        if (!hasAlreadyAdd) {
            this.items.push(item);
        }
        this.saveCart();
        return true;
    }

    async syncItems(id, quantity) {
        for (var i = 0; i < this.items.length; i++) {
            if (this.items[i].productId == id) {
                if (
                    (await this.getQuantityProduct(this.items[i].productId)) <
                    quantity
                ) {
                    return false;
                }
                this.items[i].quantity = quantity;
                return true;
            }
        }
    }

    removeItem(productId) {
        this.items = this.items.filter((item) => item.productId != productId);
        this.saveCart();
    }

    saveCart() {
        localStorage.setItem("cartItems", JSON.stringify(this.items));
    }

    reset() {
        this.items = [];
        this.saveCart();
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

    displayCart() {
        this.items.forEach((item) => {
            console.log(
                `id sản phẩm: ${item.productId}, Giá: ${item.price}, Số lượng: ${item.quantity}`
            );
        });
    }
}

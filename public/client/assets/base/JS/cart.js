export class Cart {
    constructor() {
        this.items = JSON.parse(localStorage.getItem("cartItems")) || []; // Lấy giỏ hàng từ Local Storage nếu có
    }

    addItem(item) {
        var hasAlreadyAdd = false;
        for (var i = 0; i < this.items.length; i++) {
            if (this.items[i].productId == item.productId) {
                this.items[i].quantity += item.quantity;
                hasAlreadyAdd = true;
                break;
            }
        }
        if (!hasAlreadyAdd) {
            this.items.push(item);
        }
        this.saveCart();
    }

    update(itemId, quantity) {
        var hasAlreadyUpdate = false;
        for (var i = 0; i < this.items.length; i++) {
            if (this.items[i].productId == itemId) {
                this.items[i].quantity = quantity;
                hasAlreadyUpdate = true;
                break;
            }
        }
        if (!hasAlreadyUpdate) {
            this.items.push(item);
        }
        this.saveCart();
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

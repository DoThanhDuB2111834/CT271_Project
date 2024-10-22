const table_product_detail = document.getElementById("table_product_detail");

function hasAlreadyAppended(product) {
    const rows = table_product_detail.querySelectorAll("tr");
    for (const element of rows) {
        if (
            element
                .querySelector('[name="product_ids[]"]')
                .getAttribute("value") == product.id
        ) {
            return element;
        }
    }
    return false;
}

// function updateRecord(e) {
//     let record = e.target.closest("tr");
//     var quantity = Number(
//         record.querySelector('[name="product_quantity[]"]').value
//     );
//     if (quantity < 0) {
//         notificate("warning", "quantity must be greater than 0");
//         record.querySelector('[name="product_quantity[]"]').value = 0;
//         return;
//     }

//     var price = Number(record.querySelector('[name="product_price[]"]').value);
//     if (price < 0) {
//         notificate("warning", "price must be greater than 0");
//         record.querySelector('[name="product_price[]"]').value = 0;
//         return;
//     }
//     record.querySelector('[field="total"]').textContent = quantity * price;
// }

function appendProduct(product) {
    var record = document.createElement("tr");
    record.setAttribute("role", "row");

    var idElement = document.createElement("td");
    idElement.textContent = product.id;
    // Create id input element to submit data to sever
    idInput = document.createElement("input");
    idInput.setAttribute("type", "hidden");
    idInput.setAttribute("name", "product_ids[]");
    idInput.setAttribute("value", product.id);
    idElement.appendChild(idInput);

    var nameElement = document.createElement("td");
    nameElement.textContent = product.name;

    var sizeElement = document.createElement("td");
    sizeElement.textContent = product.size;

    var colorElement = document.createElement("td");
    colorElement.textContent = product.color;

    // var quantityElement = document.createElement("td");
    // var quantityInput = document.createElement("input");
    // quantityInput.type = "number";
    // quantityInput.value = 1;
    // quantityInput.classList.add("form-control");
    // quantityInput.addEventListener("change", function (e) {
    //     updateRecord(e);
    // });
    // quantityInput.name = "product_quantity[]";

    // quantityElement.appendChild(quantityInput);

    var priceElement = document.createElement("td");
    priceElement.textContent = product.price;
    // var priceInput = document.createElement("input");
    // priceInput.type = "number";
    // priceInput.value = 0;
    // priceInput.classList.add("form-control");
    // priceInput.name = "product_price[]";
    // priceInput.addEventListener("change", function (e) {
    //     updateRecord(e);
    // });

    // priceElement.appendChild(priceInput);

    // var totalElement = document.createElement("td");
    // totalElement.setAttribute("field", "total");
    // totalElement.textContent = 0;

    var actionElements = document.createElement("td");
    var actionDelete = document.createElement("i");
    actionDelete.classList.add("fa");
    actionDelete.classList.add("fa-times");
    actionDelete.style.cursor = "pointer";
    actionDelete.addEventListener("click", function (e) {
        removeRecord(e);
    });

    actionElements.appendChild(actionDelete);

    record.appendChild(idElement);
    record.appendChild(nameElement);
    record.appendChild(sizeElement);
    record.appendChild(colorElement);
    // record.appendChild(quantityElement);
    record.appendChild(priceElement);
    // record.appendChild(totalElement);
    record.appendChild(actionElements);

    table_product_detail.appendChild(record);
    notificate("success", "add sucessfully");
}

// function increseaQuantity(record) {
//     var quantity = Number(
//         record.querySelector('[name="product_quantity[]"]').value
//     );
//     quantity++;
//     record.querySelector('[name="product_quantity[]"]').value = quantity;

//     var price = Number(record.querySelector('[name="product_price[]"]').value);

//     record.querySelector('[field="total"]').textContent = quantity * price;

//     notificate("success", "incresea sucessfully");
// }

function removeRecord(e) {
    e.target.closest("tr").remove();
}

function addProductToTable(product) {
    var element = hasAlreadyAppended(product);
    if (element) {
        notificate("success", "product has already been added");
    } else {
        appendProduct(product);
    }
}

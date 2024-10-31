import { ApiHandler } from "../../../api/ApiHandler.js";

function getBaseUrl() {
    const { protocol, hostname, port } = window.location;
    return `${protocol}//${hostname}${port ? `:${port}` : ""}/`;
}

const baseUrl = getBaseUrl();

export class searchBarHandler {
    async renderTileHTML(data) {
        if (!Array.isArray(data)) {
            throw new Error("Input is not an array");
        }
        let panel_show_search_result = document.getElementById(
            "panel_show_search_result"
        );
        panel_show_search_result.innerHTML = "";
        // Create title for panel_show_search_result
        let title_item = document.createElement("li");
        title_item.classList.add("row");
        title_item.classList.add("search_result_item_title");
        for (const key in data[0]) {
            if (data[0].hasOwnProperty(key)) {
                const div = document.createElement("div");
                if (key == "imageUrl") {
                    div.setAttribute("value", "image");
                    div.setAttribute("field", "image-text");
                    div.innerText = "Image";
                } else {
                    div.setAttribute("field", key);
                    div.setAttribute("value", key);
                    div.innerText = key;
                }
                title_item.appendChild(div);
            }
        }
        panel_show_search_result.appendChild(title_item);
    }

    async renderResultHTML(data) {
        if (!Array.isArray(data)) {
            throw new Error("Input is not an array");
        }
        let panel_show_search_result = document.getElementById(
            "panel_show_search_result"
        );
        // var panel_show_search_result = "";
        data.forEach((item) => {
            const result_item = document.createElement("li");
            result_item.classList.add("row");
            result_item.classList.add("search_result_item");
            for (const key in item) {
                // console.log(key, item[key]);
                if (item.hasOwnProperty(key)) {
                    const div = document.createElement("div");
                    div.setAttribute("field", key);
                    div.setAttribute("value", item[key]);
                    if (key != "imageUrl") div.innerText = item[key];
                    result_item.appendChild(div);
                }
            }
            panel_show_search_result.appendChild(result_item);
            // panel_show_search_result += result_item.innerHTML;
        });
        // return panel_show_search_result;
    }

    async generateCSSTile() {
        panel_show_search_result
            .querySelectorAll('[field="image-text"]')
            .forEach((Element) => {
                Element.classList.add("col-lg-4");
            });

        panel_show_search_result
            .querySelectorAll('[field="image-text"]')
            .forEach((Element) => {
                Element.classList.add("search_result_item_text");
            });

        panel_show_search_result
            .querySelectorAll('[field="image-text"]')
            .forEach((Element) => {
                Element.classList.add("has_space");
            });
    }

    generateResultCSS() {
        let panel_show_search_result = document.querySelector(
            "#panel_show_search_result"
        );

        panel_show_search_result
            .querySelectorAll('[field="price"]')
            .forEach((Element) => {
                Element.classList.add("d-none");
            });

        panel_show_search_result
            .querySelectorAll('[field="id"]')
            .forEach((Element) => {
                Element.classList.add("d-none");
            });

        panel_show_search_result
            .querySelectorAll('[field="name"]')
            .forEach((Element) => {
                Element.classList.add("col-lg-3");
            });

        panel_show_search_result
            .querySelectorAll('[field="name"]')
            .forEach((Element) => {
                Element.classList.add("search_result_item_text");
            });

        panel_show_search_result
            .querySelectorAll('[field="name"]')
            .forEach((Element) => {
                Element.classList.add("has_space");
            });

        panel_show_search_result
            .querySelectorAll('[field="size"]')
            .forEach((Element) => {
                Element.classList.add("col-lg-3");
            });

        panel_show_search_result
            .querySelectorAll('[field="size"]')
            .forEach((Element) => {
                Element.classList.add("search_result_item_text");
            });

        panel_show_search_result
            .querySelectorAll('[field="size"]')
            .forEach((Element) => {
                Element.classList.add("has_space");
            });

        panel_show_search_result
            .querySelectorAll('[field="color"]')
            .forEach((Element) => {
                Element.classList.add("col-lg-2");
            });
        panel_show_search_result
            .querySelectorAll('[field="color"]')
            .forEach((Element) => {
                Element.classList.add("search_result_item_text");
            });

        panel_show_search_result
            .querySelectorAll('[field="color"]')
            .forEach((Element) => {
                Element.classList.add("has_space");
            });

        panel_show_search_result
            .querySelectorAll('[field="imageUrl"]')
            .forEach((Element) => {
                Element.classList.add("col-lg-4");
            });

        panel_show_search_result
            .querySelectorAll('[field="imageUrl"]')
            .forEach((Element) => {
                Element.classList.add("search_result_item_image");
            });

        panel_show_search_result
            .querySelectorAll('[field="imageUrl"]')
            .forEach((Element) => {
                Element.classList.add("has_space");
            });

        panel_show_search_result
            .querySelectorAll('[field="imageUrl"]')
            .forEach((Element) => {
                Element.style.backgroundImage = `url(${baseUrl}${Element.getAttribute(
                    "value"
                )})`;
            });
    }

    async search(searchInput) {
        let url = `/api/product/${searchInput}`;
        let method = "GET";
        let dataResult = await ApiHandler.process(url, method);
        // console.log(dataResult);
        if (dataResult.oke) {
            this.renderTileHTML(dataResult.products);
            this.generateCSSTile();
            this.renderResultHTML(dataResult.products);
            this.generateResultCSS();
        }
    }
}

export class ApiHandler {
    static async process(url, method, data = {}) {
        const response = await fetch(url, {
            method: method,
            headers: {
                "Content-Type": "application/json",
            },
            body: method == "GET" ? null : JSON.stringify(data),
        });

        const ApiData = await response.json();
        return ApiData;
    }
}

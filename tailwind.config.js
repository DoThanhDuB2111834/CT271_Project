/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            backgroundImage: {
                home: "url('Image/slider/banner-trang-chu-san-pham.jpg')",
            },
            colors: {
                "ct-orange": {
                    400: "#f18e33",
                },
            },
        },
    },
    plugins: [],
};

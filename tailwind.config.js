/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/css/**/*.css",
        "./resources/js/**/*.js",
        "./resources/src/**/*.css",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {},
    },
    darkMode: "class",
    plugins: [require("flowbite/plugin")],
};

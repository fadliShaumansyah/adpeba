import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";
import path from "path";

export default defineConfig({
    plugins: [
        react(),
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/script.js",
                "resources/js/main.jsx",
            ],
            refresh: true,
        }),
    ],
    alias: {
        "@": path.resolve(__dirname, "resources/js"),
    },
});

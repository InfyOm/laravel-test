import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            input: [
                "resources/assets/message.js",
                "resources/assets/message.css",
            ],
            input: ["resources/assets/turbo.js"],
            refresh: true,
        }),
    ],
});

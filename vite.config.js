import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';



export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/modal.js",
                // "resources/js/editor/main.jsx",
                // "resources/js/html/main.jsx",
            ],
            refresh: true,
        }),
        //react(),    
    ],
    
});

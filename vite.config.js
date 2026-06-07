import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/theme.js",
                // "resources/js/editor/main.jsx",
                // "resources/js/html/main.jsx",
            ],
            refresh: true,
        }),
        //react(),    
    ],
    
});

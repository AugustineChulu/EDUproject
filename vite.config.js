import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/webfonts/all.css', 
                'resources/css/jquery-ui.css', 
                'resources/js/jquery-ui.js', 
                'resources/js/customBehavioursJS.js',
            ],
            refresh: true,
        }),
    ],
});

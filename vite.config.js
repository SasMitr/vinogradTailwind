import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
               'resources/web/css/app.css',
               'resources/web/js/app.js'
            ],
            refresh: true,
            buildDirectory: '/build/web',
        }),
    ],
});

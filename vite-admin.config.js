import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/admin/css/app.css',
                'resources/admin/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
            ],
            buildDirectory: '/build/admin',
        }),
    ],
});

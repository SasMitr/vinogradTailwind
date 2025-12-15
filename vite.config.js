import { defineConfig } from 'vite';
import laravel, {refreshPaths} from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/web/css/app.css',
                'resources/web/js/app.js'
            ],
            refresh: [
                ...refreshPaths,
            ],
            buildDirectory: '/build/web',
        })
    ],
});

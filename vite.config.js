import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const domain = "my-laravel-todo-list.test";
const homeDir = require('os').homedir();

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        https: {
            key: homeDir + '/.config/valet/Certificates/' + domain + '.key',
            cert: homeDir + '/.config/valet/Certificates/' + domain + '.crt',
        },
        host: domain,
    }
});

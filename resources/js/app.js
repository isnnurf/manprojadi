import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,  // Sesuaikan jalur dengan struktur yang ada
            import.meta.glob('./Pages/**/*.vue') // Menyesuaikan folder views
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)  // Pastikan ZiggyVue digunakan untuk mendukung rute berbasis Laravel
            .mount(el);  // Mount aplikasi Vue di elemen dengan ID yang sesuai
    },
    progress: {
        color: '#4B5563',  // Warna progress bar untuk Inertia
    },

    
});

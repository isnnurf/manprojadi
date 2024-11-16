import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',  // Menambahkan input untuk CSS
        'resources/js/app.js',    // Input untuk JavaScript
      ],
      refresh: true, // Menyegarkan halaman saat ada perubahan
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,               // Menyediakan pengaturan base null untuk URL asset
          includeAbsolute: false,   // Menghindari URL absolute untuk asset
        },
      },
    }),
  ],
});

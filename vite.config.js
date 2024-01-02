import { defineConfig } from 'vite'
import { fileURLToPath, URL } from 'url'
import { quasar, transformAssetUrls } from '@quasar/vite-plugin'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [
    // порядок важен
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
    vue({
      template: { transformAssetUrls },
    }),
    quasar({
      sassVariables: 'resources/css/quasar-variables.sass',
    }),
  ],
  resolve: {
    alias: [
      {
        find: '@',
        replacement: fileURLToPath(
          new URL('./resources/js/src', import.meta.url),
        ),
      },
    ],
  },
})

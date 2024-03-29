import { defineConfig } from 'vite'
import { fileURLToPath, URL } from 'url'
import { quasar, transformAssetUrls } from '@quasar/vite-plugin'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  css: {
    preprocessorOptions: {
      sass: {
        additionalData: `
          @import "./resources/js/src/css/app.sass"
        `,
      },
    },
  },
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
      sassVariables: 'resources/js/src/css/quasar-variables.sass',
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

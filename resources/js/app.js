import './bootstrap'
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { i18n } from '@/boot/i18n'
import { Notify, Quasar } from 'quasar'
import { readonly } from 'vue'
// import Echo from 'laravel-echo'

// Import Pinia
import { createPinia } from 'pinia'
const pinia = createPinia()

// Import icon libraries
import '@quasar/extras/material-icons/material-icons.css'
import '@quasar/extras/mdi-v7/mdi-v7.css'

// Import Quasar css
import 'quasar/src/css/index.sass'

// Import constants
import AUTH from '@/utils/consts/auth'
import CONFIG from '@/utils/settings/config'
import ICONS from '@/utils/consts/icons'
import LEFT_DRAWER_MENU from '@/utils/consts/leftDrawerMenu'
import ROUTES from '@/utils/consts/routes'
import VALIDATION from '@/utils/settings/validation'

createInertiaApp({
  resolve: (name) => {
    const pages = import.meta.glob('./src/**/*.vue', { eager: true })
    return pages[`./src/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
      .provide('AUTH', readonly(AUTH))
      .provide('CONFIG', readonly(CONFIG))
      .provide('ICONS', readonly(ICONS))
      .provide('LEFT_DRAWER_MENU', readonly(LEFT_DRAWER_MENU))
      .provide('ROUTES', readonly(ROUTES))
      .provide('VALIDATION', readonly(VALIDATION))
      .use(plugin)
      .use(Quasar, {
        config: {},
        plugins: { Notify },
      })
      .use(i18n)
      .use(pinia)
    app.mount(el)
    // Echo.privateChannel('notification').listen('ProductUploadFile', (e) => {
    //   alert('abc')
    // })
  },
})

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { Notify, Quasar } from 'quasar'
import { readonly } from 'vue'

// Import i18n
import { createI18n } from 'vue-i18n'
import messages from '@/i18n'
const i18n = createI18n({
  globalInjection: true,
  locale: 'ru-RU',
  messages,
})

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
      .provide('VALIDATION', readonly(VALIDATION))
      .use(plugin)
      .use(Quasar, {
        config: {},
        plugins: { Notify },
      })
      .use(i18n)
      .use(pinia)
    app.mount(el)
  },
})

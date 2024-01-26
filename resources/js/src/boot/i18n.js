// import messages from 'src/i18n'
// import { boot } from 'quasar/wrappers'
// import { createI18n } from 'vue-i18n'

// const i18n = createI18n({
//   globalInjection: true,
//   locale: 'ru-RU',
//   messages,
// })

// export default boot(({ app }) => {
//   app.use(i18n)
// })

// export { i18n }

import { createI18n } from 'vue-i18n'
import messages from '@/i18n'
const i18n = createI18n({
  globalInjection: true,
  locale: 'ru-RU',
  messages,
})

export { i18n }

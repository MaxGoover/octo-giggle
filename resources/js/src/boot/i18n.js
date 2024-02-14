import { createI18n } from 'vue-i18n'
import messages from '@/i18n'
const i18n = createI18n({
  globalInjection: true,
  locale: 'ru-RU',
  messages,
})

export { i18n }

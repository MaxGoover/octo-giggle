import { defineStore } from 'pinia'
import { i18n } from '@/boot/i18n'
import { router } from '@inertiajs/vue3'
import { ref } from 'vue'
import AUTH from '@/utils/consts/auth'
import notify from '@/utils/helpers/notify'
import ROUTES from '@/utils/consts/routes'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    authType: AUTH.TYPE.BY_EMAIL,
    email: 'maxgoover@gmail.com',
    emailCode: ref({
      id: null,
      code: null,
      timeout: null,
    }),
    emailCodeTimeout: null,
    password: '123456',
    phoneFormatted: '+7 (903) 261-93-16',
    step: AUTH.STEP.BY_EMAIL_FORM,
  }),

  getters: {},

  actions: {
    // Получает код для авторизации
    async fetchEmailCode() {
      console.log('fetchEmailCode')

      return router.post(
        ROUTES.AUTH.BY_EMAIL_FORM,
        {
          email: this.email,
        },
        {
          onSuccess: (response) => {
            this.email = response.props.email
            this.emailCode = response.props.emailCode
            notify.success(
              i18n.global.t('message.codeForAuthorization', { authCode: this.emailCode.code }),
            )
            this.clearEmailCodeTimeout()
            this.setEmailCodeTimeout(response.props.emailCode.timeout)
          },
          onError: (errors) => {
            console.error(errors)
            notify.error(Object.values(errors)[0])
          },
        },
      )
    },
    async signInByEmailCode() {
      console.log('signInByEmailCode')

      return router.post(
        ROUTES.AUTH.BY_EMAIL_CONFIRM,
        {
          email: this.email,
          emailCode: this.emailCode,
        },
        {
          onSuccess: (response) => {},
          onError: (errors) => {
            console.error(errors)
            notify.error(Object.values(errors)[0])
          },
        },
      )
    },
    async signInByPhone() {
      console.log('signInByPhone')

      return router.post(
        ROUTES.AUTH.BY_PHONE_CONFIRM,
        {
          password: this.password,
          phoneFormatted: this.phoneFormatted,
        },
        {
          onError: (errors) => {
            console.error(errors)
            notify.error(Object.values(errors)[0])
          },
        },
      )
    },
    async signOut() {
      console.log('signOut')

      return router.delete(
        ROUTES.AUTH.SIGN_OUT,
        {
          password: this.password,
          phoneFormatted: this.phoneFormatted,
        },
        {
          onSuccess: (response) => {
            console.log('response', response)
          },
          onError: (errors) => {
            console.error(errors)
            notify.error(Object.values(errors)[0])
          },
        },
      )
    },
    clearEmailCodeTimeout() {
      this.emailCodeTimeout = 0
    },
    setAuthType(authType) {
      this.authType = authType
    },
    setEmailCodeTimeout(emailCodeTimeout) {
      this.emailCodeTimeout = emailCodeTimeout
    },
    setStep(step) {
      this.step = step
    },
  },
})

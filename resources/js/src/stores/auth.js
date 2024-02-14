import { defineStore } from 'pinia'
import { router } from '@inertiajs/vue3'
import { reactive, ref } from 'vue'
import AUTH from '@/utils/consts/auth'
import notify from '@/utils/helpers/notify'
import ROUTES from '@/utils/consts/routes'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    authType: AUTH.TYPE.BY_EMAIL,
    password: '123456',
    phoneFormatted: '+7 (903) 261-93-16',
    emailCode: ref({
      id: null,
      code: null,
      timeout: null,
    }),
    emailCodeTimeout: null,
    step: AUTH.STEP.BY_EMAIL_FORM,
  }),

  getters: {},

  actions: {
    async authByEmailCode() {
      console.log('authByEmailCode')

      return router.post(
        ROUTES.AUTH.BY_EMAIL_CONFIRM,
        {
          emailCode: this.emailCode,
          phoneFormatted: this.phoneFormatted,
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
    async authByPhoneConfirm() {
      console.log('authByPhoneConfirm')

      return router.post(
        ROUTES.AUTH.BY_PHONE_CONFIRM,
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
    // Получает код для авторизации
    async fetchEmailCode() {
      console.log('fetchEmailCode')

      return router.post(
        ROUTES.AUTH.BY_EMAIL_FORM,
        {
          phoneFormatted: this.phoneFormatted,
        },
        {
          onSuccess: (response) => {
            this.phoneFormatted = response.props.phoneFormatted
            this.emailCode = response.props.emailCode
            notify.success('Смс-код для авторизации ' + this.emailCode.code)

            // костыль
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

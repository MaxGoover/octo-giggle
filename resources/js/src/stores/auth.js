import { defineStore } from 'pinia'
import { router } from '@inertiajs/vue3'
import AUTH from '@/utils/consts/auth'
import notify from '@/utils/helpers/notify'
import ROUTES from '@/utils/consts/routes'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    // isShowedAuthLoader: false,
    authType: AUTH.TYPE.BY_SMS,
    phoneFormatted: '+7 (903) 261-93-16',
    smsCode: 0,
    smsCodeTimeout: 0,
    step: AUTH.STEP.BY_SMS_FORM,
  }),

  getters: {},

  actions: {
    async authBySmsCode() {
      return router.post(
        ROUTES.MAIN,
        {
          phoneFormatted: this.phoneFormatted,
        },
        {
          onSuccess: (response) => {
            this.phoneFormatted = response.props.phoneFormatted
            this.smsCode = response.props.smsCode
            this.smsCodeTimeout = response.props.smsCodeTimeout
            console.log('smsCode', response.props.smsCode)
            notify.success('Смс-код для авторизации ' + response.props.smsCode)
          },
        },
      )
    },
    async fetchCompanyCounters() {
      console.log('async fetchCompanyCounters')
      // axios
    },
    async fetchSmsCode() {
      return router.post(
        ROUTES.AUTH.BY_SMS_FORM,
        {
          phoneFormatted: this.phoneFormatted,
        },
        {
          onSuccess: (response) => {
            this.phoneFormatted = response.props.phoneFormatted
            this.smsCode = response.props.smsCode
            this.smsCodeTimeout = response.props.smsCodeTimeout
            console.log('smsCode', response.props.smsCode)
            notify.success('Смс-код для авторизации ' + response.props.smsCode)
          },
        },
      )
    },
    // hideAuthLoader() {
    //   this.isShowedAuthLoader = false
    // },
    setAuthType(authType) {
      this.authType = authType
    },
    setStep(step) {
      this.step = step
    },
    // showAuthLoader() {
    //   this.isShowedAuthLoader = true
    // },
  },
})

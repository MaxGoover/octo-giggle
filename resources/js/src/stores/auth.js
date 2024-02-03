import { defineStore } from 'pinia'
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import AUTH from '@/utils/consts/auth'
import ROUTES from '@/utils/consts/routes'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    // isShowedAuthLoader: false,
    authType: AUTH.TYPE.BY_SMS,
    phone: '+7 (903) 261-93-16',
    step: AUTH.STEP.BY_SMS_FORM,
  }),

  getters: {},

  actions: {
    // Получает количество зарегистрированных исполнителей и заказчиков
    async fetchCompanyCounters() {
      console.log('async fetchCompanyCounters')
      // axios
    },
    async fetchSmsCode() {
      const authForm = ref({
        phone: this.phone,
      })

      router.get(ROUTES.AUTH.BY_SMS_CONFIRM, authForm)
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

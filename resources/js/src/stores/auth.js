import { defineStore } from 'pinia'
import { TimerCountdown } from '@/entities/auth/TimerCountdown'
import AUTH from '@/utils/consts/auth'
import CONFIG from '@/utils/settings/config'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    // isShowedAuthLoader: false,
    authType: AUTH.TYPE_ENTER_BY_SMS,
    step: AUTH.STEP_BY_SMS_FORM,
    timer: new TimerCountdown(CONFIG.auth.timer.duration),
  }),

  getters: {},

  actions: {
    // Получает количество зарегистрированных исполнителей и заказчиков
    async fetchCompanyCounters() {
      console.log('async fetchCompanyCounters')
      // axios
    },
    // // Проверяет, доступно ли получение нового СМС-кода для авторизации
    // async fetchIsSmsSent() {
    //   console.log('async fetchIsSmsSent')
    //   // axios
    // },
    // // Запрашивает СМС-код для авторизации
    // async fetchSmsCode() {
    //   console.log('async fetchSmsCode')
    //   // axios
    // },
    // hideAuthLoader() {
    //   this.isShowedAuthLoader = false
    // },
    setStep(step) {
      this.step = step
    },
    toggleAuthType(authType) {
      this.authType = authType
    },
    // showAuthLoader() {
    //   this.isShowedAuthLoader = true
    // },
  },
})

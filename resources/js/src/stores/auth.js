import { defineStore } from 'pinia'
import { TimerCountdown } from '@/entities/auth/TimerCountdown'
import $AUTH from '@/utils/consts/auth'
import $CONFIG from '@/utils/settings/config'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    // isShowedAuthLoader: false,
    authType: $AUTH.ENTER_BY_SMS,
    step: $AUTH.ENTER_BY_SMS,
    timer: new TimerCountdown($CONFIG.auth.timer.duration),
  }),

  getters: {},

  actions: {
    // // Получает количество зарегистрированных исполнителей и заказчиков
    // async fetchCompanyCounters() {
    //   console.log('async fetchCompanyCounters')
    //   // axios
    // },
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
    // showAuthLoader() {
    //   this.isShowedAuthLoader = true
    // },
  },
})

import { defineStore } from 'pinia'
import notify from '@/utils/helpers/notify'

export const useDashboardStore = defineStore('dashboard', {
  state: () => ({
    isShowedNotificationsLoader: false,
  }),

  actions: {
    // Получает список уведомлений
    async getNotifications() {
      return axios
        .get('/dashboard/get-notifications')
        .then((response) => {
          this.setNotifications(response.data.notifications)
          console.log('response.data.notifications', response.data.notifications)
        })
        .catch(() => {
          notify.error('Не удалось получить список уведомлений')
        })
    },
    hideNotificationsLoader() {
      this.isShowedNotificationsLoader = false
    },
    setNotifications(value) {
      this.notifications = value
    },
    showNotificationsLoader() {
      this.isShowedNotificationsLoader = true
    },
  },
})

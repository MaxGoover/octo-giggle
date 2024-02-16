import { defineStore } from 'pinia'

export const useWorkersStore = defineStore('workers', {
  state: () => ({
    filters: [
      {
        id: 1,
        name: 'Все',
      },
      {
        id: 2,
        name: 'Дата регистрации',
      },
      {
        id: 3,
        name: 'Партнер',
      },
      {
        id: 4,
        name: 'Город',
      },
    ],
    isShowedWorkersTableSettingsModal: false,
  }),

  actions: {
    // Скрывает настройки таблицы отображения работника
    hideWorkersTableSettingsModal() {
      this.isShowedWorkersTableSettingsModal = false
    },
    // Показывает настройки таблицы отображения работника
    showWorkersTableSettingsModal() {
      this.isShowedWorkersTableSettingsModal = true
    },
  },
})

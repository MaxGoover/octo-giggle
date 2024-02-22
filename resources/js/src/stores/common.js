import { defineStore } from 'pinia'

export const useCommonStore = defineStore('common', {
  state: () => ({
    isShowedLoader: false,
    isShowedModalLoader: false,
    isShowedTableLoader: false,
    isShowedTableSettingsModal: false,
    tableFilters: [
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
  }),

  actions: {
    hideLoader() {
      this.isShowedLoader = false
    },
    hideModalLoader() {
      this.isShowedModalLoader = false
    },
    hideTableLoader() {
      this.isShowedTableLoader = false
    },
    hideTableSettingsModal() {
      this.isShowedTableSettingsModal = false
    },
    showLoader() {
      this.isShowedLoader = true
    },
    showModalLoader() {
      this.isShowedModalLoader = true
    },
    showTableLoader() {
      this.isShowedTableLoader = true
    },
    showTableSettingsModal() {
      this.isShowedTableSettingsModal = true
    },
  },
})

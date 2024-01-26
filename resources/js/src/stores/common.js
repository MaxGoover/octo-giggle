import { defineStore } from 'pinia'

export const useCommonStore = defineStore('common', {
  state: () => ({
    isShowedLoader: false,
    isShowedTableLoader: false,
    isShowedTableSettingsModal: false,
  }),

  actions: {
    hideLoader() {
      this.isShowedLoader = false
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
    showTableLoader() {
      this.isShowedTableLoader = true
    },
    showTableSettingsModal() {
      this.isShowedTableSettingsModal = true
    },
  },
})

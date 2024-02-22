import { defineStore } from 'pinia'
import notify from '@/utils/helpers/notify'

export const useProductsStore = defineStore('products', {
  state: () => ({
    isShowedProductCreateModal: false,
    productCategories: [],
  }),

  actions: {
    // Получает список категорий товаров
    async getProductCategories() {
      return window.axios
        .get('/products/get-product-categories')
        .then((response) => {
          this.setProductCategories(response.data.productCategories)
          console.log(this.productCategories)
        })
        .catch(() => {
          notify.error('Не удалось получить список категорий товаров')
        })
    },
    // Скрывает модальное окно создания товара
    hideProductCreateModal() {
      this.isShowedProductCreateModal = false
    },
    // Изменяет список категорий товаров
    setProductCategories(value) {
      this.productCategories = value
    },
    // Показывает модальное окно создания товара
    showProductCreateModal() {
      this.isShowedProductCreateModal = true
    },
  },
})

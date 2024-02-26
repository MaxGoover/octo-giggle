import { defineStore } from 'pinia'
import axios from 'axios'
import notify from '@/utils/helpers/notify'

export const useProductsStore = defineStore('products', {
  state: () => ({
    isShowedProductCreateModal: false,
    productCategories: [],
    productsFile: null,
  }),

  actions: {
    // Получает список категорий товаров
    async getProductCategories() {
      return axios
        .get('/products/get-product-categories')
        .then((response) => {
          this.setProductCategories(response.data.productCategories)
          console.log(this.productCategories)
        })
        .catch(() => {
          notify.error('Не удалось получить список категорий товаров')
        })
    },
    // Загружает товары файлом
    async uploadProductsFile() {
      return axios
        .post('/products/upload-products-file', this.castFileToForm(this.productsFile), {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        })
        .then((response) => {
          console.log(response)
        })
        .catch(() => {
          notify.error('Не удалось загрузить товары файлом')
        })
    },
    castFileToForm(file) {
      const formFile = new FormData()
      formFile.append('file', file)
      return formFile
    },
    // Скрывает модальное окно создания товара
    hideProductCreateModal() {
      this.isShowedProductCreateModal = false
    },
    // Изменяет список категорий товаров
    setProductCategories(value) {
      this.productCategories = value
    },
    setProductsFile(file) {
      this.productsFile = file
    },
    // Показывает модальное окно создания товара
    showProductCreateModal() {
      this.isShowedProductCreateModal = true
    },
  },
})

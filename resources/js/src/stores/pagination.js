import { defineStore } from 'pinia'
import { Pagination } from '@/entities/table/Pagination'

export const usePaginationStore = defineStore('pagination', {
  state: () => ({
    pagination: new Pagination(),
  }),

  getters: {
    limit: (state) => state.pagination.rowsPerPage,
    offset: (state) =>
      state.pagination.page * state.pagination.rowsPerPage -
      state.pagination.rowsPerPage,
  },

  actions: {
    clearPagination() {
      this.pagination = new Pagination()
    },
    setPagination(pagination) {
      this.pagination = pagination
    },
    setPaginationRowsNumber(rowsNumber) {
      this.pagination.rowsNumber = rowsNumber
    },
    setPaginationSearch(search) {
      this.pagination.search = search
    },
  },
})

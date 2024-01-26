import config from '@/utils/settings/config'

/**
 * @property {bool} descending
 * @property {Number} page
 * @property {Number} rowsNumber
 * @property {Number} rowsPerPage
 * @property {String} search
 * @property {Number} sortBy
 */
export class Pagination {
  descending
  page
  rowsNumber
  rowsPerPage
  search
  sortBy

  constructor(
    descending = config.pagination.descending,
    page = config.pagination.page,
    rowsNumber = config.pagination.rowsNumber,
    rowsPerPage = config.pagination.rowsPerPage,
    search = config.pagination.search,
    sortBy = config.pagination.sortBy,
  ) {
    this.descending = descending
    this.page = page
    this.rowsNumber = rowsNumber
    this.rowsPerPage = rowsPerPage
    this.search = search
    this.sortBy = sortBy
  }
}

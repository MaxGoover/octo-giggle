/**
 * Возвращает текст пагинации после перевода
 * Примечание: эта функция нужна для перевода пагинации в q-table
 * @param {string} firstRowIndex
 * @param {string} endRowIndex
 * @param {string} totalRowsNumber
 */
export const paginationLabel = (
  firstRowIndex,
  endRowIndex,
  totalRowsNumber,
) => {
  return i18n.global.t('table.paginationInfo', {
    endRowIndex,
    totalRowsNumber,
  })
}

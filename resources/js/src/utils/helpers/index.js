/**
 * Делает первую букву строки - заглавной
 * Например: 'addToList' -> 'AddToList'
 *
 * @param {string} iconName
 */
export const capitalizeFirstLetter = (iconName) =>
  iconName[0].toUpperCase() + iconName.slice(1)

/**
 * Очищает номер мобильного телефона от символов, оставляя только цифры
 * @example '+7 (927) 122-69-62' -> '9271226962'
 * @param {string} phone
 * @returns {string}
 */
export const clearPhone = (phone) => {
  phone = phone?.replace('+7', '')
  return phone?.replace(/[^0-9]/g, '')
}

/**
 * Форматирует цифры мобильного телефона
 * @example '9271226962' -> '+7 (927) 122-69-62'
 * @param {string} phone
 * @returns {string}
 */
export const formatPhone = (phone) =>
  '+7 (' +
  phone.substring(0, 3) +
  ') ' +
  phone.substring(3, 6) +
  '-' +
  phone.substring(6, 8) +
  '-' +
  phone.substring(8, 10)

/**
 * Возвращает сгенерированный uuid
 * @returns {string}
 */
export const generateUuid = () =>
  ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, (c) =>
    (
      c ^
      (crypto.getRandomValues(new Uint8Array(1))[0] & (15 >> (c / 4)))
    ).toString(16),
  )

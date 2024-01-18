import { date } from 'quasar'
import validation from '@/utils/settings/validation'

export default {
  formatDate: (dateTime) => date.formatDate(dateTime, validation.date.format),
  formatTime: (dateTime) => date.formatDate(dateTime, validation.time.format),
  /**
   * Форматирует секунды в формат ММ:SS.
   * @example 300 -> '05:00'
   * @param {number|string} time
   * @returns {string}
   */
  formatTimeToMinutesSeconds: (time) =>
    (time - (time %= 60)) / 60 + (9 < time ? ':' : ':0') + time,
}

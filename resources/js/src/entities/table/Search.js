import config from 'src/utils/config'
import { i18n } from 'app/src/boot/i18n'

/**
 * @property {string} placeholder
 * @property {string} value
 */
export class Search {
  placeholder
  value

  constructor(
    placeholder = i18n.global.t('search.by'),
    value = null,
  ) {
    this.placeholder = placeholder
    this.value = value
  }
}

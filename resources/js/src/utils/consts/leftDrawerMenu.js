import { i18n } from '@/boot/i18n'
import { LeftDrawerMenuItem } from '@/entities/LeftDrawerMenuItem'
import ROUTES from '@/utils/consts/routes'

export default [
  // Unit-экономика \/
  [
    new LeftDrawerMenuItem(
      i18n.global.t('menu.unitEconomic.unitEconomic'),
      '',
      'mdi-note-text-outline',
      'unitEconomic',
      '',
    ),
    new LeftDrawerMenuItem(
      i18n.global.t('menu.unitEconomic.wb'),
      ROUTES.UNIT_ECONOMIC.WB,
      '',
      '',
      '',
    ),
    new LeftDrawerMenuItem(
      i18n.global.t('menu.unitEconomic.ozon'),
      ROUTES.UNIT_ECONOMIC.OZON,
      '',
      '',
      '',
    ),
    new LeftDrawerMenuItem(
      i18n.global.t('menu.unitEconomic.conditionsPromotionWb'),
      ROUTES.UNIT_ECONOMIC.CONDITIONS_PROMOTION_WB,
      '',
      '',
      '',
    ),
  ],
  // Продажи по дням
  [
    new LeftDrawerMenuItem(
      i18n.global.t('menu.salesByDays'),
      ROUTES.WORKERS_INDEX,
      'mdi-signal-cellular-outline',
      'salesByDays',
      '',
    ),
  ],
  // Загрузка цен \/
  [
    new LeftDrawerMenuItem(
      i18n.global.t('menu.uploadPrices.uploadPrices'),
      '',
      'mdi-file-upload-outline',
      'uploadPrices',
      '',
    ),
    new LeftDrawerMenuItem(
      i18n.global.t('menu.uploadPrices.ozon'),
      ROUTES.WORKERS_INDEX,
      '',
      '',
      '',
    ),
    new LeftDrawerMenuItem(i18n.global.t('menu.uploadPrices.wildberries'), '', '', '', ''),
  ],
  // Справочник товаров
  [
    new LeftDrawerMenuItem(
      i18n.global.t('menu.handbookGoods'),
      ROUTES.WORKERS_INDEX,
      'mdi-book-open-outline',
      'handbookGoods',
      '',
    ),
  ],
  // Заказы поставщикам
  [
    new LeftDrawerMenuItem(
      i18n.global.t('menu.ordersSuppliers'),
      ROUTES.WORKERS_INDEX,
      'mdi-clipboard-list-outline',
      'ordersSuppliers',
      '',
    ),
  ],
]

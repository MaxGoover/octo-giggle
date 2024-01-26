import { i18n } from '@/boot/i18n'
import { LeftDrawerMenuItem } from '@/entities/LeftDrawerMenuItem'
import ICONS from '@/utils/consts/icons'
import ROUTES from '@/utils/consts/routes'

export default [
    // Заявки
    [
      new LeftDrawerMenuItem(
        i18n.global.t('menu.orders'),
        '',
        ICONS.NOTE_PAD_TEXT,
        'orders',
        '',
      ),
    ],
    // Смены \/
    [
      new LeftDrawerMenuItem(
        i18n.global.t('menu.shifts.shifts'),
        '',
        ICONS.FILE_CLIPBOARD,
        'shifts',
        '',
      ),
      new LeftDrawerMenuItem(i18n.global.t('menu.shifts.inWork'), '', '', '', ''),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.shifts.timeQuadrate'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.shifts.inPayment'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.shifts.archive'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.shifts.cancelled'),
        '',
        '',
        '',
        '',
      ),
    ],
    // Клиенты \/
    [
      new LeftDrawerMenuItem(
        i18n.global.t('menu.customers.customers'),
        '',
        ICONS.USER_LOCKED,
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.customers.list'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.customers.billsInvoice'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.customers.reportAgent'),
        '',
        '',
        '',
        '',
      ),
    ],
    // Работники
    [
      new LeftDrawerMenuItem(
        i18n.global.t('menu.workers'),
        ROUTES.WORKERS_INDEX,
        ICONS.USER_FULL_BODY,
        '',
        '',
      ),
    ],
    // Верификации
    [
      new LeftDrawerMenuItem(
        i18n.global.t('menu.verifications'),
        '',
        ICONS.USER_CHECK,
        '',
        '',
      ),
    ],
    // Рекрутинг \/
    [
      new LeftDrawerMenuItem(
        i18n.global.t('menu.recruiting.recruiting'),
        '',
        ICONS.USER_ADD,
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.recruiting.all'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.recruiting.newRegistrations'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.recruiting.notProcessed'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.recruiting.inProcessOfRegistration'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.recruiting.becomeTaxPayer'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.recruiting.readyToWork'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.recruiting.activeWorkers'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.recruiting.failure'),
        '',
        '',
        '',
        '',
      ),
    ],
    // Налоги самозанятых
    [
      new LeftDrawerMenuItem(
        i18n.global.t('menu.taxesSelfEmployed'),
        '',
        ICONS.MONEY_CASH_BILL1,
        '',
        '',
      ),
    ],
    // Документы \/
    [
      new LeftDrawerMenuItem(
        i18n.global.t('menu.documents.documents'),
        '',
        ICONS.CONTENT_ARCHIVE_LOCKER,
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.documents.contractsWorkers'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.documents.mainContracts'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.documents.documentsAndActs'),
        '',
        '',
        '',
        '',
      ),
    ],
    // Партнеры
    [
      new LeftDrawerMenuItem(
        i18n.global.t('menu.partners'),
        '',
        ICONS.SECURITY_SHIELD_PERSON,
        '',
        '',
      ),
    ],
    // Пользователи \/
    [
      new LeftDrawerMenuItem(
        i18n.global.t('menu.users.users'),
        '',
        ICONS.USER_MULTIPLE,
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.users.operatorsCustomers'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.users.operatorsPartners'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.users.operatorsAll'),
        '',
        '',
        '',
        '',
      ),
    ],
    // Администратор \/
    [
      new LeftDrawerMenuItem(
        i18n.global.t('menu.administrator.administrator'),
        '',
        ICONS.USER_EDIT,
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.administrator.news'),
        '',
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.administrator.instructions'),
        '',
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.administrator.tests'),
        '',
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.administrator.overviewUpdates'),
        '',
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.administrator.reportRawBankPayments'),
        '',
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.administrator.vacancies'),
        '',
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.administrator.professions'),
        '',
        '',
        '',
        '',
        '',
      ),
    ],
    // Модерация \/
    [
      new LeftDrawerMenuItem(
        i18n.global.t('menu.moderation.moderation'),
        '',
        ICONS.VALIDATION_CHECK,
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.moderation.files'),
        '',
        '',
        '',
        '',
      ),
      new LeftDrawerMenuItem(
        i18n.global.t('menu.moderation.reviews'),
        '',
        '',
        '',
        '',
      ),
    ],
  ]

<template>
  <q-list>
    <q-btn class="q-mx-sm mt-12" flat round>
      <ComponentIcon
        :color-stroke="getPaletteColor('dark')"
        :height="14"
        :name="ICONS.SETTING_MENU2"
        :width="14"
      >
        <IconSettingMenu2 />
      </ComponentIcon>
    </q-btn>
    <template v-for="(menuSection, i) in LEFT_DRAWER_MENU" :key="i">
      <DesktopDashboardLeftDrawerItemWithPopup
        v-if="menuSection.length > 1"
        class="q-mx-sm q-mt-sm"
        :menuSection="menuSection"
      />
      <DesktopDashboardLeftDrawerItem
        v-else
        class="q-mx-sm q-mt-sm"
        :menuSection="menuSection[0]"
      />
    </template>
  </q-list>
</template>

<script setup>
import { colors } from 'quasar'
import { inject } from 'vue'
import ComponentIcon from '@/components/ComponentIcon.vue'
import DesktopDashboardLeftDrawerItem from '@/desktop/components/layouts/dashboard/leftDrawer/DesktopDashboardLeftDrawerItem.vue'
import DesktopDashboardLeftDrawerItemWithPopup from '@/desktop/components/layouts/dashboard/leftDrawer/DesktopDashboardLeftDrawerItemWithPopup.vue'
import IconSettingMenu2 from '@/assets/icons/IconSettingMenu2.vue'

const { getPaletteColor } = colors
const ICONS = inject('ICONS')
const LEFT_DRAWER_MENU = inject('LEFT_DRAWER_MENU')

// export default {
//   name: 'DesktopLeftDrawerList',
//   components: {
//     ComponentIcon,
//     DesktopLeftDrawerItem,
//     DesktopLeftDrawerItemWithPopup,
//     IconSettingMenu2,
//   },
//   data() {
//     // Убрать это все из data - т.к. это все статическое. И перенести в provide(readonly(leftDrawerMenu))
//     return {
//       menuSections: [
//         // Заявки
//         [
//           new LeftDrawerMenuItem(
//             this.$t('menu.orders'),
//             '',
//             this.$ICON.NOTE_PAD_TEXT,
//             'orders',
//             '',
//           ),
//         ],
//         // Смены \/
//         [
//           new LeftDrawerMenuItem(
//             this.$t('menu.shifts.shifts'),
//             '',
//             this.$ICON.FILE_CLIPBOARD,
//             'shifts',
//             '',
//           ),
//           new LeftDrawerMenuItem(this.$t('menu.shifts.inWork'), '', '', '', ''),
//           new LeftDrawerMenuItem(
//             this.$t('menu.shifts.timeQuadrate'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.shifts.inPayment'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.shifts.archive'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.shifts.cancelled'),
//             '',
//             '',
//             '',
//             '',
//           ),
//         ],
//         // Клиенты \/
//         [
//           new LeftDrawerMenuItem(
//             this.$t('menu.customers.customers'),
//             '',
//             this.$ICON.USER_LOCKED,
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.customers.list'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.customers.billsInvoice'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.customers.reportAgent'),
//             '',
//             '',
//             '',
//             '',
//           ),
//         ],
//         // Работники
//         [
//           new LeftDrawerMenuItem(
//             this.$t('menu.workers'),
//             this.$ROUTE.WORKERS_INDEX,
//             this.$ICON.USER_FULL_BODY,
//             '',
//             '',
//           ),
//         ],
//         // Верификации
//         [
//           new LeftDrawerMenuItem(
//             this.$t('menu.verifications'),
//             '',
//             this.$ICON.USER_CHECK,
//             '',
//             '',
//           ),
//         ],
//         // Рекрутинг \/
//         [
//           new LeftDrawerMenuItem(
//             this.$t('menu.recruiting.recruiting'),
//             '',
//             this.$ICON.USER_ADD,
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.recruiting.all'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.recruiting.newRegistrations'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.recruiting.notProcessed'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.recruiting.inProcessOfRegistration'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.recruiting.becomeTaxPayer'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.recruiting.readyToWork'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.recruiting.activeWorkers'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.recruiting.failure'),
//             '',
//             '',
//             '',
//             '',
//           ),
//         ],
//         // Налоги самозанятых
//         [
//           new LeftDrawerMenuItem(
//             this.$t('menu.taxesSelfEmployed'),
//             '',
//             this.$ICON.MONEY_CASH_BILL1,
//             '',
//             '',
//           ),
//         ],
//         // Документы \/
//         [
//           new LeftDrawerMenuItem(
//             this.$t('menu.documents.documents'),
//             '',
//             this.$ICON.CONTENT_ARCHIVE_LOCKER,
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.documents.contractsWorkers'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.documents.mainContracts'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.documents.documentsAndActs'),
//             '',
//             '',
//             '',
//             '',
//           ),
//         ],
//         // Партнеры
//         [
//           new LeftDrawerMenuItem(
//             this.$t('menu.partners'),
//             '',
//             this.$ICON.SECURITY_SHIELD_PERSON,
//             '',
//             '',
//           ),
//         ],
//         // Пользователи \/
//         [
//           new LeftDrawerMenuItem(
//             this.$t('menu.users.users'),
//             '',
//             this.$ICON.USER_MULTIPLE,
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.users.operatorsCustomers'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.users.operatorsPartners'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.users.operatorsAll'),
//             '',
//             '',
//             '',
//             '',
//           ),
//         ],
//         // Администратор \/
//         [
//           new LeftDrawerMenuItem(
//             this.$t('menu.administrator.administrator'),
//             '',
//             this.$ICON.USER_EDIT,
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.administrator.news'),
//             '',
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.administrator.instructions'),
//             '',
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.administrator.tests'),
//             '',
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.administrator.overviewUpdates'),
//             '',
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.administrator.reportRawBankPayments'),
//             '',
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.administrator.vacancies'),
//             '',
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.administrator.professions'),
//             '',
//             '',
//             '',
//             '',
//             '',
//           ),
//         ],
//         // Модерация \/
//         [
//           new LeftDrawerMenuItem(
//             this.$t('menu.moderation.moderation'),
//             '',
//             this.$ICON.VALIDATION_CHECK,
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.moderation.files'),
//             '',
//             '',
//             '',
//             '',
//           ),
//           new LeftDrawerMenuItem(
//             this.$t('menu.moderation.reviews'),
//             '',
//             '',
//             '',
//             '',
//           ),
//         ],
//       ],
//     }
//   },
// }
</script>

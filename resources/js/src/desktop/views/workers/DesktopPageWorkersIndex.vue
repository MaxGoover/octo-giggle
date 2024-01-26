<template>
  <div>
    <!--Лоадер-->
    <q-inner-loading
      v-if="commonStore.isShowedLoader"
      showing
      :label="$t('loader.pleaseWait')"
    />

    <template v-else>
      <div class="row justify-between">
        <!--Заголовок-->
        <DesktopTitle :text="$t('title.workers')" />

        <div class="row justify-end">
          <!--Поиск-->
          <DesktopSearchTable
            class="workers-search"
            :placeholder="$t('search.byFioPhoneInn')"
          />

          <!--Добавить исполнителя-->
          <q-btn
            class="q-ml-md action-button action-button--primary"
            flat
            no-caps
          >
            <ComponentIcon
              :color-stroke="getPaletteColor('grey-1')"
              :height="16"
              :name="ICONS.USER_ADD"
              :width="16"
            >
              <IconUserAdd />
            </ComponentIcon>
            <span class="q-ml-sm">{{ $t('action.addWorker') }}</span>
          </q-btn>
        </div>
      </div>

      <!--Таблица-->
      <div class="q-mt-md">
        <DesktopWorkersTable
          class="bg-main-theme-bg"
          :columns="columns"
          :rows="[]"
        />
      </div>
    </template>
  </div>
</template>

<script setup>
import { colors } from 'quasar'
import { inject } from 'vue'
import { useCommonStore } from '@/stores/common'
import ComponentIcon from '@/components/ComponentIcon.vue'
import DesktopLayoutDashboard from '@/desktop/layouts/DesktopLayoutDashboard.vue'
import DesktopSearchTable from '@/desktop/components/common/DesktopSearchTable.vue'
import DesktopTitle from '@/desktop/components/common/DesktopTitle.vue'
import DesktopWorkersTable from '@/desktop/components/pages/workers/DesktopWorkersTable.vue'
import IconUserAdd from '@/assets/icons/IconUserAdd.vue'

defineOptions({
  layout: DesktopLayoutDashboard,
})

const { getPaletteColor } = colors
const ICONS = inject('ICONS')

const commonStore = useCommonStore()

// export default {
//   name: 'DesktopPageWorkersIndex',
//   components: {
//     ComponentIcon,
//     DesktopSearchTable,
//     DesktopTitle,
//     DesktopWorkersTable,
//     IconUserAdd,
//   },
//   data() {
//     return {
//       columns: [
//         {
//           align: 'left',
//           field: 'createdDate',
//           label: this.$t('column.dateRegistration'),
//           name: 'createdDate',
//           sortable: true,
//         },
//         {
//           align: 'left',
//           field: 'partner',
//           label: this.$t('column.partner'),
//           name: 'partner',
//           sortable: true,
//         },
//         {
//           align: 'left',
//           field: 'city',
//           label: this.$t('column.city'),
//           name: 'city',
//           sortable: true,
//         },
//       ],
//     }
//   },
//   computed: {
//     ...mapState(useCommonStore, ['isShowedLoader']),
//   },
// }
</script>

<style lang="sass" scoped>
.workers-search
  width: 432px
</style>

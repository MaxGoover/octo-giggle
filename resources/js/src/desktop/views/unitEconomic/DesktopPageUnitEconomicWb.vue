<template>
  <div>
    <!--Лоадер-->
    <q-inner-loading v-if="commonStore.isShowedLoader" showing :label="$t('loader.pleaseWait')" />

    <template v-else>
      <div class="row justify-between q-mt-sm">
        <!--Заголовок-->
        <DesktopTitle :text="$t('title.unitEconomic.wb')" />

        <div class="row justify-end">
          <!--Поиск-->
          <DesktopSearchTable class="workers-search" :placeholder="$t('search.byName')" />

          <!--Добавить работника-->
          <q-btn class="q-ml-md action-button action-button--primary" flat no-caps>
            <q-icon color="grey-1" name="mdi-package-variant-closed-plus" size="22px" />
            <span class="q-ml-sm">{{ $t('action.addProduct') }}</span>
          </q-btn>
        </div>
      </div>

      <!--Таблица-->
      <div class="q-mt-md">
        <DesktopUnitEconomicTable :columns="columns" :rows="[]" />
      </div>

      <!--Настройки таблицы-->
      <DesktopTableSettingsModal
        :filters="commonStore.tableFilters"
        :hideModal="commonStore.hideTableSettingsModal"
        :isShowed="commonStore.isShowedTableSettingsModal"
      />
    </template>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useCommonStore } from '@/stores/common'
import DesktopLayoutDashboard from '@/desktop/layouts/DesktopLayoutDashboard.vue'
import DesktopSearchTable from '@/desktop/components/common/DesktopSearchTable.vue'
import DesktopTableSettingsModal from '@/desktop/components/common/DesktopTableSettingsModal.vue'
import DesktopTitle from '@/desktop/components/common/DesktopTitle.vue'
import DesktopUnitEconomicTable from '@/desktop/components/pages/unitEconomic/DesktopUnitEconomicTable.vue'

defineOptions({
  layout: DesktopLayoutDashboard,
})

const commonStore = useCommonStore()

const columns = ref([
  {
    align: 'left',
    field: 'name',
    label: 'Название',
    name: 'name',
    sortable: true,
  },
  {
    align: 'center',
    field: 'strategy',
    label: 'Стратегия',
    name: 'strategy',
    sortable: true,
  },
  {
    align: 'center',
    field: 'remainder WB',
    label: 'Остаток WB, шт.',
    name: 'remainder WB',
    sortable: true,
  },
])
</script>

<style lang="sass" scoped>
.workers-search
  width: 432px
</style>

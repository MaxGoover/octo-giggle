<template>
  <q-table
    v-model:pagination="paginationStore.pagination"
    class="my-sticky-header-table products-table"
    flat
    row-key="id"
    separator="none"
    square
    table-class="cursor-pointer"
    :columns="columns"
    :loading="commonStore.isShowedTableLoader"
    :no-data-label="$t('table.noData.products')"
    :pagination-label="paginationLabel"
    :rows="rows"
    :rows-per-page-label="$t('table.rowsPerPage')"
  >
    <template #top>
      <!--Фильтры-->
      <DesktopFilterTable />

      <q-space />

      <!--Расширенные настройки фильтра-->
      <q-btn flat round @click="commonStore.showTableSettingsModal">
        <q-icon color="grey-6" name="mdi-cog-outline" size="20px" />
      </q-btn>
    </template>

    <!--Исполнитель-->
    <template #body-cell-worker>
      <q-td class="text-right"> asd </q-td>
    </template>

    <!--ИНН-->
    <template #body-cell-inn>
      <q-td class="text-right"> asd </q-td>
    </template>

    <!--Статус-->
    <template #body-cell-fnsStatus>
      <q-td class="text-right"> asd </q-td>
    </template>

    <!--В РР-->
    <template #body-cell-isConnectedPlatform>
      <q-td class="text-right"> asd </q-td>
    </template>

    <!--Договор подписан-->
    <template #body-cell-signedByWorker>
      <q-td class="text-right"> asd </q-td>
    </template>

    <!--Сумма всех платежей-->
    <template #body-cell-forAllTime>
      <q-td class="text-right"> asd </q-td>
    </template>

    <!--Сумма платежей за прошлый месяц-->
    <template #body-cell-partner>
      <q-td class="text-right"> asd </q-td>
    </template>

    <!--Сумма платежей за текущий месяц-->
    <template #body-cell-city>
      <q-td class="text-right"> asd </q-td>
    </template>

    <!--Дата регистрации-->
    <template #body-cell-createdDate>
      <q-td class="text-right"> asd </q-td>
    </template>
  </q-table>
</template>

<script setup>
import { paginationLabel } from '@/utils/helpers/table'
import { useCommonStore } from '@/stores/common'
import { usePaginationStore } from '@/stores/pagination'
import DesktopFilterTable from '@/desktop/components/common/DesktopFilterTable.vue'

defineProps({
  columns: {
    type: Array,
    required: true,
  },
  rows: {
    type: Array,
    required: true,
  },
})

const commonStore = useCommonStore()
const paginationStore = usePaginationStore()
</script>

<style lang="sass" scoped>
.products-table
  border-radius: 8px
  border: 1px solid $blue-grey-1
  box-shadow: 0px 0px 14px 0px #BCBCE64D
// шапка таблицы
:deep(thead tr th)
  background-color: $indigo-5
  color: white
</style>

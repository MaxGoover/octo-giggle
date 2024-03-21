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
          <DesktopSearchTable class="products-search" :placeholder="$t('search.byName')" />

          <!--Добавить товар-->
          <q-btn
            class="q-ml-md action-button action-button--primary"
            flat
            no-caps
            :title="$t('action.addProduct')"
          >
            <q-icon color="grey-1" name="mdi-package-variant-closed-plus" size="22px" />
            <span class="q-ml-sm">{{ $t('action.addProduct') }}</span>
          </q-btn>

          <!--Загрузить товары файлом-->
          <q-file
            v-model="productsStore.productsFile"
            class="q-ml-md products-uploader"
            accept=".csv"
            bg-color="green-5"
            color="grey-1"
            dense
            hide-bottom-space
            label-color="grey-1"
            no-error-icon
            ref="productsFile"
            standout
            :label="$t('action.uploadByFile')"
            :title="$t('action.uploadByFile')"
          >
            <template v-slot:prepend>
              <q-icon color="grey-1" name="mdi-file-upload-outline" size="22px" />
            </template>
            <template v-slot:append>
              <q-btn
                color="grey-1"
                dense
                flat
                icon="mdi-file-send-outline"
                :disabled="!productsStore.productsFile"
                :title="$t('action.sendFile')"
                @click="productsStore.uploadProductsFile($refs.productsFile.modelValue)"
              />
            </template>
          </q-file>
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
import { useProductsStore } from '@/stores/products'
import DesktopLayoutDashboard from '@/desktop/layouts/DesktopLayoutDashboard.vue'
import DesktopSearchTable from '@/desktop/components/common/DesktopSearchTable.vue'
import DesktopTableSettingsModal from '@/desktop/components/common/DesktopTableSettingsModal.vue'
import DesktopTitle from '@/desktop/components/common/DesktopTitle.vue'
import DesktopUnitEconomicTable from '@/desktop/components/pages/unitEconomic/DesktopUnitEconomicTable.vue'

defineOptions({
  layout: DesktopLayoutDashboard,
})

const commonStore = useCommonStore()
const productsStore = useProductsStore()

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
.products
  &-search
    width: 432px
  &-uploader
    width: 214px
// радиус поля загрузки файла
:deep(.q-field__native > div)
  color: $grey-1
// радиус поля загрузки файла
:deep(.q-field--standout .q-field__control)
  border-radius: 8px
// шрифт поля загрузки файлов
:deep(.q-file)
  font-family: Lato, sans-serif !important
</style>

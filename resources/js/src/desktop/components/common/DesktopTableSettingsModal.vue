<template>
  <q-dialog :model-value="isShowed" position="right" @hide="hideModal">
    <q-card class="full-height table-settings">
      <!--Кнопка "Закрыть"-->
      <q-btn class="q-pa-sm close-button" flat @click="hideModal">
        <q-icon color="grey-5" name="mdi-close" size="30px" />
      </q-btn>

      <!--Заголовок-->
      <div class="table-settings__title">
        <span>{{ $t('title.visibilityColumns') }}</span>
      </div>

      <!--Список фильтров-->
      <q-list class="q-mt-md">
        <q-item v-for="(filter, i) in filters" :key="i" class="q-pa-none">
          <q-item-section avatar>
            <q-checkbox v-model="selectedFilters[filter.id]" color="indigo-8" />
          </q-item-section>
          <q-item-section class="font-lato text-weight-medium-bold">
            <span class="text-text-primary">{{ filter.name }}</span>
          </q-item-section>
        </q-item>
      </q-list>
    </q-card>
  </q-dialog>
</template>

<script setup>
import { reactive } from 'vue'

defineProps({
  filters: Array,
  hideModal: Function,
  isShowed: Boolean,
})

const selectedFilters = reactive({
  1: false,
  2: false,
  3: false,
  4: false,
})
</script>

<style lang="sass" scoped>
.close-button
  position: absolute
  right: 16px
  top: 24px
.table-settings
  padding-left: 16px
  width: 300px

  &__title
    color: $grey-10
    font-family: Lato, sans-serif
    font-size: 16px
    font-weight: 300
    margin-left: 8px
    margin-top: 32px
</style>

<template>
  <q-btn
    v-for="(filter, key) in filters"
    :key="key"
    class="q-mr-sm filter-toggle"
    icon-right="mdi-chevron-down"
    dense
    no-caps
    outline
    rounded
    text-color="text-hover-c"
    :label="filter.name"
  />
</template>

<script setup>
import { ref } from 'vue'

defineProps({
  placeholder: {
    type: String,
    required: false,
  },
})

// const selectedFilter = ref(null)
const filters = ref([
  {
    id: 1,
    name: 'Название',
  },
  {
    id: 2,
    name: 'Стратегия',
  },
  {
    id: 3,
    name: 'Остаток WB, шт.',
  },
])
</script>

<style lang="sass" scoped>
.filter-toggle
  color: $indigo-3
  padding: 4px 8px 4px 14px
// .q-btn__content
// :deep(.q-btn::before)
//   border-color: $white !important
</style>

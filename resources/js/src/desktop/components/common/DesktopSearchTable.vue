<template>
  <q-input
    v-model="search"
    bg-color="white"
    clear-icon="mdi-close"
    clearable
    color="black"
    dense
    no-error-icon
    outlined
    rounded
    :debounce="CONFIG.debounce.search"
    :placeholder="placeholder"
  >
    <template #prepend>
      <ComponentIcon :height="16" :name="ICONS.SEARCH" :width="16">
        <IconSearch />
      </ComponentIcon>
    </template>
  </q-input>
</template>

<script setup>
import { inject, ref } from 'vue'
import ComponentIcon from '@/components/ComponentIcon.vue'
import IconSearch from '@/assets/icons/IconSearch.vue'

defineProps({
  placeholder: {
    type: String,
    required: false,
  },
})

const CONFIG = inject('CONFIG')
const ICONS = inject('ICONS')
const search = ref(null)

// export default {
//   name: 'DesktopSearchTable',
//   components: {
//     ComponentIcon,
//     IconSearch,
//   },
//   props: {
//     placeholder: {
//       type: String,
//       required: false,
//     },
//   },
//   data() {
//     return {
//       value: null,
//     }
//   },
//   emits: ['search'],
//   methods: {
//     ...mapActions(usePaginationStore, ['setPaginationSearch']),
//     search() {
//       this.setPaginationSearch(this.value)
//       this.$emit('search')
//     },
//   },
// }
</script>

<style lang="sass" scoped>
.title
  align-items: flex-start
  align-self: center
  display: flex

  &-text
    font-size: 36px
    font-weight: bold
// рамка
:deep(.q-field__control::before)
  border-color: white
// текст placeholder`a
:deep(.q-field__native)
  color: $grey-6
  font-family: Lato, sans-serif
  font-size: 12px
</style>

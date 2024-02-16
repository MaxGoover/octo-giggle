<template>
  <q-input
    v-model="search"
    bg-color="white"
    clear-icon="mdi-close"
    clearable
    color="blue-grey-1"
    dense
    label-color="grey-7"
    no-error-icon
    outlined
    rounded
    :debounce="CONFIG.debounce.search"
    :placeholder="placeholder"
  >
    <template #prepend>
      <q-icon color="grey-6" name="mdi-magnify" size="22px" />
    </template>
  </q-input>
</template>

<script setup>
import { inject, ref } from 'vue'

defineProps({
  placeholder: {
    type: String,
    required: false,
  },
})

const CONFIG = inject('CONFIG')
const search = ref(null)
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

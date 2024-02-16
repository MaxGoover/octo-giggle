<template>
  <q-btn
    color="bg-indigo-3"
    flat
    text-color="indigo-3"
    :icon="menuSection.icon"
    :title="menuSection.title"
    @click="router.get(menuSection.route)"
  />
</template>

<script setup>
import { router } from '@inertiajs/vue3'

defineProps({
  menuSection: {
    required: true,
    type: Object,
  },
})
</script>

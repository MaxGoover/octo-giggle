<template>
  <q-btn
    class="bg-blue-grey-1"
    flat
    text-color="indigo-3"
    :icon="menuSection[0].icon"
    :title="menuSection[0].title"
  >
    <q-menu anchor="top right" self="top left" :offset="[11, 3]">
      <q-list>
        <template v-for="(menuItem, index) in menuSection" :key="menuItem.title">
          <q-item
            v-if="index"
            class="bg-grey-1"
            clickable
            v-close-popup
            @click="router.get(menuItem.route)"
          >
            <q-item-section class="text-indigo-8 text-weight-regular font-lato">{{
              menuItem.title
            }}</q-item-section>
          </q-item>
        </template>
      </q-list>
    </q-menu>
  </q-btn>
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

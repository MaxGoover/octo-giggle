<template>
  <q-layout class="bg-grey-1" view="lhh lpr lFf">
    <DesktopAuthHeader />
    <q-page-container>
      <slot />
    </q-page-container>
    <DesktopAuthFooter class="bg-grey-1" />
  </q-layout>
</template>

<script setup>
import DesktopAuthFooter from '@/desktop/components/layouts/auth/DesktopAuthFooter.vue'
import DesktopAuthHeader from '@/desktop/components/layouts/auth/DesktopAuthHeader.vue'
</script>

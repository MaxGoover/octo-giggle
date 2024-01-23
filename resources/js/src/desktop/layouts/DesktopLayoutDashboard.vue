<template>
  <q-layout class="bg-grey-1" view="lhh lpr lFf">
    <DesktopDashboardHeader class="bg-grey-1" />
    <slot />
    <!-- <DesktopAuthFooter class="bg-grey-1" /> -->
  </q-layout>
</template>

<script setup>
// import DesktopAuthFooter from '@/desktop/components/layouts/auth/DesktopAuthFooter.vue'
import DesktopDashboardHeader from '@/desktop/components/layouts/dashboard/DesktopDashboardHeader.vue'
</script>

<template>
  <q-layout class="bg-grey-1" view="lhh lpr lFf">
    <DesktopDashboardHeader class="bg-grey-1" />
    <DesktopDashboardLeftDrawerMenu />
    <q-page-container>
      <slot />
    </q-page-container>
  </q-layout>
</template>

<script setup>
import DesktopDashboardHeader from '@/desktop/components/layouts/dashboard/header/DesktopDashboardHeader.vue'
import DesktopDashboardLeftDrawerMenu from '@/desktop/components/layouts/dashboard/leftDrawer/DesktopDashboardLeftDrawerMenu.vue'
</script>

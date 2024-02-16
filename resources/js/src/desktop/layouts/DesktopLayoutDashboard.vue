<template>
  <q-layout class="bg-grey-1" view="lhh lpr lFf">
    <DesktopDashboardHeaderBar class="bg-grey-1" />
    <DesktopDashboardLeftDrawerMenu />
    <q-page-container class="q-mx-sm window-height">
      <slot />
    </q-page-container>
  </q-layout>

  
</template>

<script setup>
import DesktopDashboardHeaderBar from '@/desktop/components/layouts/dashboard/header/DesktopDashboardHeaderBar.vue'
import DesktopDashboardLeftDrawerMenu from '@/desktop/components/layouts/dashboard/leftDrawer/DesktopDashboardLeftDrawerMenu.vue'
</script>

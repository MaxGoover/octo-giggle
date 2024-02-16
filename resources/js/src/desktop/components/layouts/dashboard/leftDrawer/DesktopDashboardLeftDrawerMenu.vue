<template>
  <q-drawer
    :model-value="true"
    class="bg-grey-1"
    mini
    :breakpoint="0"
    :mini-width="CONFIG.menu.leftDrawer.width.desktop"
  >
    <!--Список меню-->
    <DesktopDashboardLeftDrawerList />
  </q-drawer>
</template>

<script setup>
import { inject } from 'vue'
import DesktopDashboardLeftDrawerList from '@/desktop/components/layouts/dashboard/leftDrawer/DesktopDashboardLeftDrawerList.vue'

const CONFIG = inject('CONFIG')
</script>

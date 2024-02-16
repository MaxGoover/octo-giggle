<template>
  <q-list>
    <q-btn
      class="q-mx-sm q-my-md"
      flat
      icon="mdi-menu"
      text-color="dark"
      @click="router.get('/')"
    />
    <template v-for="(menuSection, i) in LEFT_DRAWER_MENU" :key="i">
      <DesktopDashboardLeftDrawerItemWithPopup
        v-if="menuSection.length > 1"
        class="q-mx-sm q-mt-sm"
        :menuSection="menuSection"
      />
      <DesktopDashboardLeftDrawerItem
        v-else
        class="q-mx-sm q-mt-sm"
        :menuSection="menuSection[0]"
      />
    </template>
  </q-list>
</template>

<script setup>
import { inject } from 'vue'
import { router } from '@inertiajs/vue3'
import DesktopDashboardLeftDrawerItem from '@/desktop/components/layouts/dashboard/leftDrawer/DesktopDashboardLeftDrawerItem.vue'
import DesktopDashboardLeftDrawerItemWithPopup from '@/desktop/components/layouts/dashboard/leftDrawer/DesktopDashboardLeftDrawerItemWithPopup.vue'

const LEFT_DRAWER_MENU = inject('LEFT_DRAWER_MENU')
</script>

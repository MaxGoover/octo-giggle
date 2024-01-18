<template>
  <q-layout class="bg-main-theme-bg" view="lhh lpr lFf">
    <DesktopAuthHeader />
    <slot />
    <DesktopAuthFooter class="bg-main-theme-bg" />
  </q-layout>
</template>

<script>
import DesktopAuthFooter from '@/desktop/components/layouts/auth/DesktopAuthFooter.vue'
import DesktopAuthHeader from '@/desktop/components/layouts/auth/DesktopAuthHeader.vue'

export default {
  name: 'DesktopLayoutAuth',
  components: {
    DesktopAuthFooter,
    DesktopAuthHeader,
  },
}
</script>

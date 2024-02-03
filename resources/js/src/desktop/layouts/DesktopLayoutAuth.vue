<template>
  <q-layout class="bg-grey-1" view="lhh lpr lFf">
    <DesktopAuthHeader />
    <q-page-container>
      <div class="auth-page">
        <DesktopAuthTitle />
        <DesktopAuthTypeToggle class="q-mb-lg" />
        <slot />
      </div>
    </q-page-container>
    <DesktopAuthFooter class="bg-grey-1" />
  </q-layout>
</template>

<script setup>
import { onMounted } from 'vue'
import { useAuthStore } from '@/stores/auth'
import DesktopAuthFooter from '@/desktop/components/layouts/auth/DesktopAuthFooter.vue'
import DesktopAuthHeader from '@/desktop/components/layouts/auth/DesktopAuthHeader.vue'
import DesktopAuthTitle from '@/desktop/components/layouts/auth/DesktopAuthTitle.vue'
import DesktopAuthTypeToggle from '@/desktop/components/layouts/auth/DesktopAuthTypeToggle.vue'

const authStore = useAuthStore()

onMounted(authStore.fetchCompanyCounters)
</script>

<style lang="sass" scoped>
.auth-page
  margin: 2vh auto 0 auto
  max-width: 380px

  @media only screen and (min-device-width: 1400px)
    margin-top: 10vh
</style>

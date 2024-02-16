<template>
  <q-header class="text-dark" reveal>
    <q-toolbar class="q-px-sm h-64">
      <ComponentIcon :height="28" :name="ICONS.LOGO" :width="28">
        <IconLogo2 />
      </ComponentIcon>

      <!--Баланс для оплаты-->
      <q-item class="q-pr-sm font-size-12">
        <q-item-section>
          <q-item-label>
            <span class="text-grey-9"
              >{{ $t('topToolbar.paymentBalance') }}:</span
            >
          </q-item-label>
          <q-item-label>
            <span class="text-grey-6"
              >{{ $t('topToolbar.commissionBalance') }}:</span
            >
          </q-item-label>
        </q-item-section>
      </q-item>
      <q-item class="q-pl-none font-size-12">
        <q-item-section>
          <q-item-label>
            <span class="text-weight-medium-bold">97000</span>
            <span class="q-ml-sm text-grey-9">₽</span>
          </q-item-label>
          <q-item-label class="text-grey-6">
            <span>3000</span>
            <span class="q-ml-sm">₽</span>
          </q-item-label>
        </q-item-section>
      </q-item>

      <!--Пополнить баланс-->
      <q-btn class="rounded-button action-button--secondary ml-32">
        <q-icon color="indigo-8" name="mdi-plus-circle" size="28px" />
        <span class="q-ml-sm">{{ $t('topToolbar.replenishBalance') }}</span>
      </q-btn>

      <q-space />

      <DesktopDashboardHeaderAccount />
    </q-toolbar>
  </q-header>
</template>

<script setup>
import { inject } from 'vue'
import ComponentIcon from '@/components/ComponentIcon.vue'
import DesktopDashboardHeaderAccount from '@/desktop/components/layouts/dashboard/header/DesktopDashboardHeaderAccount.vue'
import IconLogo2 from '@/assets/icons/IconLogo2.vue'

const ICONS = inject('ICONS')
</script>

<style lang="sass" scoped>
@import '@/css/buttons'
</style>

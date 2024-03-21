<template>
  <q-header class="text-dark" reveal>
    <q-toolbar class="q-px-sm h-64">
      <ComponentIcon class="company-logo2-icon" :height="28" :name="ICONS.LOGO" :width="88">
        <IconLogo2 />
      </ComponentIcon>

      <!--Баланс для оплаты-->
      <q-item class="q-pr-sm font-size-12">
        <q-item-section>
          <q-item-label>
            <span class="text-grey-9">{{ $t('topToolBar.paymentBalance') }}:</span>
          </q-item-label>
          <q-item-label>
            <span class="text-grey-6">{{ $t('topToolBar.commissionBalance') }}:</span>
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
        <span class="q-ml-sm">{{ $t('topToolBar.replenishBalance') }}</span>
      </q-btn>

      <q-space />

      <!--Уведомления-->
      <DesktopDashboardHeaderNotifications />

      <!--Аккаунт-->
      <DesktopDashboardHeaderAccount class="q-ml-md" />
    </q-toolbar>
  </q-header>
</template>

<script setup>
import { inject, onMounted } from 'vue'
import ComponentIcon from '@/components/ComponentIcon.vue'
import DesktopDashboardHeaderAccount from '@/desktop/components/layouts/dashboard/header/DesktopDashboardHeaderAccount.vue'
import DesktopDashboardHeaderNotifications from '@/desktop/components/layouts/dashboard/header/DesktopDashboardHeaderNotifications.vue';
import IconLogo2 from '@/assets/icons/IconLogo2.vue'

const ICONS = inject('ICONS')
</script>

<style lang="sass" scoped>
@import '@/css/buttons'
.company
  &-logo2
    &-icon
      background-color: #0D3585
      border-radius: 5px
      padding: 3px
      height: 28px
</style>

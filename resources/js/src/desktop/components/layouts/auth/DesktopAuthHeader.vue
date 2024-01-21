<template>
  <div class="auth-header">
    <q-item class="company-logo">
      <q-item-section avatar>
        <ComponentIcon
          class="company-logo-icon"
          :height="58"
          :name="ICONS.LOGO"
          :width="57"
        >
          <IconLogo />
        </ComponentIcon>
      </q-item-section>
      <q-item-section class="company-logo-text">
        <q-item-label class="company-logo-text__primary">
          <span>{{ $t('auth.logo.companyName') }}</span>
        </q-item-label>
        <q-item-label class="company-logo-text__secondary">
          <span>{{ $t('auth.logo.service') }}</span>
        </q-item-label>
      </q-item-section>
    </q-item>

    <q-item class="company-counters">
      <q-item-section class="company-counters-text">
        <q-item-label class="company-counters-text__primary">
          <span>342177</span>
        </q-item-label>
        <q-item-label class="company-counters-text__secondary">
          <span>исполнителей</span>
        </q-item-label>
      </q-item-section>
    </q-item>

    <q-item class="company-counters">
      <q-item-section class="company-counters-text">
        <q-item-label class="company-counters-text__primary">
          <span>2055</span>
        </q-item-label>
        <q-item-label class="company-counters-text__secondary">
          <span>заказчиков</span>
        </q-item-label>
      </q-item-section>
    </q-item>
  </div>
</template>

<script setup>
import { inject } from 'vue'
import ComponentIcon from '@/components/ComponentIcon.vue'
import IconLogo from '@/assets/icons/IconLogo.vue'

// global variables
const ICONS = inject('ICONS')
</script>

<style lang="sass" scoped>
@import '@/css/colors'
.auth-header
  background-color: $main-theme-bg
  display: flex
  flex-wrap: wrap
  padding-left: 2vw
  padding-top: 4vh
  width: 100%

  @media only screen and (min-device-width: 1400px)
    padding-left: 4vw
    padding-top: 7vh
.company
  &-logo
    &-text
      color: $text-primary

      &__primary
        font-size: 36px
        font-weight: 500
        line-height: 36px !important

      &__secondary
        font-size: 14px
        font-weight: 600
        line-height: 18px !important

  &-counters
    margin-left: 16px

    &-text
      color: $text-secondary

      &__primary
        font-size: 28px
        font-weight: 500
        line-height: 32px !important
        margin-top: 4px

      &__secondary
        font-size: 12px
        font-weight: 400
        line-height: 18px !important
</style>

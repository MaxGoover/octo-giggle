<template>
  <div class="auth-header">
    <q-item class="company-logo">
      <q-item-section avatar>
        <ComponentIcon class="company-logo-icon" :height="48" :name="ICONS.LOGO" :width="152">
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
  </div>
</template>

<script setup>
import { inject } from 'vue'
import ComponentIcon from '@/components/ComponentIcon.vue'
import IconLogo from '@/assets/icons/IconLogo.vue'

const ICONS = inject('ICONS')
</script>

<style lang="sass" scoped>
.auth-header
  background-color: $grey-1
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
    &-icon
      background-color: #0D3585
      border-radius: 5px
      padding: 10px
      height: 58px

    &-text
      color: $grey-9

      &__primary
        font-size: 36px
        font-weight: 500
        line-height: 36px !important

      &__secondary
        font-size: 14px
        font-weight: 600
        line-height: 18px !important
</style>

<template>
  <div class="auth-header">
    <q-item class="company">
      <q-item-section avatar>
        <ComponentIcon
          class="company-logo"
          :height="57"
          :name="$ICON.LOGO2"
          :width="57"
        >
          <IconLogo2 />
        </ComponentIcon>
      </q-item-section>
      <q-item-section class="company-text">
        <q-item-label class="company-text__primary">
          <span>{{ $t('auth.logo.companyName') }}</span>
        </q-item-label>
        <q-item-label class="company-text__secondary">
          <span>{{ $t('auth.logo.service') }}</span>
        </q-item-label>
      </q-item-section>
    </q-item>
  </div>
</template>

<script>
import ComponentIcon from 'src/common/ComponentIcon'
import IconLogo2 from 'assets/icons/IconLogo2'

export default {
  name: 'DesktopAuthHeader',
  components: {
    ComponentIcon,
    IconLogo2,
  },
}
</script>

<style lang="sass" scoped>
@import 'src/css/common/colors'
.auth-header
  background-color: $main-theme-bg
  display: flex
  flex-wrap: wrap
  justify-content: space-between
  position: absolute
  width: 100%
.company
  margin-left: 5vw
  margin-top: 3vh

  &-text
    color: $accent-font

    &__primary
      font-size: 36px
      font-weight: 500
      line-height: 36px !important

    &__secondary
      font-size: 14px
      font-weight: 600
      line-height: 18px !important
</style>

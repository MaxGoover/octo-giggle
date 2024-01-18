<template>
  <div class="auth-sign-in">
    <div class="text-text-primary font-size-36">
      <span class="text-bold">CRM</span>
      <span class="q-ml-sm text-weight-regular">{{
        $t('auth.signIn.title')
      }}</span>
    </div>
    <div class="row q-mt-xs">
      <div
        class="auth-toggle-text"
        :class="{ 'text-grey-dark': !isAuthTypeBySms }"
      >
        <span>{{ $t('auth.signIn.enterBySms') }}</span>
      </div>
      <q-toggle
        v-model="authType"
        class="q-px-md"
        color="hover-c"
        keep-color
        :true-value="$AUTH.ENTER_BY_SMS"
        :false-value="$AUTH.ENTER_BY_PASSWORD"
        @update:model-value="setStep"
      />
      <div
        class="auth-toggle-text"
        :class="{ 'text-grey-dark': isAuthTypeBySms }"
      >
        <span>{{ $t('auth.signIn.enterByPassword') }}</span>
      </div>
    </div>
    <q-carousel
      v-model="step"
      class="q-mt-xl bg-main-theme-bg"
      animated
      infinite
      navigation
    >
      <q-carousel-slide :name="$AUTH.ENTER_BY_SMS">
        <DesktopAuthSignInBySmsForm />
      </q-carousel-slide>
      <q-carousel-slide :name="$AUTH.CONFIRM_SMS">
        <DesktopAuthSignInBySmsConfirm />
      </q-carousel-slide>
      <q-carousel-slide :name="$AUTH.ENTER_BY_PASSWORD">
        <DesktopAuthSignInByPasswordForm />
      </q-carousel-slide>
    </q-carousel>
  </div>
</template>

<script>
import { mapActions, mapWritableState } from 'pinia'
import { useAuthStore } from '@/stores/auth'
import DesktopAuthSignInByPasswordForm from '@/desktop/components/pages/auth/DesktopAuthSignInByPasswordForm.vue'
import DesktopAuthSignInBySmsConfirm from '@/desktop/components/pages/auth/bySms/DesktopAuthSignInBySmsConfirm.vue'
import DesktopAuthSignInBySmsForm from '@/desktop/components/pages/auth/bySms/DesktopAuthSignInBySmsForm.vue'
import DesktopLayoutAuth from '@/desktop/layouts/DesktopLayoutAuth.vue'

export default {
  name: 'DesktopPageAuth',
  components: {
    DesktopAuthSignInByPasswordForm,
    DesktopAuthSignInBySmsConfirm,
    DesktopAuthSignInBySmsForm,
  },
  layout: DesktopLayoutAuth,
  computed: {
    ...mapWritableState(useAuthStore, ['authType', 'step']),
    isAuthTypeBySms() {
      return [this.$AUTH.ENTER_BY_SMS, this.$AUTH.CONFIRM_SMS].includes(
        this.step,
      )
    },
  },
//   mounted() {
//     this.fetchCompanyCounters()
//   },
  methods: {
    // ...mapActions(useAuthStore, ['fetchCompanyCounters', 'setStep']),
    ...mapActions(useAuthStore, ['setStep']),
  },
}
</script>

<style lang="sass" scoped>
@import '@/css/colors'
.auth-sign-in
  margin-top: 20vh
  max-width: 380px
  position: absolute

  @media only screen and (min-device-width: 1400px)
    margin-top: 25vh
.auth-toggle-text
  align-items: center
  color: $grey-darkest
  display: flex
  font-family: Lato, sans-serif
  font-weight: 600
.q-toggle
  transform: rotate(180deg)
// цвет "пальца" тумблера
:deep(.q-toggle__inner--falsy.text-hover-c > .q-toggle__thumb::after)
  background-color: $hover-c
// цвет "дорожки" тумблера
:deep(.q-toggle__inner--falsy.text-hover-c > .q-toggle__track)
  background-color: $hover-c
// убираем у карусели дефолтные padding`и
:deep(.q-carousel__slide)
  padding: 0
</style>

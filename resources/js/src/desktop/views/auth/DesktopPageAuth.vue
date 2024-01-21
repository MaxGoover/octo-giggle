<template>
  <div class="auth-page">
    <!--Заголовок-->
    <div class="text-text-primary font-size-36">
      <span class="text-bold">CRM</span>
      <span class="q-ml-sm text-weight-regular">{{ $t('auth.title') }}</span>
    </div>

    <!--Выбор типа авторизации-->
    <div class="row q-mt-lg">
      <div
        class="auth-toggle-text"
        :class="{ 'text-grey-dark': !isStepAuthTypeBySms }"
      >
        <span>{{ $t('auth.enterBySms') }}</span>
      </div>
      <q-toggle
        v-model="authType"
        class="q-px-md"
        color="hover-c"
        keep-color
        :true-value="AUTH.TYPE_ENTER_BY_SMS"
        :false-value="AUTH.TYPE_ENTER_BY_PASSWORD"
        @update:model-value="authStore.toggleAuthType"
      />
      <div
        class="auth-toggle-text"
        :class="{ 'text-grey-dark': isStepAuthTypeBySms }"
      >
        <span>{{ $t('auth.enterByPassword') }}</span>
      </div>
    </div>

    <!--Форма авторизации-->
    <q-carousel
      :model-value="authStore.step"
      class="q-mt-lg bg-main-theme-bg"
      animated
      infinite
      navigation
    >
      <q-carousel-slide :name="AUTH.STEP_BY_SMS_FORM">
        <DesktopAuthBySmsForm />
      </q-carousel-slide>
      <q-carousel-slide :name="AUTH.STEP_BY_SMS_CONFIRM">
        <DesktopAuthBySmsConfirm />
      </q-carousel-slide>
      <q-carousel-slide :name="AUTH.STEP_BY_PASSWORD_FORM">
        <DesktopAuthByPasswordForm />
      </q-carousel-slide>
    </q-carousel>
  </div>
</template>

<script setup>
import { computed, inject, onMounted, watch } from 'vue'
import { storeToRefs } from 'pinia'
import { useAuthStore } from '@/stores/auth'
import DesktopAuthByPasswordForm from '@/desktop/components/pages/auth/DesktopAuthByPasswordForm.vue'
import DesktopAuthBySmsConfirm from '@/desktop/components/pages/auth/bySms/DesktopAuthBySmsConfirm.vue'
import DesktopAuthBySmsForm from '@/desktop/components/pages/auth/bySms/DesktopAuthBySmsForm.vue'
import DesktopLayoutAuth from '@/desktop/layouts/DesktopLayoutAuth.vue'

defineOptions({
  layout: DesktopLayoutAuth,
})

// global variables
const AUTH = inject('AUTH')

const authStore = useAuthStore()
const { authType } = storeToRefs(authStore)

// computed
const isStepAuthTypeBySms = computed(() => {
  return [AUTH.STEP_BY_SMS_FORM, AUTH.STEP_BY_SMS_CONFIRM].includes(
    authStore.step,
  )
})

// mounted()
onMounted(authStore.fetchCompanyCounters)

// methods
const isAuthTypeBySms = (type) => type === AUTH.TYPE_ENTER_BY_SMS
const isAuthTypeByPassword = (type) => type === AUTH.TYPE_ENTER_BY_PASSWORD

// watch
watch(authType, (type) => {
  if (isAuthTypeBySms(type)) {
    authStore.setStep(AUTH.STEP_BY_SMS_FORM)
  }
  if (isAuthTypeByPassword(type)) {
    authStore.setStep(AUTH.STEP_BY_PASSWORD_FORM)
  }
})
</script>

<style lang="sass" scoped>
@import '@/css/colors'
.auth-page
  margin: 2vh auto 0 auto
  max-width: 380px

  @media only screen and (min-device-width: 1400px)
    margin-top: 10vh
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

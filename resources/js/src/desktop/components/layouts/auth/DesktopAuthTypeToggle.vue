<template>
  <!--Выбор типа авторизации-->
  <div class="row q-mt-lg">
    <div class="auth-toggle-text" :class="{ 'text-grey-7': !isStepAuthTypeBySms }">
      <span>{{ $t('auth.enterBySms') }}</span>
    </div>
    <q-toggle
      v-model="authType"
      class="q-px-md"
      color="indigo-3"
      keep-color
      :true-value="AUTH.TYPE.BY_SMS"
      :false-value="AUTH.TYPE.BY_PASSWORD"
    />
    <div class="auth-toggle-text" :class="{ 'text-grey-7': isStepAuthTypeBySms }">
      <span>{{ $t('auth.enterByPassword') }}</span>
    </div>
  </div>
</template>

<script setup>
import { computed, inject, watch } from 'vue'
import { router } from '@inertiajs/vue3'
import { storeToRefs } from 'pinia'
import { useAuthStore } from '@/stores/auth'

const authStore = useAuthStore()
const { authType } = storeToRefs(authStore)

const AUTH = inject('AUTH')
const ROUTES = inject('ROUTES')

const isStepAuthTypeBySms = computed(() => {
  return [AUTH.STEP.BY_SMS_FORM, AUTH.STEP.BY_SMS_CONFIRM].includes(authStore.step)
})

const isAuthTypeBySms = (type) => type === AUTH.TYPE.BY_SMS
const isAuthTypeByPassword = (type) => type === AUTH.TYPE.BY_PASSWORD

watch(authType, (type) => {
  if (isAuthTypeBySms(type)) {
    router.get(ROUTES.AUTH.BY_SMS_FORM)
  }
  if (isAuthTypeByPassword(type)) {
    router.get(ROUTES.AUTH.BY_PASSWORD_FORM)
  }
})
</script>

<style lang="sass" scoped>
.auth-toggle-text
  align-items: center
  color: $grey-10
  display: flex
  font-family: Lato, sans-serif
  font-weight: 600
.q-toggle
  transform: rotate(180deg)
// цвет "пальца" тумблера
:deep(.q-toggle__inner--falsy.text-indigo-3 > .q-toggle__thumb::after)
  background-color: $indigo-3
// цвет "дорожки" тумблера
:deep(.q-toggle__inner--falsy.text-indigo-3 > .q-toggle__track)
  background-color: $indigo-3
</style>

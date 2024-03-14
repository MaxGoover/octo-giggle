<template>
  <div class="row">
    <!--Электронная почта-->
    <q-input
      v-model="authStore.email"
      class="col-12"
      bg-color="white"
      clear-icon="close"
      clearable
      color="blue-grey-1"
      label-color="grey-7"
      no-error-icon
      outlined
      :label="$t('field.email')"
      :title="$t('field.email')"
    />

    <!--Принятие соглашений-->
    <div class="col-12 auth__agree-conditions">
      <i18n-t keypath="auth.agreeConditions" tag="p" scope="global">
        <template #linkUserAgreement>
          <a
            :href="CONFIG.auth.link.userAgreement"
            class="text-indigo-12 text-decoration-none"
            target="_blank"
            >{{ $t('auth.doc.userAgreement') }}</a
          >
        </template>
        <template #linkPrivacyPolicy>
          <a
            :href="CONFIG.auth.link.privacyPolicy"
            class="text-indigo-12 text-decoration-none"
            target="_blank"
            >{{ $t('auth.doc.privacyPolicy') }}</a
          >
        </template>
      </i18n-t>
    </div>

    <!--Получить код-->
    <div class="col-12 mt-40">
      <q-btn
        class="full-width h-56 action-button action-button--primary"
        @click="authStore.fetchEmailCode"
      >
        <span>{{ $t('action.receiveCode') }}</span>
      </q-btn>
    </div>
  </div>
</template>

<script setup>
import { inject, onMounted } from 'vue'
import { useAuthStore } from '@/stores/auth'
import DesktopLayoutAuth from '@/desktop/layouts/DesktopLayoutAuth.vue'

defineOptions({
  layout: DesktopLayoutAuth,
})

const authStore = useAuthStore()

const AUTH = inject('AUTH')
const CONFIG = inject('CONFIG')

onMounted(() => {
  authStore.setAuthType(AUTH.TYPE.BY_EMAIL)
  authStore.setStep(AUTH.STEP.BY_EMAIL_FORM)
})
</script>

<style lang="sass" scoped>
.auth
  &__agree-conditions
    font-size: 16px
    font-weight: 400
    margin-top: 24px
</style>

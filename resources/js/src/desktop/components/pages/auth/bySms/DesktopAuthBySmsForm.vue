<template>
  <div class="row">
    <!--Номер телефона-->
    <q-input
      v-model="phone"
      class="col-12"
      bg-color="white"
      clear-icon="close"
      clearable
      color="blue-grey-1"
      label-color="grey-7"
      no-error-icon
      outlined
      type="tel"
      :mask="VALIDATION.phone.formatted.mask"
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
        @click="authStore.setStep(AUTH.STEP_BY_SMS_CONFIRM)"
      >
        <span>{{ $t('action.receiveCode') }}</span>
      </q-btn>
    </div>
  </div>
</template>

<script setup>
import { inject, ref } from 'vue'
import { useAuthStore } from '@/stores/auth'

const AUTH = inject('AUTH')
const CONFIG = inject('CONFIG')
const VALIDATION = inject('VALIDATION')

const authStore = useAuthStore()

const phone = ref('+7 (903) 261-93-16')
</script>

<style lang="sass" scoped>
.auth
  &__agree-conditions
    font-size: 16px
    font-weight: 400
    margin-top: 24px
</style>

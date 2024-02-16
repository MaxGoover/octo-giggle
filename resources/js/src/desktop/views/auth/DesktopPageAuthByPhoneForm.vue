<template>
  <div class="row">
    <!--Номер телефона-->
    <q-input
      v-model="authStore.phoneFormatted"
      class="col-12"
      bg-color="white"
      clear-icon="close"
      clearable
      color="primary"
      label-color="grey-7"
      no-error-icon
      outlined
      type="tel"
      :label="$t('field.phone')"
      :mask="VALIDATION.phone.formatted.mask"
      :title="$t('field.phone')"
    />

    <!--Пароль-->
    <q-input
      v-model="authStore.password"
      class="col-12 q-mt-md"
      bg-color="white"
      clear-icon="close"
      color="primary"
      label-color="grey-7"
      no-error-icon
      outlined
      :type="passwordFieldType"
      :label="$t('field.password')"
      :title="$t('field.password')"
    >
      <template v-slot:append>
        <q-icon class="cursor-pointer" :name="passwordToggleShowIcon" @click="toggleShowPassword" />
      </template>
    </q-input>

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

    <!--Войти в систему-->
    <div class="col-12 q-mt-xs">
      <q-btn
        class="full-width h-56 action-button action-button--primary"
        @click="authStore.signInByPhone"
      >
        <span>{{ $t('action.enterSystem') }}</span>
      </q-btn>
    </div>
  </div>
</template>

<script setup>
import { computed, inject, onMounted, ref } from 'vue'
import { useAuthStore } from '@/stores/auth'
import DesktopLayoutAuth from '@/desktop/layouts/DesktopLayoutAuth.vue'

defineOptions({
  layout: DesktopLayoutAuth,
})

const authStore = useAuthStore()

const AUTH = inject('AUTH')
const CONFIG = inject('CONFIG')
const ICONS = inject('ICONS')
const VALIDATION = inject('VALIDATION')

const isShowedPassword = ref(false)

const passwordFieldType = computed(() => (isShowedPassword.value ? 'text' : 'password'))
const passwordToggleShowIcon = computed(() =>
  isShowedPassword.value ? ICONS.VISIBILITY : ICONS.VISIBILITY_OFF,
)

const toggleShowPassword = () => {
  isShowedPassword.value = !isShowedPassword.value
}

onMounted(() => {
  authStore.setAuthType(AUTH.TYPE.BY_PHONE)
  authStore.setStep(AUTH.STEP.BY_PHONE_FORM)
})
</script>

<style lang="sass" scoped>
.auth
  &__agree-conditions
    font-size: 16px
    font-weight: 400
    margin-top: 24px
</style>

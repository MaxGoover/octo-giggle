<template>
  <div class="row">
    <!--Логин (номер телефона)-->
    <q-input
      v-model="phone"
      class="col-12"
      bg-color="white"
      clear-icon="close"
      clearable
      color="main-theme"
      label-color="grey-dark"
      no-error-icon
      outlined
      type="tel"
      :label="$t('field.loginPhoneNumber')"
      :mask="VALIDATION.phone.formatted.mask"
      :title="$t('field.loginPhoneNumber')"
    />

    <!--Пароль-->
    <q-input
      v-model="password"
      class="col-12 q-mt-md"
      bg-color="white"
      clear-icon="close"
      color="main-theme"
      label-color="grey-dark"
      no-error-icon
      outlined
      :type="passwordFieldType"
      :label="$t('field.password')"
      :title="$t('field.password')"
    >
      <template v-slot:append>
        <q-icon
          class="cursor-pointer"
          :name="passwordToggleShowIcon"
          @click="toggleShowPassword"
        />
      </template>
    </q-input>

    <!--Принятие соглашений-->
    <div class="col-12 auth__agree-conditions">
      <i18n-t keypath="auth.agreeConditions" tag="p" scope="global">
        <template #linkUserAgreement>
          <a
            :href="CONFIG.auth.link.userAgreement"
            class="text-text-link text-decoration-none"
            target="_blank"
            >{{ $t('auth.doc.userAgreement') }}</a
          >
        </template>
        <template #linkPrivacyPolicy>
          <a
            :href="CONFIG.auth.link.privacyPolicy"
            class="text-text-link text-decoration-none"
            target="_blank"
            >{{ $t('auth.doc.privacyPolicy') }}</a
          >
        </template>
      </i18n-t>
    </div>

    <!--Войти в систему-->
    <div class="col-12 q-mt-xs">
      <q-btn class="full-width action-button action-button--primary">
        <span>{{ $t('action.enterSystem') }}</span>
      </q-btn>
    </div>
  </div>
</template>

<script setup>
import { computed, inject, ref } from 'vue'

const CONFIG = inject('CONFIG')
const ICONS = inject('ICONS')
const VALIDATION = inject('VALIDATION')

const isShowedPassword = ref(false)
const password = ref('')
const phone = ref('')

const passwordFieldType = computed(() =>
  isShowedPassword ? 'text' : 'password',
)
const passwordToggleShowIcon = computed(() =>
  isShowedPassword ? ICONS.VISIBILITY : ICONS.VISIBILITY_OFF,
)

const toggleShowPassword = () => {
  isShowedPassword = !isShowedPassword
}
</script>

<style lang="sass" scoped>
.auth
  &__agree-conditions
    font-size: 16px
    font-weight: 400
    margin-top: 24px
</style>

<template>
  <div class="row">
    <!--Номер телефона-->
    <q-input
      v-model="phone"
      class="col-12"
      bg-color="white"
      clear-icon="close"
      clearable
      color="default-bg"
      label-color="grey-dark"
      no-error-icon
      outlined
      type="tel"
      :mask="$VALIDATION.phone.formatted.mask"
    />

    <!--Принятие соглашений-->
    <div class="col-12 auth__agree-conditions">
      <i18n-t keypath="auth.agreeConditions" tag="p" scope="global">
        <template #linkUserAgreement>
          <a
            :href="$CONFIG.auth.link.userAgreement"
            class="text-text-link text-decoration-none"
            target="_blank"
            >{{ $t('auth.doc.userAgreement') }}</a
          >
        </template>
        <template #linkPrivacyPolicy>
          <a
            :href="$CONFIG.auth.link.privacyPolicy"
            class="text-text-link text-decoration-none"
            target="_blank"
            >{{ $t('auth.doc.privacyPolicy') }}</a
          >
        </template>
      </i18n-t>
    </div>

    <!--Получить код-->
    <div class="col-12 margin-top-32">
      <q-btn
        class="full-width action-button action-button--active"
        @click="setStep($AUTH.CONFIRM_SMS)"
      >
        <span>{{ $t('action.receiveCode') }}</span>
      </q-btn>
    </div>
  </div>
</template>

<script>
import { mapActions } from 'pinia'
import { useAuthStore } from '@/stores/auth'

export default {
  name: 'DesktopAuthSignInBySmsForm',
  data() {
    return {
      phone: '+7 (903) 261-93-16',
    }
  },
  methods: {
    ...mapActions(useAuthStore, ['setStep']),
  },
}
</script>

<style lang="sass" scoped>
.auth
  &__agree-conditions
    font-size: 16px
    font-weight: 400
    margin-top: 24px
</style>

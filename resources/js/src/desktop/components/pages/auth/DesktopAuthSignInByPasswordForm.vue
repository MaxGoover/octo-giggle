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
      :mask="$validation.phone.formatted.mask"
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
      :type="typeFieldPassword"
      :label="$t('field.password')"
      :title="$t('field.password')"
    >
      <template v-slot:append>
        <q-icon
          class="cursor-pointer"
          :name="iconToggleShowPassword"
          @click="toggleShowPassword"
        />
      </template>
    </q-input>

    <!--Принятие соглашений-->
    <div class="col-12 auth__agree-conditions">
      <i18n-t keypath="auth.agreeConditions" tag="p" scope="global">
        <template #linkUserAgreement>
          <a
            :href="$config.auth.link.userAgreement"
            class="text-text-link text-decoration-none"
            target="_blank"
            >{{ $t('auth.doc.userAgreement') }}</a
          >
        </template>
        <template #linkPrivacyPolicy>
          <a
            :href="$config.auth.link.privacyPolicy"
            class="text-text-link text-decoration-none"
            target="_blank"
            >{{ $t('auth.doc.privacyPolicy') }}</a
          >
        </template>
      </i18n-t>
    </div>

    <!---->
    <div class="col-12 margin-top-32">
      <q-btn class="full-width action-button action-button--primary">
        <span>{{ $t('action.enterSystem') }}</span>
      </q-btn>
    </div>
  </div>
</template>

<script>
export default {
  name: 'DesktopAuthSignInByPasswordForm',
  data() {
    return {
      isShowedPassword: false,
      password: '',
      phone: '',
    }
  },
  computed: {
    iconToggleShowPassword() {
      return this.isShowedPassword
        ? this.$ICON.VISIBILITY
        : this.$ICON.VISIBILITY_OFF
    },
    typeFieldPassword() {
      return this.isShowedPassword ? 'text' : 'password'
    },
  },
  methods: {
    toggleShowPassword() {
      this.isShowedPassword = !this.isShowedPassword
    },
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

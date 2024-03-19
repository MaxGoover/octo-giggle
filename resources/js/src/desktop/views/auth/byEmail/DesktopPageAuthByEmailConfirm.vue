<template>
  <div class="row">
    <!--Код подтверждения-->
    <q-input
      v-model="emailCode.code"
      class="col-12"
      bg-color="white"
      clear-icon="close"
      clearable
      color="blue-grey-1"
      label-color="grey-7"
      no-error-icon
      outlined
      :label="$t('field.codeConfirm')"
      :title="$t('field.codeConfirm')"
    />

    <!--Принятие соглашений-->
    <div class="col-12 auth__agree-conditions">
      <p>
        {{
          $t('auth.sentEmailCode', {
            email: authStore.email,
          })
        }}
      </p>
    </div>

    <!--Выслать код повторно-->
    <q-btn
      class="q-mt-sm full-width h-56 action-button action-button--secondary"
      icon="mdi-sync"
      :disable="!timer.isTimeUp.value"
      :label="
        $t('auth.mightRepeatAfter', {
          timerMinutes: timer.minutes.value,
          timerSeconds: timer.seconds.value,
        })
      "
      :title="$t('auth.sendCodeAgain')"
      @click="authStore.fetchEmailCode"
    />

    <!--Войти в систему-->
    <div class="col-12 q-mt-lg">
      <q-btn
        class="full-width h-56 action-button action-button--primary"
        @click="authStore.signInByEmailCode"
      >
        <span>{{ $t('action.enterSystem') }}</span>
      </q-btn>
    </div>
  </div>
</template>

<script setup>
import { colors } from 'quasar'
import { inject } from 'vue'
import { storeToRefs } from 'pinia'
import { useAuthStore } from '@/stores/auth'
import DesktopLayoutAuth from '@/desktop/layouts/DesktopLayoutAuth.vue'
import useTimerCountdown from '@/composables/useTimerCountdown'

defineOptions({
  layout: DesktopLayoutAuth,
})

const authStore = useAuthStore()
const { emailCode, emailCodeTimeout } = storeToRefs(authStore)

const ICONS = inject('ICONS')
const { getPaletteColor } = colors

const timer = useTimerCountdown(emailCodeTimeout)
</script>

<style lang="sass" scoped>
.auth
  &__agree-conditions
    font-size: 16px
    font-weight: 400
    margin-top: 24px
</style>

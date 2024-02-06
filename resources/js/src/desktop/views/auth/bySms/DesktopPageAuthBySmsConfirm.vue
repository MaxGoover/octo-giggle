<template>
  <div class="row">
    <!--Смс-код-->
    <q-input
      v-model="smsCode"
      class="col-12"
      bg-color="white"
      clear-icon="close"
      clearable
      color="blue-grey-1"
      label-color="grey-7"
      no-error-icon
      outlined
      :label="$t('field.smsCode')"
      :title="$t('field.smsCode')"
    />

    <!--Принятие соглашений-->
    <div class="col-12 auth__agree-conditions">
      <p>
        {{
          $t('auth.sentMessageToPhone', {
            phoneFormatted: authStore.phoneFormatted,
          })
        }}
      </p>
    </div>

    <!--Выслать код повторно-->
    <q-btn
      class="q-mt-sm full-width h-56 action-button action-button--secondary"
      :disable="!timer.isTimeUp.value"
      @click="authStore.fetchSmsCode"
    >
      <ComponentIcon
        class="q-mr-md"
        :color-stroke="getPaletteColor('primary')"
        :height="24"
        :name="ICONS.ARROWS_SYNCHRONIZE"
        :width="24"
      >
        <IconArrowsSynchronize />
      </ComponentIcon>
      <span>{{
        $t('auth.mightRepeatAfter', {
          timerMinutes: timer.minutes.value,
          timerSeconds: timer.seconds.value,
        })
      }}</span>
    </q-btn>

    <!--Войти в систему-->
    <div class="col-12 q-mt-lg">
      <q-btn class="full-width h-56 action-button action-button--primary" @click="authStore.authBySms">
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
import ComponentIcon from '@/components/ComponentIcon.vue'
import DesktopLayoutAuth from '@/desktop/layouts/DesktopLayoutAuth.vue'
import IconArrowsSynchronize from '@/assets/icons/IconArrowsSynchronize.vue'
import useTimerCountdown from '@/composables/useTimerCountdown'

defineOptions({
  layout: DesktopLayoutAuth,
})

const authStore = useAuthStore()
const { smsCode, smsCodeTimeout } = storeToRefs(authStore)

const ICONS = inject('ICONS')

const { getPaletteColor } = colors

const timer = useTimerCountdown(smsCodeTimeout)
</script>

<style lang="sass" scoped>
.auth
  &__agree-conditions
    font-size: 16px
    font-weight: 400
    margin-top: 24px
</style>

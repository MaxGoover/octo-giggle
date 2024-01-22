<template>
  <div class="row">
    <!--Номер телефона-->
    <q-input
      v-model="smsCode"
      class="col-12"
      bg-color="white"
      clear-icon="close"
      clearable
      color="default-bg"
      label-color="grey-dark"
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
            phoneFormatted,
          })
        }}
      </p>
    </div>

    <!--Выслать код повторно-->
    <q-btn
      class="q-mt-sm full-width action-button action-button--secondary"
      :disable="!timer.isTimeUp.value"
    >
      <ComponentIcon
        class="q-mr-md"
        :color-stroke="COLORS.MAIN_THEME"
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
      <q-btn class="full-width action-button action-button--active">
        <span>{{ $t('action.enterSystem') }}</span>
      </q-btn>
    </div>
  </div>
</template>

<script setup>
import { inject, ref } from 'vue'
import ComponentIcon from '@/components/ComponentIcon.vue'
import IconArrowsSynchronize from '@/assets/icons/IconArrowsSynchronize.vue'
import useTimerCountdown from '@/composables/useTimerCountdown'

const COLORS = inject('COLORS')
const CONFIG = inject('CONFIG')
const ICONS = inject('ICONS')

const phoneFormatted = ref('+7 (903) 261-93-16')
const smsCode = ref('')
const timer = useTimerCountdown(CONFIG.auth.timer.duration)
</script>

<style lang="sass" scoped>
.auth
  &__agree-conditions
    font-size: 16px
    font-weight: 400
    margin-top: 24px
</style>

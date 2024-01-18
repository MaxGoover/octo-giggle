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

    <q-btn
      class="q-mt-sm full-width action-button action-button--secondary"
      disable
    >
      <ComponentIcon
        class="q-mr-md"
        :color-stroke="$COLOR.MAIN_THEME"
        :height="24"
        :name="$ICON.ARROWS_SYNCHRONIZE"
        :width="24"
      >
        <IconArrowsSynchronize />
      </ComponentIcon>
      <span>{{
        $t('auth.mightRepeatAfter', {
          timerMinutes: timer.minutes,
          timerSeconds: timer.seconds,
        })
      }}</span>
    </q-btn>

    <!--Получить код-->
    <div class="col-12 q-mt-lg">
      <q-btn class="full-width action-button action-button--active">
        <span>{{ $t('action.enterSystem') }}</span>
      </q-btn>
    </div>
  </div>
</template>

<script>
// import { mapState } from 'pinia'
// import { useAuthStore } from '@/stores/auth'
import ComponentIcon from '@/components/ComponentIcon.vue'
import IconArrowsSynchronize from '@/assets/icons/IconArrowsSynchronize.vue'

export default {
  name: 'DesktopAuthSignInBySmsConfirm',
  components: {
    ComponentIcon,
    IconArrowsSynchronize,
  },
  data() {
    return {
      phoneFormatted: '+7 (903) 261-93-16',
      smsCode: '',
    }
  },
  computed: {
    // ...mapState(useAuthStore, ['timer']),
  },
//   mounted() {
//     this.timer.start()
//   },
}
</script>

<style lang="sass" scoped>
.auth
  &__agree-conditions
    font-size: 16px
    font-weight: 400
    margin-top: 24px
</style>

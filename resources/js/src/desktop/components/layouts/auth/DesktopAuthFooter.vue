<template>
  <div class="auth-footer">
    <div class="sponsor-icons">
      <ComponentIcon
        class="q-ml-md vertical-middle"
        :height="28"
        :name="ICONS.SKOLKOVO"
        :width="98"
      >
        <IconSkolkovo />
      </ComponentIcon>
      <ComponentIcon
        class="q-ml-md vertical-middle"
        :height="17"
        :name="ICONS.FRII"
        :width="61"
      >
        <IconFrii />
      </ComponentIcon>
      <ComponentIcon
        class="q-ml-md vertical-middle"
        :height="25"
        :name="ICONS.INNOVATION"
        :width="50"
      >
        <IconInnovation />
      </ComponentIcon>
      <ComponentIcon
        class="q-ml-md vertical-middle"
        :height="22"
        :name="ICONS.RUS_PO"
        :width="188"
      >
        <IconRusPo />
      </ComponentIcon>
      <ComponentIcon
        class="q-ml-md vertical-middle"
        :height="32"
        :name="ICONS.FNS"
        :width="31"
      >
        <IconFns />
      </ComponentIcon>
    </div>
  </div>
</template>

<script setup>
import { inject } from 'vue'
import ComponentIcon from '@/components/ComponentIcon.vue'
import IconFns from '@/assets/icons/IconFns.vue'
import IconFrii from '@/assets/icons/IconFrii.vue'
import IconInnovation from '@/assets/icons/IconInnovation.vue'
import IconRusPo from '@/assets/icons/IconRusPo.vue'
import IconSkolkovo from '@/assets/icons/IconSkolkovo.vue'

const ICONS = inject('ICONS')
</script>

<style lang="sass" scoped>
.auth-footer
  background-color: $grey-1
  bottom: 0
  display: flex
  flex-wrap: wrap
  justify-content: flex-end
  padding-bottom: 4vh
  padding-right: 2vw
  position: absolute
  width: 100%

  @media only screen and (min-device-width: 1400px)
    padding-bottom: 7vh
    padding-right: 4vw
</style>

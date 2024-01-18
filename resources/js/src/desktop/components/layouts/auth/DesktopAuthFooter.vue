<template>
  <div class="auth-footer">
    <div class="sponsor-icons">
      <ComponentIcon
        class="q-ml-md vertical-middle"
        :height="28"
        :name="$ICONS.SKOLKOVO"
        :width="98"
      >
        <IconSkolkovo />
      </ComponentIcon>
      <ComponentIcon
        class="q-ml-md vertical-middle"
        :height="17"
        :name="$ICONS.FRII"
        :width="61"
      >
        <IconFrii />
      </ComponentIcon>
      <ComponentIcon
        class="q-ml-md vertical-middle"
        :height="25"
        :name="$ICONS.INNOVATION"
        :width="50"
      >
        <IconInnovation />
      </ComponentIcon>
      <ComponentIcon
        class="q-ml-md vertical-middle"
        :height="22"
        :name="$ICONS.RUS_PO"
        :width="188"
      >
        <IconRusPo />
      </ComponentIcon>
      <ComponentIcon
        class="q-ml-md vertical-middle"
        :height="32"
        :name="$ICONS.FNS"
        :width="31"
      >
        <IconFns />
      </ComponentIcon>
    </div>
  </div>
</template>

<script>
import ComponentIcon from '@/components/ComponentIcon.vue'
import IconFns from '@/assets/icons/IconFns.vue'
import IconFrii from '@/assets/icons/IconFrii.vue'
import IconInnovation from '@/assets/icons/IconInnovation.vue'
import IconRusPo from '@/assets/icons/IconRusPo.vue'
import IconSkolkovo from '@/assets/icons/IconSkolkovo.vue'

export default {
  name: 'DesktopAuthFooter',
  components: {
    ComponentIcon,
    IconFns,
    IconFrii,
    IconInnovation,
    IconRusPo,
    IconSkolkovo,
  },
}
</script>

<style lang="sass" scoped>
@import '@/css/colors'
.auth-footer
  background-color: $main-theme-bg
  bottom: 0
  display: flex
  flex-wrap: wrap
  justify-content: flex-end
  position: absolute
  width: 100%
.sponsor-icons
  margin-bottom: 7vh
  margin-right: 4vw
</style>

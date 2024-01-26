<template>
  <!-- <Link :href="menuSection.route"> -->
  <q-btn flat round color="bg-indigo-3" :title="menuSection.title">
    <ComponentIcon
      :color-stroke="getPaletteColor('indigo-3')"
      :height="16"
      :name="menuSection.icon"
      :width="16"
    >
      <!--Подключение нужной иконки меню-->
      <component
        :is="icons[`Icon${capitalizeFirstLetter(menuSection.icon)}`]"
      />
    </ComponentIcon>
  </q-btn>
  <!-- </Link> -->
</template>

<script setup>
import { capitalizeFirstLetter } from '@/utils/helpers'
import { colors } from 'quasar'
import { Link } from '@inertiajs/vue3'
import ComponentIcon from '@/components/ComponentIcon.vue'
import IconMoneyCashBill1 from '@/assets/icons/IconMoneyCashBill1.vue'
import IconNotePadText from '@/assets/icons/IconNotePadText.vue'
import IconProfessionsManConstruction2 from '@/assets/icons/IconProfessionsManConstruction2.vue'
import IconSecurityShieldPerson from '@/assets/icons/IconSecurityShieldPerson.vue'
import IconUserCheck from '@/assets/icons/IconUserCheck.vue'
import IconUserFullBody from '@/assets/icons/IconUserFullBody.vue'

defineProps({
  menuSection: {
    required: true,
    type: Object,
  },
})

const { getPaletteColor } = colors
const icons = {
  IconMoneyCashBill1,
  IconNotePadText,
  IconProfessionsManConstruction2,
  IconSecurityShieldPerson,
  IconUserCheck,
  IconUserFullBody,
}
</script>

<style lang="sass" scoped>
.menu-item
  &__text
    color: $indigo-1
    font-family: Lato, sans-serif
    font-size: 14px
    font-weight: 400
</style>

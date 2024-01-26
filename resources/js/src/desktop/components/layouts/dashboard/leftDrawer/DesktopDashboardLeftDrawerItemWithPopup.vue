<template>
  <q-btn class="bg-blue-grey-1" flat round :title="menuSection[0].title">
    <ComponentIcon
      :color-stroke="getPaletteColor('indigo-3')"
      :height="16"
      :name="menuSection[0].icon"
      :width="16"
    >
      <!--Подключение нужной иконки меню-->
      <component
        :is="icons[`Icon${capitalizeFirstLetter(menuSection[0].icon)}`]"
      />
    </ComponentIcon>

    <q-menu anchor="top right" self="top left" :offset="[11, 3]">
      <q-list>
        <template
          v-for="(menuItem, index) in menuSection"
          :key="menuItem.title"
        >
          <Link class="text-decoration-none" :href="menuItem.route">
            <q-item v-if="index" class="bg-grey-1" clickable v-close-popup>
              <q-item-section
                class="text-indigo-8 text-weight-regular font-lato"
                >{{ menuItem.title }}</q-item-section
              >
            </q-item>
          </Link>
        </template>
      </q-list>
    </q-menu>
  </q-btn>
</template>

<script setup>
import { capitalizeFirstLetter } from '@/utils/helpers'
import { colors } from 'quasar'
import { Link } from '@inertiajs/vue3'
import ComponentIcon from '@/components/ComponentIcon.vue'
import IconContentArchiveLocker from '@/assets/icons/IconContentArchiveLocker.vue'
import IconFileClipboard from '@/assets/icons/IconFileClipboard.vue'
import IconMoneyCashBill1 from '@/assets/icons/IconMoneyCashBill1.vue'
import IconNotePadText from '@/assets/icons/IconNotePadText.vue'
import IconUserAdd from '@/assets/icons/IconUserAdd.vue'
import IconUserEdit from '@/assets/icons/IconUserEdit.vue'
import IconUserLocked from '@/assets/icons/IconUserLocked.vue'
import IconUserMultiple from '@/assets/icons/IconUserMultiple.vue'
import IconValidationCheck from '@/assets/icons/IconValidationCheck.vue'

defineProps({
  menuSection: {
    required: true,
    type: Object,
  },
})

const { getPaletteColor } = colors
const icons = {
  IconContentArchiveLocker,
  IconFileClipboard,
  IconMoneyCashBill1,
  IconNotePadText,
  IconUserAdd,
  IconUserEdit,
  IconUserLocked,
  IconUserMultiple,
  IconValidationCheck,
}

// const defineIcon = (icon) => defineAsyncComponent(() => import(`@/assets/icons/Icon${icon}.vue`))

// export default {
//   name: 'DesktopLeftDrawerItemWithPopup',
//   components: {
//     ComponentIcon,
//     IconContentArchiveLocker,
//     IconFileClipboard,
//     IconMoneyCashBill1,
//     IconNotePadText,
//     IconUserAdd,
//     IconUserEdit,
//     IconUserLocked,
//     IconUserMultiple,
//     IconValidationCheck,
//   },
//   props: {
//     menuSection: {
//       required: true,
//       type: Array,
//     },
//   },
// }
</script>

<style lang="sass" scoped>
.menu-item
  &__text
    color: $indigo-1
    font-family: Lato, sans-serif
    font-size: 14px
    font-weight: 400
</style>

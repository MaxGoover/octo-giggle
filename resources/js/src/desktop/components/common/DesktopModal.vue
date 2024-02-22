<template>
  <q-dialog :model-value="isShowed" class="modal" @update:model-value="hideModal">
    <q-card class="modal__card">
      <!--Кнопка "Закрыть"-->
      <q-btn class="modal__close" flat @click="hideModal">
        <q-icon color="grey-5" name="mdi-close" size="30px" />
      </q-btn>
      <slot name="title"></slot>
      <div class="modal__body">
        <slot name="content"></slot>
        <slot name="actions"></slot>
      </div>
    </q-card>
  </q-dialog>
</template>

<script setup>
defineProps({
  hideModal: Function,
  isShowed: Boolean,
})
</script>

<style lang="sass" scoped>
.modal
  &__body
    max-height: 680px
    min-width: 706px
    /* overflow-y: auto */
    padding-right: 32px

  &__card
    border-radius: 16px
    max-width: 80vw
    padding: 40px 30px 40px 40px

  &__close
    padding: 8px
    position: absolute
    right: 16px
    top: 16px
</style>

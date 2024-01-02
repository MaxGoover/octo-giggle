<template>
  <div class="mark-color" :class="markColor"></div>
</template>

<script>
export default {
  name: 'ComponentMarkColor',
  props: {
    markColor: {
      type: String,
      required: true,
    },
  },
}
</script>

<style
  lang="sass"
  scoped
>
@import 'src/css/common/colors'
.mark-color
  border-radius: 12px
  height: 12px
  width: 12px
.no-color
  border: 1px solid $default-font
.with-errors
  background-color: $tag-with-errors
.in-payment
  background-color: $tag-in-payment
.success
  background-color: $tag-success
.in-archive
  background-color: $tag-in-archive
</style>

<template functional>
  <div v-show="props.value" class="alert" :class="`alert--${props.type}`">
    <div class="alert-content">
      <slot />
    </div>
  </div>
</template>

<script>
export default {
  functional: true,
  props: {
    type: {
      type: String,
      required: true,
      validation: value => ["error"].includes(value)
    },
    value: {
      type: Boolean,
      default: () => true
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../assets/styles/variables";

.alert {
  width: 100%;
  padding: 0.75rem 1rem;
  border-radius: 5px;

  &.alert--error {
    color: $error-color;
    border: 2px solid $error-color;
  }
}
</style>

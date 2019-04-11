<template>
  <button :disabled="disabled" class="btn" @click="$emit('click')">
    <slot />
  </button>
</template>

<script>
export default {
  props: {
    disabled: {
      type: Boolean,
      default: () => false
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../assets/styles/variables";

.btn {
  color: $accent-color;
  padding: 0.25em 1em;
  border: 2px solid $accent-color;
  border-radius: 3px;
  background-color: transparent;

  &:hover {
    background: $accent-color;
    color: $white;
  }

  &:disabled {
    background-color: $disabled-state-color !important;
    border-color: $disabled-state-color;
    color: $white;
    cursor: auto;
  }
}
</style>

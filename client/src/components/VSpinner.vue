<template>
  <div class="spinner" :style="{ height: size, width: size }"></div>
</template>

<script>
export default {
  props: {
    size: {
      type: String,
      default: () => "40px"
    }
  }
};
</script>

<style lang="scss" scoped>
.spinner {
  margin: 0 auto;
  background-color: #333;

  border-radius: 100%;
  animation: sk-scaleout 1s infinite ease-in-out;
}

@keyframes sk-scaleout {
  0% {
    transform: scale(0);
    transform: scale(0);
  }

  100% {
    transform: scale(1);
    transform: scale(1);
    opacity: 0;
  }
}
</style>

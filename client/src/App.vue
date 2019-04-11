<template>
  <div id="app">
    <v-toolbar />

    <router-view />
  </div>
</template>

<script>
import { VToolbar } from "./components";

export default {
  components: { VToolbar }
};
</script>

<style lang="scss">
@import "./assets/styles/variables";
@import "./assets/styles/reset";
@import "./assets/styles/utilities";

#app {
  position: relative;
  min-height: 100vh;
  color: $font-color;
  background-color: $body-bg-color;
  padding-top: calc(#{$toolbar-padding-y * 3} + #{$toolbar-image-size});
}
</style>

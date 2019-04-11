<template functional>
  <div class="toolbar">
    <div class="toolbar__image">
      <router-link to="/">
        <img src="@/assets/images/logo.png" alt="HN Logo" />
      </router-link>
    </div>
    <div class="toolbar__title">HNUL</div>
  </div>
</template>

<style lang="scss" scoped>
@import "../../assets/styles/variables";

.toolbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  display: flex;
  align-items: center;
  background-color: $primary-color;
  padding: 0.5rem 1rem;

  .toolbar__image {
    margin-right: 0.5rem;

    & img {
      max-height: 32px;
      max-width: 32px;
    }
  }

  .toolbar__title {
    color: $white;
  }
}
</style>

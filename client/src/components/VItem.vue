<template>
  <div
    :class="[{ 'item--deleted': item.isDeleted }, `item--${item.type}`]"
    class="item"
  >
    <div class="item__header">
      <span v-if="item.isDeleted" class="item__title">Item deleted</span>
      <span v-else-if="isEmpty" class="item__title">Item empty</span>
      <span v-else class="item__title">{{ item.title }}</span>
    </div>

    <div v-if="item.url || item.body" class="item__content">
      <a v-if="item.url" :href="item.url" target="_blank">{{ item.url }}</a>
      <p v-else v-html="item.body"></p>
    </div>

    <div v-if="item.createdAt" class="item__footer">
      {{ item.createdAt | date }}
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: true,
      validator: ({ type }) => {
        return ["job", "poll", "story", "comment", "pollopt"].includes(type);
      }
    }
  },
  computed: {
    isEmpty() {
      return !(this.item.title || this.item.body || this.item.url);
    }
  },
  mounted() {
    const links = this.$el.querySelectorAll("a");

    links.forEach(link => {
      link.setAttribute("target", "_blank");
    });
  }
};
</script>

<style lang="scss" scoped>
@import "../assets/styles/variables";

.item {
  width: 100%;
  padding: 1rem;
  box-shadow: $card-box-shadow;
  margin-bottom: 1rem;
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
  background-color: $white;

  &:last-child {
    margin-bottom: 0;
  }

  &__header {
    text-align: center;
    margin-bottom: 1rem;
  }

  &__title {
    font-weight: bold;
  }

  &__content {
    text-align: justify;
    margin-bottom: 1rem;
  }

  &__footer {
    text-align: right;
    color: darken($grey-lighten-2, 25%);
  }

  &--deleted {
    background-color: $grey-lighten-5;
  }

  &--story {
    border-left: 3px solid green;
  }

  &--comment {
    border-left: 3px solid yellow;
  }

  &--job {
    border-left: 3px solid blue;
  }

  &--poll {
    border-left: 3px solid orangered;
  }

  &--pollopt {
    border-left: 3px solid purple;
  }
}
</style>

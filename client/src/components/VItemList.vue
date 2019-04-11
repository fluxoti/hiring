<script>
import VItem from "./VItem.vue";

export default {
  functional: true,
  components: { VItem },
  props: {
    items: {
      type: Array,
      required: true
    }
  },
  render(h, ctx) {
    return h(
      "div",
      { class: "item-list" },
      ctx.props.items.map(item => h(VItem, { props: { item }, key: item.id }))
    );
  }
};
</script>

<style lang="scss" scoped>
@import "../assets/styles/variables";

.item-list {
  padding-top: 1rem;
  background-color: $grey-lighten-5;
}
</style>

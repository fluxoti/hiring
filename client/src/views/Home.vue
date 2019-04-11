<template>
  <main class="page">
    <h1 class="page__title">HN User Lookup</h1>

    <v-alert :value="showNotFoundError" type="error">
      The user {{ username }} does not exist.
    </v-alert>

    <div class="search-bar">
      <input
        v-model="username"
        class="search-bar__input"
        placeholder="Type an username"
      />

      <div class="w-100"></div>

      <v-btn class="search-bar__button" @click="loadUserItems">Search</v-btn>
    </div>

    <v-item-list :items="items" />

    <div class="bg-body text-center py-2">
      <v-btn
        v-show="!loading && currentBatch < totalBatches"
        :disabled="loading"
        @click="loadMoreItems"
      >
        Load more
      </v-btn>

      <v-spinner v-if="loading" />
    </div>
  </main>
</template>

<script>
import { VAlert, VBtn, VItemList, VSpinner } from "../components";

export default {
  name: "Home",
  components: { VAlert, VBtn, VItemList, VSpinner },
  data() {
    return {
      username: "",
      loading: false,
      showNotFoundError: false,
      items: this.$store.getters.activeUserItems,
      currentBatch: this.$store.state.currentBatch
    };
  },
  computed: {
    totalBatches() {
      const { batchSize, user } = this.$store.state;

      if (!user) {
        return 1;
      }

      return Math.ceil(user.items.length / batchSize);
    }
  },
  watch: {
    showNotFoundError(value) {
      if (value) {
        setTimeout(() => {
          this.showNotFoundError = false;
        }, 5000);
      }
    }
  },
  methods: {
    loadMoreItems() {
      this.$store.commit("incrementCurrentPage");
      this.loadUserItems();
    },

    loadUserItems() {
      const username = this.username;

      if (!username) {
        return;
      }

      this.loading = true;

      this.$store
        .dispatch("fetchItemsByUsername", { username })
        .then(() => {
          this.items = this.$store.getters.activeUserItems;
          this.currentBatch = this.$store.state.currentBatch;
        })
        .catch(({ response }) => {
          if (response.status === 404) {
            this.showNotFoundError = true;
          } else {
            console.error(response);
          }
        })
        .finally(() => {
          this.loading = false;
        });
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../assets/styles/variables";

.page {
  max-width: 960px;
  margin-left: auto;
  margin-right: auto;
  padding-top: 1rem;
  background-color: $white;
}

.page__title {
  font-size: 1.5rem;
  margin-top: 1rem;
  margin-bottom: 1rem !important;
  margin-bottom: 0;
  text-align: center;
  text-transform: uppercase;
}

.search-bar {
  width: 100%;
  padding: 1rem 0;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;

  &__input {
    width: 50%;
  }

  &__button {
    margin-top: 1rem;
    cursor: pointer;
  }
}
</style>

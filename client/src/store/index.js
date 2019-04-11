import Vue from "vue";
import Vuex from "vuex";
import Api from "../api";

Vue.use(Vuex);

const state = {
  batchSize: 10,
  currentBatch: 1,
  user: null,
  items: {}
};

const getters = {
  activeUserItemIds(state) {
    if (!state.user) {
      return [];
    }

    const maxItems = state.batchSize * state.currentBatch;

    return state.user.items.slice(0, maxItems);
  },

  activeUserItems(state, getters) {
    if (!state.user) {
      return [];
    }

    return getters.activeUserItemIds.map(id => state.items[id]);
  }
};

const actions = {
  async fetchItemsByUsername({ dispatch, getters }, { username }) {
    return dispatch("fetchUser", { username }).then(() =>
      dispatch("fetchItems", { ids: getters.activeUserItemIds })
    );
  },

  async fetchUser({ state, commit }, { username }) {
    if (state.user && state.user.username === username) {
      return Promise.resolve(state.user);
    }

    return Api.users.findByUsername(username).then(({ data }) => {
      commit("setCurrentUser", { user: data });

      return data;
    });
  },

  async fetchItems({ state, commit }, { ids }) {
    const filteredIds = ids.filter(id => !state.items[id]);

    return Api.items.allByIds(filteredIds).then(items => {
      commit("setItems", { items });

      return items;
    });
  }
};

const mutations = {
  incrementCurrentPage(state) {
    const maxItems = state.batchSize * state.currentBatch;

    if (state.user && state.user.items.length > maxItems) {
      state.currentBatch += 1;
    }
  },

  setCurrentUser(state, { user }) {
    state.user = user;
  },

  setItems(state, { items }) {
    items.forEach(item => Vue.set(state.items, item.id, item));
  }
};

export default new Vuex.Store({
  state,
  getters,
  actions,
  mutations,
  strict: process.env.NODE_ENV !== "production"
});

import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import { sync } from "vuex-router-sync";

import * as filters from "./filters";

Vue.config.productionTip = false;

Object.keys(filters).forEach(key => {
  Vue.filter(key, filters[key]);
});

sync(store, router);

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");

import "./assets/index.css";

import App from "./App.vue";
import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";

import SatellitesCards from "./pages/SatellitesCards.vue";
import NewSatellite from "./pages/NewSatellite.vue";
import Home from "./pages/Home.vue";
import EditSatellite from "./pages/EditSatellite.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: "/", name: "Home", component: Home },
    { path: "/antenas", name: "antenas", component: SatellitesCards },
    {
      path: "/adicionar-antena",
      name: "adicionarAntena",
      component: NewSatellite,
    },
    {
      path: "/editar-antena/:id",
      name: "editarAntena",
      component: EditSatellite,
    },
  ],
});

createApp(App).use(router).mount("#app");

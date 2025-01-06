import { defineStore } from "pinia";
import {
  allSatellites,
  createSatellite,
  removeSatellite,
  getSatelliteById,
  updateSatellite,
} from "../api/satellite-api";
import { useUserStore } from "./useUser";

export const useSatellite = defineStore("satellite", {
  state: () => ({ satellite: null }),
  getters: {},
  actions: {
    async fetchAllSatellites() {
      const store = useUserStore();
      const response = await allSatellites(store.getToken);

      return response;
    },
  },
});

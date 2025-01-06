import { defineStore } from "pinia";
import {
  allSatellites,
  getSatelliteById,
  updateSatellite,
  createSatellite,
  removeSatellite,
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
    async fetchSatellitesId(id) {
      const store = useUserStore();
      const response = await getSatelliteById(store.getToken, id);

      return response;
    },
    async fetchUpdateSatellitesId(id, editSatellite) {
      const store = useUserStore();
      const response = await updateSatellite(store.getToken, id, editSatellite);

      return response;
    },
    async fetchCreateSatellite(newSatellite) {
      const store = useUserStore();
      const response = await createSatellite(store.getToken, newSatellite);

      return response;
    },
    async fetchSatelliteRemoveId(id) {
      const store = useUserStore();
      const response = await removeSatellite(store.getToken, id);

      return response;
    },
  },
});

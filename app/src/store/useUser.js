import { defineStore } from "pinia";

export const useUserStore = defineStore("user", {
  state: () => ({ token: null, name: null, email: null }),
  getters: {
    getUser(state) {
      return state.name;
    },
    getEmail(state) {
      return state.email;
    },
    getToken(state) {
      return state.token;
    },
  },
  actions: {
    setUser(user) {
      this.name = user;
    },
    setEmail(email) {
      this.email = email;
    },
    setToken(token) {
      this.token = token;
    },
  },
});

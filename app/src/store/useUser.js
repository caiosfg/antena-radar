import { defineStore } from "pinia";
import { logout } from "../api/auth-api";

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
    clearAll() {
      this.token = null;
      this.name = null;
      this.email = null;
    },
    async handleLogout() {
      const response = await logout();
      return response;
    },
  },
});

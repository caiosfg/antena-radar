import { defineStore } from "pinia";
import { logout } from "../api/auth-api";
import { csrfCookie, login, getUser, register } from "../api/auth-api";

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
      const response = await logout(this.token);
      this.clearAll();
      return response;
    },
    async fetchUser() {
      const response = await getUser();
      return response;
    },
    async handleLogin(credentials) {
      await csrfCookie();
      const { data } = await login(credentials);
      if (data) {
        this.setToken(data.token);
        this.setEmail(data.user.email);
        this.setUser(data.user.name);
      }
      return data;
    },
    async handleRegister(newUser) {
      const response = await register(newUser);
      console.log("🚀 ~ handleRegister ~ response:", response);
    },
  },
});

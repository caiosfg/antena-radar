import api from "./api";

const resource = "/api/auth";

export const csrfCookie = () => api.get("/sanctum/csrf-cookie");

export const login = (credentials) =>
  api.post(`${resource}/login`, credentials);

export const register = (user) => api.post(`${resource}/register`, user);

export const logout = () => api.post(`${resource}/logout`);

export const getUser = () => api.get("/api/user");

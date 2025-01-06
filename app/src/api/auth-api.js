import api from "./api";

const resource = "/api/auth";

export const csrfCookie = () => api.get("/sanctum/csrf-cookie");

export const login = (credentials) =>
  api.post(`${resource}/login`, credentials);

export const register = (user) => api.post(`${resource}/register`, user);

export const logout = async (token) => {
  api.defaults.headers.common = { Authorization: `bearer ${token}` };
  const { data } = await api.post(`${resource}/logout`);

  return data;
};

export const getUser = () => api.get("/api/user");

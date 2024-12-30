import api from "./api";

const resource = "/satellite";

export const allSatellites = () => api.get(resource);

export const getSatelliteById = (id) => api.get(`${resource}/${id}`);

export const createSatellite = (satellite) => api.post(resource, satellite);

export const updateSatellite = (id, satellite) =>
  api.put(`${resource}/${id}`, satellite);

export const removeSatellite = (id) => api.delete(`${resource}/${id}`);

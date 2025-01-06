import axios from "axios";

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

const resource = "http://localhost:8080/api/v1/satellite";

export const allSatellites = async (token) => {
  axios.defaults.headers.common = { Authorization: `bearer ${token}` };
  const { data } = await axios.get(resource);

  return data;
};

export const getSatelliteById = async (token, id) => {
  axios.defaults.headers.common = { Authorization: `bearer ${token}` };
  const { data } = await axios.get(`${resource}/${id}`);

  return data;
};

export const updateSatellite = async (token, id, satellite) => {
  axios.defaults.headers.common = { Authorization: `bearer ${token}` };
  const { data } = await axios.put(`${resource}/${id}`, satellite);

  return data;
};

export const createSatellite = async (token, satellite) => {
  axios.defaults.headers.common = { Authorization: `bearer ${token}` };
  const { data } = await axios.post(resource, satellite);

  return data;
};

export const removeSatellite = async (token, id) => {
  axios.defaults.headers.common = { Authorization: `bearer ${token}` };
  const { status } = await axios.delete(`${resource}/${id}`);

  return status;
};

import axios from "axios";

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

const resource = "http://localhost:8080/api/v1/ranking";

export const getRanking = async (token) => {
  axios.defaults.headers.common = { Authorization: `bearer ${token}` };
  const { data } = await axios.get(resource);

  return data;
};

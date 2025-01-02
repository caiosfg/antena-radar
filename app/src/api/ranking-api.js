import api from "./api";

const resource = "/api/v1/ranking";

export const getRanking = () => api.get(resource);

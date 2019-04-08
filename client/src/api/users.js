import http from "../services/http";

export const findByUsername = username => {
  return http.get(`/users/${username}`);
};

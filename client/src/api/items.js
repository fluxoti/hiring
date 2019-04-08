import http from "../services/http";

export const findById = id => {
  return http.get(`/items/${id}`);
};

export const allByIds = ids => {
  return Promise.all(ids.map(id => findById(id))).then(items =>
    items.map(({ data }) => data)
  );
};

export const allIdsByType = type => {
  return http.get(`/items/${type}`);
};

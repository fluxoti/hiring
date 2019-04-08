import axios from "axios";

const baseURL = process.env.VUE_APP_API_BASE_URL;

export const http = {
  get(path) {
    return this.request("get", path, {});
  },

  request(method, url, data) {
    return axios.request({
      baseURL,
      url,
      data,
      method,
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest"
      }
    });
  }
};

export default http;

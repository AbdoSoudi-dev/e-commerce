import store from "./store/Auth";
import axios from "axios";

const api = axios.create({
    baseURL: `/api`,
})
api.interceptors.request.use(config=>{
    const token = store.state.token;
    config.headers["locale"] = localStorage.getItem("locale") || "en";
    config.headers.Authorization = `Bearer ${token}`;
    return config
})

export default api;

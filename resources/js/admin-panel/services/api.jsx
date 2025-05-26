import axios from "axios";

const api = axios.create({
    baseURL: "/api/admin", // Sesuaikan dengan base URL API Laravel Anda
    headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
        "X-Requested-With": "XMLHttpRequest",
    },
});

// Tambahkan interceptor untuk auth token
api.interceptors.request.use((config) => {
    const token = localStorage.getItem("admin_token");
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

export default api;

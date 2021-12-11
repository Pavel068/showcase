import axios from "axios";
import store from "../store/index";
import router from "../router/index";

// Request interceptor
axios.interceptors.request.use(request => {
    request.headers.common['Accept'] = 'application/json';
    const token = store.getters['accessToken']
    if (token) {
        request.headers.common['Authorization'] = `Bearer ${token}`
    }

    return request
})

// Response interceptor
axios.interceptors.response.use(response => response, error => {
    const {status} = error.response

    if (status >= 400) {
        return Promise.reject(error.response.data)
    }
})

export default axios;

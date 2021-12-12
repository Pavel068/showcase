import axios from '../plugins/axios';
import router from "../router/index";

import Cookies from 'js-cookie';

const store = {
    state: {
        authorized_user: null,
        access_token: Cookies.get('access_token'),
        system_settings: null,
        customer_qr: null,
        customer_analytics: null,
        system_analytics: null,
    },
    getters: {
        authorizedUser: state => state.authorized_user,
        accessToken: state => state.access_token,
        systemSettings: state => state.system_settings,
        customerQR: state => state.customer_qr,
        customerAnalytics: state => state.customer_analytics,
        systemAnalytics: state => state.system_analytics,
    },
    mutations: {
        setAuthorizedUser: (state, value) => state.authorized_user = value,
        setAccessToken: (state, value) => state.access_token = value,
        setSystemSettings: (state, value) => state.system_settings = value,
        setCustomerQR: (state, value) => state.customer_qr = value,
        setCustomerAnalytics: (state, value) => state.customer_analytics = value,
        setSystemAnalytics: (state, value) => state.system_analytics = value,
    },
    actions: {
        async login(context, payload) {
            const {data} = await axios.post('/api/auth/login', payload);

            if (data.access_token) {
                context.commit('setAuthorizedUser', data.data);
                context.commit('setAccessToken', data.access_token);
                Cookies.set('access_token', data.access_token);

                await context.dispatch('getMe');
            }
        },
        async register(context, payload) {
            const {data} = await axios.post('/api/auth/register', payload);

            context.commit('setAuthorizedUser', data.data);
            context.commit('setAccessToken', data.access_token);
            Cookies.set('access_token', data.access_token);

            return data;
        },
        async logout(context) {
            const {data} = await axios.delete('/api/auth/logout');
            context.commit('setAuthorizedUser', null);
            context.commit('setAccessToken', null);
            Cookies.remove('access_token');
        },
        async getMe(context) {
            if (context.getters.accessToken) {
                const {data} = await axios.get('/api/auth/me');
                context.commit('setAuthorizedUser', data.data);
            }
        },
        async getSystemSettings(context) {
            const {data} = await axios.get('/api/system-settings');
            context.commit('setSystemSettings', data);
        },
        async getCustomerQR(context, payload) {
            const {data} = await axios.get('/api/system-settings/customer-qr/' + payload);
            context.commit('setCustomerQR', data);
        },
        async getCustomerAnalytics(context, payload) {
            const {data} = await axios.get('/api/analytics/customer/');
            context.commit('setCustomerAnalytics', data);
        },
        async getSystemAnalytics(context, payload) {
            const {data} = await axios.get('/api/analytics/system/');
            context.commit('setSystemAnalytics', data);
        }
    }
}

export default store;

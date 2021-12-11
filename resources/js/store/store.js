import axios from '../plugins/axios';
import router from "../router/index";

import Cookies from 'js-cookie';

const store = {
    state: {
        authorized_user: null,
        access_token: Cookies.get('access_token'),
    },
    getters: {
        authorizedUser: state => state.authorized_user,
        accessToken: state => state.access_token,
    },
    mutations: {
        setAuthorizedUser: (state, value) => state.authorized_user = value,
        setAccessToken: (state, value) => state.access_token = value,
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
        }
    }
}

export default store;

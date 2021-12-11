import Index from '../pages/Index';
import Profile from "../pages/Profile";
import Admin from "../pages/Admin";
import Signup from "../pages/Signup";
import Login from "../pages/Login";

export default [
    {
        path: '/',
        name: 'Index',
        component: Index,
        meta: {
            title: `Главная`,
            auth: false,
        }
    },
    {
        path: '/signup',
        name: 'Signup',
        component: Signup,
        meta: {
            title: `Регистрация`,
            auth: false,
        }
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
        meta: {
            title: `Авторизация`,
            auth: false,
        }
    },
    {
        path: '/profile',
        name: 'Profile',
        component: Profile,
        meta: {
            title: `Профиль`,
            auth: false,
        }
    },
    {
        path: '/admin',
        name: 'Admin',
        component: Admin,
        meta: {
            title: `Панель администратора`,
            auth: false,
        }
    },
];

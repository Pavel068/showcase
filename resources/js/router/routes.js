import Index from '../pages/Index';
import Profile from "../pages/Profile";
import Admin from "../pages/Admin";

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

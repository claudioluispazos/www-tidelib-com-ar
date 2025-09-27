import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import BookView from '../views/BookView.vue';
import AuthView from '../views/AuthView.vue';
import RegisterView from '../views/RegisterView.vue';
import ResetPasswordView from '../views/ResetPasswordView.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomeView
    },
    {
        path: '/login',
        name: 'login',
        component: AuthView
    },
    {
        path: '/register',
        name: 'register',
        component: RegisterView
    },
    {
        path: '/reset',
        name: 'reset',
        component: ResetPasswordView
    },
    {
        path: '/libros/:id',
        name: 'book-detail',
        component: BookView
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
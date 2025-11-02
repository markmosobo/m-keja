import { createRouter, createWebHistory } from 'vue-router';
import Index from '../views/Index.vue';
import Login from '../views/Login.vue';
import Register from '../views/Register.vue';
import Home from '../views/Home.vue'

const routes = [
    { path: '/', name: 'index', component: Index },
    { path: '/login', name: 'login', component: Login },
    { path: '/register', name: 'register', component: Register },
    { path: '/dashboard', name: 'dashboard', component: Home },
];

const router = createRouter({
    history: createWebHistory('/'),
    routes,
});

export default router;

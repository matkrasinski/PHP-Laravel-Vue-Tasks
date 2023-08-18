import { createRouter, createWebHistory } from 'vue-router';

import MainPage from '../components/LandingPage'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', redirect: '/customers', props: true },
        { path: '/customers', name: 'customers', component: MainPage, props: true },
    ]
});

export default router;
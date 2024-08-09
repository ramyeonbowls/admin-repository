const routes = [
    {
        path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component: () => import(/* webpackChunkName: "404" */ './packages/404.vue'),
    },
    {
        path: '/',
        name: 'home',
        component: () => import(/* webpackChunkName: "home" */ './packages/Home.vue'),
    },
]

export default routes

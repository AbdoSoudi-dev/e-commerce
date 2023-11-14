import MasterLayout from "../user/layouts/MasterLayout.vue";
import Home from "../user/pages/index.vue"
const routes = [
    {
        path: '/',
        redirect: '/home',
        name: 'home',
        component: MasterLayout,
        children: [
            {path: '/home', name: 'home', component: Home}
        ]
    }
]

export default routes

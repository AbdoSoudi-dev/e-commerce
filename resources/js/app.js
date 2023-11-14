// import './bootstrap';

import 'primeflex/primeflex.css'
import 'primevue/resources/themes/lara-light-teal/theme.css';
import 'primeicons/primeicons.css';

import {createApp} from 'vue';

import App from './App.vue';
import PrimeVue from 'primevue/config';
import router from "./router";

const app = createApp(App)
app.use(router)
app.use(PrimeVue)
app.mount("#app")

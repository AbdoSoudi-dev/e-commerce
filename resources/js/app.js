// import './bootstrap';

import 'primevue/resources/themes/lara-light-teal/theme.css';
import 'primeicons/primeicons.css';


import {createApp} from 'vue';

import App from '././user/pages/index.vue';
import PrimeVue from 'primevue/config';

createApp(App)
    .use(PrimeVue)
    .mount("#app")

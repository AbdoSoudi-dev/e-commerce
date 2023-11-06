// import './bootstrap';

import {createApp} from 'vue'

import App from '././user/pages/index.vue'
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/lara-light-teal/theme.css'

createApp(App)
    .use(PrimeVue)
    .mount("#app")

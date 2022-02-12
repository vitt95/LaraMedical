require('./bootstrap');

import bootstrap from 'bootstrap';

import { createApp, h , defineAsyncComponent} from 'vue'

const app = createApp({});

app.component('side-bar', defineAsyncComponent(() => import( /* webpackChunkName : "js/sidebar" */'./vue/components/navbar/SideBar.vue')));
app.component('nav-bar', defineAsyncComponent(() => import( /* webpackChunkName : "js/navbar" */ './vue/components/navbar/NavBar.vue')));
app.mount('#app');


require('./bootstrap');

import bootstrap from 'bootstrap';

import { createApp , defineAsyncComponent } from 'vue';

const app = createApp({});

app.component('list-component', defineAsyncComponent(() => import('./vue/components/TestListComponent.vue')));

app.mount("#app");

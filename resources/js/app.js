require('./bootstrap');

import bootstrap from 'bootstrap';

import { createApp, h , defineAsyncComponent} from 'vue'

import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

//import DashBoard from './Pages/Dashboard.vue';

// Wrapper to initialize vue native components
const apps = document.getElementById("apps");

// Wrapper to initialize inertia component
const app = document.getElementById("inertia-c");

if(app){
    createInertiaApp({
        resolve: (name) => {
            const page = require(`./Pages/${name}`);
            console.log(page);
            return page;
        },
        setup({ el, App, props, plugin }) {
            createApp({ render: () => h(App, props) })
                .use(plugin)
                .mount(el)
        },
    })

    InertiaProgress.init();
}


/**
 * Cause inertia rendering , it's necessary to mount persistent component
 * in different point of mount. Be aware to not put inertia rendering into another point of mount.
 */
if(apps){
    const navbarMount = document.getElementById("navbarMount");
    const sideBarMount = document.getElementById("sidebarMount");

    const sidebar = createApp({});
    const navbar = createApp({});

    sidebar.component('side-bar', require('./vue/components/navbar/SideBar.vue').default);
    navbar.component('nav-bar', require('./vue/components/navbar/NavBar.vue').default);

    navbar.mount(navbarMount);
    sidebar.mount(sideBarMount);

}

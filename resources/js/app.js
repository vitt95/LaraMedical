require('./bootstrap');

import bootstrap from 'bootstrap';

import { createApp, h , defineAsyncComponent} from 'vue'
import feather from 'feather-icons';
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

//import DashBoard from './Pages/Dashboard.vue';

// Wrapper to initialize vue native components


const apps = document.getElementById("apps");

const loginMnt = document.getElementById("loginmnt");

// Wrapper to initialize inertia component
const app = document.getElementById("inertia-c");

if(app){
    createInertiaApp({
        resolve: (name) => import(`./Pages/${name}`),
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
    const footerMount = document.getElementById("footerMount");

    const sidebar = createApp({});
    const navbar = createApp({});
    const footer = createApp({});

    sidebar.component('side-bar', require('./vue/components/navbar/SideBar.vue').default);
    navbar.component('nav-bar', require('./vue/components/navbar/NavBar.vue').default);
    footer.component('footer-component', require('./vue/components/footer/Footer.vue').default);

    navbar.mount(navbarMount);
    sidebar.mount(sideBarMount);
    footer.mount(footerMount);

}

if(loginMnt){
    const login = createApp({});

    login.component('login-form', defineAsyncComponent(() => import('./vue/components/login/LoginForm.vue')));

    login.mount(loginMnt);
}

// Initialitze feather icons
feather.replace();

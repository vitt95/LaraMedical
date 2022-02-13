<template>
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.html">
                <span class="align-middle">AdminKit</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">Pages</li>

                <li @click="switchActive($event)" class="sidebar-item active">
                    <Link class="sidebar-link" href="/dashboard">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Dashboard</span>
                    </Link>
                </li>

                <li @click="switchActive($event)" class="sidebar-item">
                    <Link class="sidebar-link" href="profile">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">Profile</span>
                    </Link>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="pages-sign-in.html">
                        <i class="align-middle" data-feather="log-in"></i>
                        <span class="align-middle">Sign In</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="pages-sign-up.html">
                        <i class="align-middle" data-feather="user-plus"></i>
                        <span class="align-middle">Sign Up</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="pages-blank.html">
                        <i class="align-middle" data-feather="book"></i>
                        <span class="align-middle">Blank</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
import SimpleBar from "simplebar";
import {Link} from '@inertiajs/inertia-vue3';
export default {
    components: {
        Link
    },

    props : ["index"],

    setup(props) {

        const index = props.index;

        const initialize = () => {
                const simplebarElement =
                document.getElementsByClassName("js-simplebar")[0];

            if (simplebarElement) {
                const simplebarInstance = new SimpleBar(
                    document.getElementsByClassName("js-simplebar")[0]
                );

                /* Recalculate simplebar on sidebar dropdown toggle */
                const sidebarDropdowns = document.querySelectorAll(
                    ".js-sidebar [data-bs-parent]"
                );

                sidebarDropdowns.forEach((link) => {
                    link.addEventListener("shown.bs.collapse", () => {
                        simplebarInstance.recalculate();
                    });
                    link.addEventListener("hidden.bs.collapse", () => {
                        simplebarInstance.recalculate();
                    });
                });
            }

            const sidebarElement =
                document.getElementsByClassName("js-sidebar")[0];
            const sidebarToggleElement =
                document.getElementsByClassName("js-sidebar-toggle")[0];

            if (sidebarElement && sidebarToggleElement) {
                sidebarToggleElement.addEventListener("click", () => {
                    sidebarElement.classList.toggle("collapsed");

                    sidebarElement.addEventListener("transitionend", () => {
                        window.dispatchEvent(new Event("resize"));
                    });
                });
            }
        }

        return {
            initialize,
            index,
        }
    },

    /**
     * Index is provided by server through a laravel wrapper component
     */
    mounted() {
        this.initialize();

        /**
         * Set the active tab of SideBar component taking the right index from the server directly
         */
        this.setActive(this.index);

    },

    methods : {
        switchActive(event){
            let target = null;
            switch (event.target.tagName) {
                case 'SPAN':
                    target = event.target.parentNode.parentNode;
                    break;

                case ('A' || 'I'):
                    target = event.target.parentNode;
                    break;
            }

            if(!(target).classList.contains('active')){
                const sideElements = document.querySelectorAll('.sidebar-item');
                sideElements.forEach((elem) => {
                    if(elem.classList.contains('active')){
                        elem.classList.remove('active');
                    }
                });
                target.classList.add('active')
            }
        },

        setActive(index){
            const sideElements = document.querySelectorAll('.sidebar-item');
            sideElements.forEach((elem) => {
                if(elem.classList.contains('active')){
                    elem.classList.remove('active');
                }
            });
            sideElements[index].classList.add('active');
        }
    }
};
</script>

<style></style>

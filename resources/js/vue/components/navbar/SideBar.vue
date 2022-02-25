<template>
    <nav id="sidebar" class="sidebar js-sidebar">
        <div v-if="role == 'medico'" class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.html">
                <span class="align-middle">AdminKit</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">Pages</li>

                <li item="0" class="sidebar-item active">
                    <Link class="sidebar-link" href="/dashboard">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Dashboard</span>
                    </Link>
                </li>

                <li item="1" class="sidebar-item">
                    <Link class="sidebar-link" href="/profile">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">Profile</span>
                    </Link>
                </li>

                <li item="" class="sidebar-item">
                    <Link class="sidebar-link" href="/exams">
                        <i class="align-middle" data-feather="folder"></i>
                        <span>I miei esami</span>
                    </Link>
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
        <div v-if="role == 'operatore'" class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.html">
                <span class="align-middle">AdminKit</span>
            </a>
            <ul class="sidebar-nav">
                <li class="sidebar-header">Pages</li>

                <li item="0" class="sidebar-item active">
                    <Link class="sidebar-link" href="/dashboard">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Dashboard</span>
                    </Link>
                </li>

                <li item="1" class="sidebar-item">
                    <Link class="sidebar-link" href="/prenotazione">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">Prenota visita</span>
                    </Link>
                </li>

                <li item="" class="sidebar-item">
                    <Link class="sidebar-link" href="/aggiungi-paziente">
                        <i class="align-middle" data-feather="user-plus"></i>
                        <span>Aggiungi paziente</span>
                    </Link>
                </li>
                <li item="" class="sidebar-item">
                    <Link class="sidebar-link" href="/lista-pazienti">
                        <i class="align-middle" data-feather="users"></i>
                        <span>Lista pazienti</span>
                    </Link>
                </li>
                <li item="" class="sidebar-item">
                    <Link class="sidebar-link" href="/lista-prenotazioni">
                        <i class="align-middle" data-feather="users"></i>
                        <span>Lista Prenotazioni</span>
                    </Link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
import SimpleBar from "simplebar";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
    },

    props: ["index", "user", "role"],

    setup(props) {
        const index = props.index;
        const AuthUser = JSON.parse(props.user);

        const initialize = () => {
            //feather.replace();
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
        };

        return {
            initialize,
            index,
            AuthUser,
        };
    },

    /**
     * Index is provided by server through a laravel wrapper component
     */
    mounted() {
        this.initialize();

        window.addEventListener("child_component_index", (evt) => {
            this.setActive(evt.detail);
        });
    },

    methods: {
        setActive(index) {
            const sideElements = document.querySelectorAll(".sidebar-item");
            sideElements.forEach((elem) => {
                if (elem.classList.contains("active")) {
                    elem.classList.remove("active");
                }
            });
            sideElements[index].classList.add("active");
        },
    },
};
</script>

<style></style>

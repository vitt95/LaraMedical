<template>
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.html">
                <span class="align-middle">AdminKit</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">Pages</li>

                <li class="sidebar-item active">
                    <a class="sidebar-link" href="index.html">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="pages-profile.html">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">Profile</span>
                    </a>
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
export default {
    setup(props) {

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
            initialize
        }
    },

    mounted() {
        this.initialize();
    },

};
</script>

<style></style>

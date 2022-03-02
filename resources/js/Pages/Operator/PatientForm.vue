<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3"><strong>Aggiungi</strong> Paziente</h1>

                <form class="row g-3" method="post">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Nome</label>
                        <input
                            type="email"
                            class="form-control"
                            id="name"
                            name="name"
                        />
                    </div>
                    <div class="col-md-4">
                        <label for="lastname" class="form-label">Cognome</label>
                        <input
                            name="lastname"
                            type="text"
                            class="form-control"
                            id="lastname"
                        />
                    </div>
                    <div class="col-md-3">
                        <label for="lastname" class="form-label"
                            >Data di nascita</label
                        >
                        <input
                            name="datebirth"
                            type="text"
                            class="form-control"
                            id="datebirth"
                        />
                    </div>
                    <div class="col-md-6">
                        <label for="CF" class="form-label"
                            >Codice fiscale</label
                        >
                        <input
                            name="CF"
                            type="text"
                            class="form-control"
                            id="CF"
                        />
                    </div>
                    <div class="col-md-2">
                        <label for="sesso" class="form-label">Sesso</label>
                        <select
                            id="sesso"
                            name="sesso"
                            class="form-select"
                            aria-label="Default select example"
                        >
                            <option value="M" selected>Maschio</option>
                            <option value="F">Femmina</option>
                        </select>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="phoneNumber" class="form-label"
                                >Telefono</label
                            >
                            <input
                                name="phoneNumber"
                                type="text"
                                class="form-control"
                                id="phoneNumber"
                            />
                        </div>
                        <div class="col-md-4">
                            <label for="mobilePhone" class="form-label"
                                >Mobile</label
                            >
                            <input
                                name="mobilePhone"
                                type="text"
                                class="form-control"
                                id="mobilePhone"
                            />
                        </div>
                        <div class="col-md-4">
                            <label for="emailAddress" class="form-label"
                                >Email</label
                            >
                            <input
                                name="emailAddress"
                                type="text"
                                class="form-control"
                                id="emailAddress"
                            />
                        </div>
                        <div class="col-4">
                            <label for="inputAddress" class="form-label"
                                >Indirizzo</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="inputAddress"
                                placeholder="1234 Main St"
                            />
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label"
                                >Città</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="inputCity"
                            />
                        </div>
                        <div class="col-md-4 relative">
                            <label for="inputState" class="form-label"
                                >Nazione</label
                            >
                            <input
                                v-if="isLoading"
                                disabled
                                type="text"
                                class="form-control"
                                id="inputNation"
                                placeholder="Nazione"
                            />
                            <input
                                v-else
                                @blur="hideMenu($event)"
                                @focus="showMenu($event)"
                                @keyup="autoSuggest($event)"
                                type="text"
                                class="form-control"
                                id="inputNation"
                                placeholder="Nazione"
                            />

                            <div
                                v-if="!isLoading"
                                class="menu-selection col-5"
                                id="nations-menu"
                            >
                                <ul class="list-group">
                                    <template
                                        v-for="(n, index) in nations"
                                        :key="index"
                                    >
                                        <li
                                            @click="selectItem($event, n)"
                                            :index="index"
                                            class="list-item nat-item"
                                        >
                                            <span class="nat-image"
                                                ><img
                                                    :src="
                                                        'data:image/png;base64, ' +
                                                        n.flag
                                                    "
                                                    alt=""
                                            /></span>
                                            <span class="nat-name">{{
                                                n.name
                                            }}</span>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                        <div class="col-2 align-self-end">
                            <label for="inputZip" class="form-label">CAP</label>
                            <input
                                type="text"
                                class="form-control"
                                id="inputZip"
                            />
                        </div>
                    </div>

                    <div class="col-12">
                        <button
                            @click.prevent="submitForm()"
                            type="submit"
                            class="btn btn-primary"
                        >
                            Registra
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div v-if="errors !== null" class="col-12 errors">
            <ul>
                <li
                    class="list-item-error"
                    style="list-style: none"
                    v-for="(e, index) in errors.errors"
                    :key="index"
                >
                    <p class="text-danger">{{ e.pop() }}</p>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { validateInput, getFormData } from "../../theme/validation";
import intlTelInput from "intl-tel-input";
import { ref } from "@vue/reactivity";
import flatpickr from "flatpickr";

export default {
    props: ["csrf"],

    setup(props) {
        let isLoading = ref(true);
        let nations = ref();
        let errors = ref(null);
        let fullNations;
        let csrf = props.csrf;

        const init = () => {
            const inputMobile = document.getElementById("mobilePhone");
            const dateInput = document.getElementById("datebirth");
            const Italian = require("flatpickr/dist/l10n/it").default.it;

            flatpickr(dateInput, {
                locale: Italian,
                maxDate: "today",
            });

            intlTelInput(inputMobile, {
                initialCountry: "it",
                separateDialCode: true,
            });
        };

        return {
            init,
            isLoading,
            nations,
            fullNations,
            errors,
            csrf,
        };
    },

    mounted() {
        const event = new CustomEvent("child_component_index", { detail: 2 });
        dispatchEvent(event);

        this.init();

        axios.get(`${document.location.origin}/testnat`).then((resp) => {
            console.log(resp);
            this.isLoading = false;
            this.nations = resp.data;
            this.fullNations = resp.data;
        });
    },

    methods: {
        autoSuggest(ev) {
            this.nations = this.nations.filter((nation) =>
                nation.name
                    .toLowerCase()
                    .startsWith(ev.target.value.toLowerCase())
            );
            if (ev.target.value == "") {
                this.nations = this.fullNations;
            }

            if (ev.target.value !== "" && this.nations.length == 0) {
                console.log("Invalid country name");
                ev.target.style.border = "2px solid red";
            } else ev.target.style.border = "1px solid #ced4da";
        },

        showMenu(ev) {
            //console.log(ev.target);
            ev.target.nextSibling.style.opacity = 1;
            ev.target.nextSibling.style.display = "block";
        },

        hideMenu(ev) {
            ev.target.nextSibling.style.opacity = 0;
            setTimeout(() => {
                ev.target.nextSibling.style.display = "none";
            }, 300);
        },

        selectItem(ev, nation) {
            //console.log(ev.target);
            if (ev.target.tagName == "SPAN") {
                ev.target.parentNode.parentNode.parentNode.previousSibling.value =
                    nation.name;
            }

            if (ev.target.tagName == "LI") {
                ev.target.parentNode.parentNode.previousSibling.value =
                    nation.name;
            }
        },

        submitForm() {
            let input = getFormData();
            let validation = validateInput(input);
            if (!validation.passes()) {
                this.errors = validation.errors;
                setTimeout(() => {
                    this.errors = null;
                }, 3500);

                return;
            }
            let headers = {
                "X-CSRF-Token": this.csrf,
            };
            axios.post(
                `${document.location.origin}/patient/create`,
                input,
                headers
            );
        },
    },
};
</script>

<style lang="scss">
.nat-item {
    padding: 5px 10px;
    width: 100%;
    span {
        display: inline;
    }
    span.nat-name {
        margin-left: 10px;
    }
}

.menu-selection {
    box-shadow: 0.75px -1.25px 14.75px 2.75px #ddd;
    position: absolute;
    max-height: 230px;
    overflow-y: scroll;
    background: #fff;
    display: none;
    right: 0;
    ul {
        li {
            span {
                vertical-align: middle;
            }
            padding: 5px, 10px;
        }
        li:hover {
            background: #dddd;
            cursor: pointer;
        }
    }
}

.errors {
    ul {
        li {
            height: 40px;
            border-left: 3px solid red;
            margin-top: 6px;
            p {
                height: 100%;
                display: grid;
                align-items: center;
                margin-left: 10px;
                color: #fff;
            }
        }
    }
}
</style>

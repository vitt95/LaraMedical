<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3"><strong>Aggiungi</strong> Paziente</h1>

                <form class="row g-3" method="post">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-check form-check-inline align-end">
                                <input
                                    id="sexFemale"
                                    class="form-check-input"
                                    type="radio"
                                    name="flexRadioDefault"
                                    value="female"
                                />
                                <label
                                    class="form-check-label"
                                    for="flexRadioDefault2"
                                >
                                    Femmina
                                </label>
                            </div>
                            <div class="form-check form-check-inline align-end">
                                <label for="" class="form-label"></label>
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="flexRadioDefault"
                                    id="sexMale"
                                    value="male"
                                    checked
                                />
                                <label
                                    class="form-check-label"
                                    for="flexRadioDefault1"
                                >
                                    Maschio
                                </label>
                            </div>
                        </div>
                    </div>
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
                            placeholder="YYYY-dd-mm"
                        />
                    </div>
                    <div class="col-md-4">
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
                                >Regione</label
                            >
                            <div v-if="countries == null">
                                <input
                                    type="text"
                                    class="form-control"
                                    list="regioniList"
                                    disabled
                                />
                            </div>
                            <div v-else>
                                <input
                                    @input="italianProvinces($event)"
                                    type="text"
                                    class="form-control"
                                    list="regionList"
                                />
                                <datalist id="regionList">
                                    <template
                                        v-for="(country, index) in countries"
                                        :key="index"
                                    >
                                        <option>{{ country }}</option>
                                    </template>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label"
                                >Provincia</label
                            >
                            <div v-if="provinces == null">
                                <input
                                    type="text"
                                    class="form-control"
                                    list="provinceList"
                                    disabled
                                />
                            </div>
                            <div v-else>
                                <input
                                    @input="italianCities($event)"
                                    type="text"
                                    class="form-control"
                                    list="provinceList"
                                />
                                <datalist id="provinceList">
                                    <template
                                        v-for="(province, index) in provinces"
                                        :key="index"
                                    >
                                        <option :data-index="index">
                                            {{ province }}
                                        </option>
                                    </template>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-4 relative">
                            <label for="inputState" class="form-label"
                                >Città</label
                            >
                            <div v-if="cities == null">
                                <input
                                    type="text"
                                    class="form-control"
                                    list="provinceList"
                                    disabled
                                />
                            </div>
                            <div v-else>
                                <input
                                    type="text"
                                    class="form-control"
                                    list="citylist"
                                />
                                <datalist id="citylist">
                                    <template
                                        v-for="(city, index) in cities"
                                        :key="index"
                                    >
                                        <option :data-index="index">
                                            {{ city }}
                                        </option>
                                    </template>
                                </datalist>
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
                            v-if="!isUp"
                            @click.prevent="submitForm()"
                            type="submit"
                            class="btn btn-primary"
                        >
                            Registra
                        </button>
                        <button v-else class="btn btn-primary" disabled>
                            <span
                                class="spinner-border spinner-border-sm"
                                role="status"
                                aria-hidden="true"
                            ></span>
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

import {
    getItalianCountries,
    getItalianProvinces,
    getItalianCities,
} from "../../theme/async-services";

export default {
    props: ["csrf"],

    setup(props) {
        let isLoading = ref(true);
        let countries = ref(null);
        let errors = ref(null);
        let isUp = ref(false);
        let provinces = ref(null);
        let cities = ref(null);
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
            countries,
            cities,
            provinces,
            isUp,
            errors,
            csrf,
        };
    },

    mounted() {
        const event = new CustomEvent("child_component_index", { detail: 2 });
        dispatchEvent(event);

        getItalianCountries().then((resp) => {
            this.countries = resp.data;
        });

        this.init();
    },

    methods: {
        submitForm() {
            this.isUp = true;
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
            axios
                .post(
                    `${document.location.origin}/patient/create`,
                    input,
                    headers
                )
                .then((resp) => {
                    this.isUp = false;
                    if (resp.data.status == 201) {
                    }
                });
        },

        italianProvinces(ev) {
            if (ev.target.value != "") {
                getItalianProvinces(ev.target.value)
                    .then((resp) => {
                        this.provinces = resp;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            } else this.provinces = null;

        },

        italianCities(ev) {
            if (ev.target.value != "") {
                getItalianCities(ev.target.value)
                    .then((resp) => {
                        this.cities = resp;
                    })
                    .catch((error) => console.log(error));
            } else this.cities = null;
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

#datebirth {
    background: #fff;
}

.align-end {
    float: inline-end;
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

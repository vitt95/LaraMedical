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
                            <div v-if="reactProps.countries == null">
                                <input
                                    type="text"
                                    class="form-control"
                                    list="regioniList"
                                    disabled
                                    id="regione"
                                />
                            </div>
                            <div v-else>
                                <input
                                    @change="italianProvinces($event)"
                                    type="text"
                                    class="form-control"
                                    list="regionList"
                                    id="regione"
                                />
                                <datalist id="regionList">
                                    <template
                                        v-for="(
                                            country, index
                                        ) in reactProps.countries"
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
                            <div v-if="reactProps.provinces == null">
                                <input
                                    type="text"
                                    class="form-control"
                                    list="provinceList"
                                    disabled
                                    id="provincia"
                                />
                            </div>
                            <div v-else>
                                <input
                                    @change="italianCities($event)"
                                    type="text"
                                    class="form-control"
                                    list="provinceList"
                                    id="provincia"
                                />
                                <datalist id="provinceList">
                                    <template
                                        v-for="(
                                            province, index
                                        ) in reactProps.provinces"
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
                            <div v-if="reactProps.cities == null">
                                <input
                                    type="text"
                                    class="form-control"
                                    list="provinceList"
                                    disabled
                                    id="citta"
                                />
                            </div>
                            <div v-else>
                                <input
                                    type="text"
                                    class="form-control"
                                    list="citylist"
                                    @change="italianCap($event)"
                                    id="citta"
                                />
                                <datalist id="citylist">
                                    <template
                                        v-for="(
                                            item, index
                                        ) in reactProps.cities"
                                        :key="index"
                                    >
                                        <option :data-index="item.cap">
                                            {{ item.nome }}
                                        </option>
                                        <input
                                            type="hidden"
                                            :data-cap="
                                                item.nome.replace(/\s/g, '')
                                            "
                                            :value="item.cap"
                                        />
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
                                disabled
                            />
                        </div>
                    </div>

                    <div class="col-12">
                        <button
                            v-if="!reactProps.isUploading"
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
        <div v-if="reactProps.errors !== null" class="col-12 errors">
            <template v-for="(e, index) in reactProps.errors.errors" :key="index">
                <div class="alert alert-danger" role="alert">
                    {{e.pop()}}
                </div>
            </template>
        </div>
        <div v-if="reactProps.patientCreated == 'created'">
            <div class="alert alert-success" role="alert">
                Utente creato con successo !
            </div>
        </div>
        <div v-if="reactProps.patientCreated == 'duplicate'">
            <div class="alert alert-danger" role="alert">
                Utente già presente nel sistema !
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import {
    validateInput,
    getFormData,
    populateTestInput,
} from "../../theme/validation";
import { ref } from "@vue/reactivity";
import flatpickr from "flatpickr";


import {
    getItalianCountries,
    getItalianProvinces,
    getItalianCities,
} from "../../theme/async-services";

export default {
    props: ["csrf"],

    data() {
        return {};
    },

    setup(props) {
        let reactProps = ref({
            isLoading: true,
            isUploading: false,
            errors: null,
            countries: null,
            provinces: null,
            cities: null,
            patientCreated: null,
        });

        let csrf = props.csrf;

        const init = () => {
            const inputMobile = document.getElementById("mobilePhone");
            const dateInput = document.getElementById("datebirth");
            const Italian = require("flatpickr/dist/l10n/it").default.it;

            flatpickr(dateInput, {
                locale: Italian,
                maxDate: "today",
            });
        };

        return {
            init,
            csrf,
            reactProps,
        };
    },

    mounted() {
        const event = new CustomEvent("child_component_index", { detail: 2 });
        dispatchEvent(event);

        getItalianCountries().then((resp) => {
            this.reactProps.countries = resp.data;
        });

        this.init();

        populateTestInput();
    },

    methods: {
        submitForm() {
            this.reactProps.isUploading = true;
            let input = getFormData();
            let validation = validateInput(input);
            if (!validation.passes()) {
                this.reactProps.errors = validation.errors;
                this.reactProps.isUploading = false;
                setTimeout(() => {
                    this.reactProps.errors = false;
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
                    if (resp.data.status == 201) {
                        this.reactProps.patientCreated = 'created';
                    }

                    if (resp.data.status == 23000) {
                        this.reactProps.patientCreated = "duplicate";
                    }
                })
                .finally((resp) => {
                    this.reactProps.isUploading = false;
                    setTimeout(() => {
                        this.reactProps.patientCreated = null;
                    }, 2000);
                });
        },

        italianProvinces(ev) {
            const capRecipient = document.getElementById("inputZip");
            if (ev.target.value != "") {
                getItalianProvinces(ev.target.value)
                    .then((resp) => {
                        this.reactProps.provinces = resp;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            } else {
                this.reactProps.provinces = null;
                this.reactProps.cities = null;
                capRecipient.value = "";
            }
        },

        italianCities(ev) {
            const capRecipient = document.getElementById("inputZip");
            if (ev.target.value != "") {
                getItalianCities(ev.target.value)
                    .then((resp) => {
                        this.reactProps.cities = resp;
                    })
                    .catch((error) => console.log(error));
            } else {
                this.reactProps.cities = null;
                capRecipient.value = "";
            }
        },

        italianCap(ev) {
            const capRecipient = document.getElementById("inputZip");
            if (ev.target.value != "") {
                const cap = document.querySelector(
                    `[data-cap=${ev.target.value.replace(/\s/g, "")}]`
                ).value;
                capRecipient.value = cap;
            } else {
                capRecipient.value = "";
            }
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

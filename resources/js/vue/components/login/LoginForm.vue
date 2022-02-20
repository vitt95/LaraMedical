<template>
    <div class="card" style="width: 18rem">
        <div class="card-body">
            <h3 class="card-title">Login</h3>
            <form method="POST" action="/login">
                <input
                    id="cstoken"
                    type="hidden"
                    name="csrftoken"
                    :value="csrf_token"
                />
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"
                        >Indirizzo email</label
                    >
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        id="emaillogin"
                        aria-describedby="emailHelp"
                    />
                    <div id="emailHelp" class="form-text">
                        Non lo condivideremo mai con nessuno
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"
                        >Password</label
                    >
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        id="passwordlogin"
                    />
                </div>
                <div class="mb-3 form-check">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="exampleCheck1"
                    />
                    <label class="form-check-label" for="exampleCheck1"
                        >Ricordami</label
                    >
                </div>
                <button v-if="isLoading" class="btn btn-primary" disabled>
                    <span class="spinner-border spinner-border-sm"></span>
                </button>
                <button
                    v-else
                    @click.prevent="submit($event)"
                    id="submitform"
                    type="submit"
                    class="btn btn-primary"
                >
                    Invia
                </button>
                <p id="err-field" class="text-danger mt-3"></p>
            </form>
            <a href="/forgot-password"> Password dimenticata </a>
        </div>
        <div class="ml-4 error"></div>
    </div>
</template>

<script>
import axios from "axios";
import { ref } from "@vue/reactivity";

export default {
    props: ["csrf_token"],

    setup(props) {
        let isLoading = ref(false);
        const regexMail =
            "^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$";

        return {
            isLoading,
            regexMail,
        };
    },

    methods: {
        submit(ev) {
            let Email = document.getElementById("emaillogin").value.toString();
            if (!Email.match(this.regexMail)) {
                alert("Email irregolare");
                document.getElementById("emaillogin").value = "";
                return;
            }

            this.isLoading = true;

            const data = {
                    email: Email,
                    password: document.getElementById("passwordlogin").value,
                },
                headers = {
                    "X-CSRF-Token": document.getElementById("cstoken").value,
                };

            axios
                .post("/login", data, headers)
                .then((response) => {
                    if(response.status == 200){

                        window.location.href = `${document.location.origin}${response.data.home}`;
                    }
                })
                .catch((error) => {
                    this.isLoading = false;
                    document.getElementById("err-field").innerHTML =
                        error.response.data.message.toString();
                    setTimeout(
                        () =>
                            (document.getElementById("err-field").innerHTML =
                                ""),
                        3500
                    );
                });
        },
    },
};
</script>

<style></style>

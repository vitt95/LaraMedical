<template>
    <div class="card" style="width: 18rem">
        <div class="card-body">
            <h3 class="card-title">Login</h3>
            <form method="POST" action="/login">
                <input id="cstoken" type="hidden" name="csrftoken" :value="csrf_token">
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
                <button @click.prevent="submit($event)" id="submitform" type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>
</template>

<script>
import { stringifyStyle } from "@vue/shared";
import axios from "axios";

export default {

    props: ["csrf_token"],

    methods : {
        submit(ev){
            axios.post('/login', {
                email: document.getElementById('emaillogin').value,
                password : document.getElementById('passwordlogin').value,
                _token : document.getElementById('cstoken').value
            }).then(res => {
                console.log(res);
            }).catch(error => {
                console.log(error);
            })
        },
    }

};
</script>

<style></style>

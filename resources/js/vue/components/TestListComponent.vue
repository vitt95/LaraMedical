<template>
    <div v-if="!dataReady" class="col-12 text-center" >
        <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
    </div>
    <div v-else>
       <div v-for="(user) in reactiveUsers" :key="user.id">
           <test-component-vue
                :id="user.id"
                :name="user.name"
                :email="user.email"
                :username="user.username"
                :timer="user.timer"
            >
           </test-component-vue>
       </div>
    </div>
</template>

<script lang="ts">

import { defineComponent, onMounted, ref } from "vue"
import axios from 'axios';
import TestComponentVue from './TestComponent.vue';

interface User {
    id : number,
    name: string,
    username: string,
    email: string,
    timer: number
};

export default defineComponent({

    components: {
        TestComponentVue
    },

    setup(){
        let users = {} as User;
        let reactiveUsers = ref([users]);
        let dataReady = ref(false);

        onMounted(() => {
            axios.get<User[]>("https://jsonplaceholder.typicode.com/users")
                .then(response => {
                    reactiveUsers.value = response.data;
                    reactiveUsers.value.forEach((user) => {
                        user.timer = 5;
                    });
                    console.log(reactiveUsers);
                    console.log(dataReady.value);
                    dataReady.value = true;
                })
                .catch(() => {
                    console.log("Something went wrong");
                })
        });

        return {
            reactiveUsers,
            dataReady
        }
    }

})
</script>

<style>
.lds-ring {
  display: inline-block;
  position: relative;
  width: 30px;
  height: 30px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 24px;
  height: 24px;
  margin: 3px;
  border: 3px solid rgb(45, 72, 224);
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: rgb(45, 72, 224) transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>

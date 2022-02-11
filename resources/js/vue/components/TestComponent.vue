<template>
    <div class="card" style="width: 18rem">
        <div class="card-body">
            <div v-if="!timeIsOver" class="col-md-12 text-center">
                {{timer}}
            </div>
            <div v-else>
                {{id}}
                {{name}}
                {{username}}
                {{email}}
            </div>
        </div>
        <div class="text-center col-md-12">
            <button @click="Test" class="btn btn-primary outline-none">Press me</button>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, onMounted, reactive } from "@vue/runtime-core";
import axios from "axios";
import { ref } from "vue";

export default defineComponent({

    props : ["id", "name", "username", "email", "dataReady", "timer"],

    setup(props, context){
        let timeIsOver = ref(false);
        let timer = ref(props.timer);

        onMounted(() => {
            startTimer();
        })

        function startTimer(){
            if(timer.value > 0){
                timer.value--;
                console.log(timer.value);
                console.log(timeIsOver.value);
                setTimeout(() => startTimer(), 1000)
            }

            if(timer.value == 0){
                timeIsOver.value = true;
            }
        }

        return {
            timeIsOver,
            timer
        }
    },

    methods: {
        Test(){
            this.timer = 5;
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

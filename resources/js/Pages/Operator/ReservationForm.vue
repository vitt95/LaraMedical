<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3"><strong>Prenota</strong> Visita</h1>
                <div class="row g-3">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label
                                for="exampleFormControlInput1"
                                class="form-label"
                                >Email address</label
                            >
                            <input
                                type="email"
                                class="form-control"
                                id="exampleFormControlInput1"
                                placeholder="name@example.com"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import flatpickr from "flatpickr";

export default {


    mounted() {
        const event = new CustomEvent("child_component_index", { detail: 1 });
        dispatchEvent(event);

        function formatDate(date, format) {
            const map = {
                mm: date.getMonth() + 1,
                dd: date.getDate(),
                yy: date.getFullYear().toString().slice(-2),
                yyyy: date.getFullYear()
            }

            return format.replace(/mm|dd|yy|yyy/gi, matched => map[matched])
        }

        const timeElapsed = Date.now();
        const today = new Date(timeElapsed);
        console.log(today.toLocaleDateString());

        axios.get(`${document.location.origin}/api/reservation/available/${formatDate(today, 'yyyy-mm-dd')}`)
    },
};
</script>

<style></style>

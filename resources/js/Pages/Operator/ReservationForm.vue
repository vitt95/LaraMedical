<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3"><strong>Prenota</strong> Visita</h1>
                <div class="col-md-5">
                    <div id="calendar-div"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import flatpickr from "flatpickr";
import { testIndexedDb } from "../../theme/indexeddb";
import { getAvailableDayForService } from "../../theme/date-formatter";
import { buildCalendar } from "../../theme/calendar/calendar";

export default {
    mounted() {
        const event = new CustomEvent("child_component_index", { detail: 1 });
        dispatchEvent(event);

        getAvailableDayForService().then((resp) => console.log(resp));

        buildCalendar("calendar-div", {
            disableWeekend: false,
            responsive: true,
        });
    },
};
</script>

<style lang="scss">

</style>

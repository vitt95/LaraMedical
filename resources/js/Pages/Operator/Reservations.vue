<template>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3"><strong>Lista</strong> Prenotazioni</h1>
                <table id="reservation-table-id" class="display responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>Ora</th>
                            <th>Tipo visita</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>


import { initReservationsTable, clearTableBeforeRerendering } from "../../theme/datatables-boot";

export default {

    mounted(){
        initReservationsTable("#reservation-table-id");
        const event = new CustomEvent("child_component_index", { detail: 4 });
        dispatchEvent(event);
    },

    /**
     * Need to clear and destroy previous table before re-rendering
     */
    beforeUnmount(){
        clearTableBeforeRerendering("#reservation-table-id");
    }
};
</script>

<style lang="scss">

</style>

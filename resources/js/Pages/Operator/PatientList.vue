<template>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3"><strong>Lista</strong> Pazienti</h1>
                <table id="table_id" class="display responsive">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>Numero</th>
                            <th>Email</th>
                            <th>Codice fiscale</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

import { initPatientsTable, clearTableBeforeRerendering } from "../../theme/datatables-boot";

export default {

    mounted() {
        initPatientsTable("#table_id");

        const event = new CustomEvent("child_component_index", { detail: 3 });
        dispatchEvent(event);
    },

    beforeUnmount() {
        clearTableBeforeRerendering("#table_id");
    },
};
</script>

<style lang="scss"></style>

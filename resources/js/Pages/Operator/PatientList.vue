<template>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3">Lista Pazienti</h1>
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
import $ from "jquery";
import "datatables.net/js/jquery.dataTables";
import "datatables.net-bs5";
import "datatables.net-responsive";
import "datatables.net-responsive-bs5";

export default {
    setup(props) {
        const init = () => {
            $("#table_id").DataTable({
                autoWidth: true,
                deferRender: true,
                responsive: {
                    breakpoints: [
                        { name: "desktop", width: Infinity },
                        { name: "meddesktop", width: 1480 },
                        { name: "smalldesktop", width: 1280 },
                        { name: "medium", width: 1188 },
                        { name: "tabletl", width: 1024 },
                        { name: "btwtabllandp", width: 848 },
                        { name: "tabletp", width: 768 },
                        { name: "mobilel", width: 480 },
                        { name: "mobilep", width: 320 },
                    ],
                },
                columnDefs: [
                    {
                        className: "desktop meddesktop",
                        targets: [0, 1, 2, 3, 4],
                    },
                    { className: "smalldesktop", targets: [0, 1, 2, 3] },
                    { className: "medium", targets: [0, 2, 3] },
                    { className: "tabletl", targets: [0, 3] },
                ],
                ajax: {
                    url: `${document.location.origin}/execute`,
                    dataSrc: "data",
                },
                language: {
                    url: `${document.location.origin}/dtlanguageit`,
                },
                compact: true,
                columns: [
                    { data: "name" },
                    { data: "lastname" },
                    { data: "phone" },
                    { data: "email" },
                    { data: "fiscal_code" },
                ],
            });
        };

        return {
            init,
        };
    },

    mounted() {
        this.init();

        const event = new CustomEvent("child_component_index", { detail: 3 });
        dispatchEvent(event);
    },

    beforeUnmount() {
        let table = $("#table_id").DataTable();
        $(table).remove();
        table.clear().destroy();
    },
};
</script>

<style lang="scss"></style>

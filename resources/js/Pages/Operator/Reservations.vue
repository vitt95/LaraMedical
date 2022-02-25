<template>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3">Lista Prenotazioni</h1>
                <table id="reservation-table-id" class="display responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Data</th>
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
import $ from "jquery";
import "datatables.net/js/jquery.dataTables";
import "datatables.net-bs5";
import "datatables.net-responsive";
import "datatables.net-responsive-bs5";

export default {

    setup(props){
        const init = () => {
            $('#reservation-table-id').DataTable({
                autoWidth: true,
                compact: true,
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
                language : {
                    url: `${document.location.origin}/dtlanguageit`,
                },
                ajax : {
                    url: `${document.location.origin}/reservations`,
                    dataSrc: "data",
                },
                columns : [
                  {data: "id"},
                  {data: "name"},
                  {data: "date"},
                  {data: "type"},
                ]
            });
        };

        return {
            init
        }
    },

    mounted(){
        this.init();
        const event = new CustomEvent("child_component_index", { detail: 4 });
        dispatchEvent(event);
    }
};
</script>

<style lang="scss">

</style>

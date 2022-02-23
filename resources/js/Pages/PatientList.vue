<template>
    <div class="col-12 col-lg-8 col-xxl-9 d-flex">
        <div class="card">
            <div class="card-body">
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
                    {className: "desktop meddesktop", targets: [0,1,2,3,4]},
                    {className: "smalldesktop", targets: [0,1,2,3] },
                    {className: "medium", targets: [0,2,3]},
                    {className: "tabletl", targets: [0,3]}

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
};
</script>

<style lang="scss">
table.dataTable {
    width: 100%;
    margin: 0 auto;
    clear: both;
    border-collapse: separate;
    border-spacing: 0;
    /*
   * Header and footer styles
   */
    /*
   * Body styles
   */
}

table.dataTable td {
    font-size: 0.86em;
}

table.dataTable thead th,
table.dataTable tfoot th {
    font-weight: bold;
}
table.dataTable thead th,
table.dataTable thead td {
    padding: 10px 18px;
    border-bottom: 1px solid #111111;
}
table.dataTable thead th:active,
table.dataTable thead td:active {
    outline: none;
}
table.dataTable tfoot th,
table.dataTable tfoot td {
    padding: 10px 18px 6px 18px;
    border-top: 1px solid #111111;
}
table.dataTable thead .sorting,
table.dataTable thead .sorting_asc,
table.dataTable thead .sorting_desc,
table.dataTable thead .sorting_asc_disabled,
table.dataTable thead .sorting_desc_disabled {
    cursor: pointer;
    *cursor: hand;
    background-repeat: no-repeat;
    background-position: center right;
}

table.dataTable tbody tr {
    background-color: #ffffff;
}
table.dataTable tbody tr.selected {
    background-color: #b0bed9;
}
table.dataTable tbody th,
table.dataTable tbody td {
    padding: 8px 10px;
}
table.dataTable.row-border tbody th,
table.dataTable.row-border tbody td,
table.dataTable.display tbody th,
table.dataTable.display tbody td {
    border-top: 1px solid #dddddd;
}
table.dataTable.row-border tbody tr:first-child th,
table.dataTable.row-border tbody tr:first-child td,
table.dataTable.display tbody tr:first-child th,
table.dataTable.display tbody tr:first-child td {
    border-top: none;
}
table.dataTable.cell-border tbody th,
table.dataTable.cell-border tbody td {
    border-top: 1px solid #dddddd;
    border-right: 1px solid #dddddd;
}
table.dataTable.cell-border tbody tr th:first-child,
table.dataTable.cell-border tbody tr td:first-child {
    border-left: 1px solid #dddddd;
}
table.dataTable.cell-border tbody tr:first-child th,
table.dataTable.cell-border tbody tr:first-child td {
    border-top: none;
}
table.dataTable.stripe tbody tr.odd,
table.dataTable.display tbody tr.odd {
    background-color: #f9f9f9;
}
table.dataTable.stripe tbody tr.odd.selected,
table.dataTable.display tbody tr.odd.selected {
    background-color: #acbad4;
}
table.dataTable.hover tbody tr:hover,
table.dataTable.display tbody tr:hover {
    background-color: #f6f6f6;
}
table.dataTable.hover tbody tr:hover.selected,
table.dataTable.display tbody tr:hover.selected {
    background-color: #aab7d1;
}
table.dataTable.order-column tbody tr > .sorting_1,
table.dataTable.order-column tbody tr > .sorting_2,
table.dataTable.order-column tbody tr > .sorting_3,
table.dataTable.display tbody tr > .sorting_1,
table.dataTable.display tbody tr > .sorting_2,
table.dataTable.display tbody tr > .sorting_3 {
    background-color: #fafafa;
}
table.dataTable.order-column tbody tr.selected > .sorting_1,
table.dataTable.order-column tbody tr.selected > .sorting_2,
table.dataTable.order-column tbody tr.selected > .sorting_3,
table.dataTable.display tbody tr.selected > .sorting_1,
table.dataTable.display tbody tr.selected > .sorting_2,
table.dataTable.display tbody tr.selected > .sorting_3 {
    background-color: #acbad5;
}
table.dataTable.display tbody tr.odd > .sorting_1,
table.dataTable.order-column.stripe tbody tr.odd > .sorting_1 {
    background-color: #f1f1f1;
}
table.dataTable.display tbody tr.odd > .sorting_2,
table.dataTable.order-column.stripe tbody tr.odd > .sorting_2 {
    background-color: #f3f3f3;
}
table.dataTable.display tbody tr.odd > .sorting_3,
table.dataTable.order-column.stripe tbody tr.odd > .sorting_3 {
    background-color: whitesmoke;
}
table.dataTable.display tbody tr.odd.selected > .sorting_1,
table.dataTable.order-column.stripe tbody tr.odd.selected > .sorting_1 {
    background-color: #a6b4cd;
}
table.dataTable.display tbody tr.odd.selected > .sorting_2,
table.dataTable.order-column.stripe tbody tr.odd.selected > .sorting_2 {
    background-color: #a8b5cf;
}
table.dataTable.display tbody tr.odd.selected > .sorting_3,
table.dataTable.order-column.stripe tbody tr.odd.selected > .sorting_3 {
    background-color: #a9b7d1;
}
table.dataTable.display tbody tr.even > .sorting_1,
table.dataTable.order-column.stripe tbody tr.even > .sorting_1 {
    background-color: #fafafa;
}
table.dataTable.display tbody tr.even > .sorting_2,
table.dataTable.order-column.stripe tbody tr.even > .sorting_2 {
    background-color: #fcfcfc;
}
table.dataTable.display tbody tr.even > .sorting_3,
table.dataTable.order-column.stripe tbody tr.even > .sorting_3 {
    background-color: #fefefe;
}
table.dataTable.display tbody tr.even.selected > .sorting_1,
table.dataTable.order-column.stripe tbody tr.even.selected > .sorting_1 {
    background-color: #acbad5;
}
table.dataTable.display tbody tr.even.selected > .sorting_2,
table.dataTable.order-column.stripe tbody tr.even.selected > .sorting_2 {
    background-color: #aebcd6;
}
table.dataTable.display tbody tr.even.selected > .sorting_3,
table.dataTable.order-column.stripe tbody tr.even.selected > .sorting_3 {
    background-color: #afbdd8;
}
table.dataTable.display tbody tr:hover > .sorting_1,
table.dataTable.order-column.hover tbody tr:hover > .sorting_1 {
    background-color: #eaeaea;
}
table.dataTable.display tbody tr:hover > .sorting_2,
table.dataTable.order-column.hover tbody tr:hover > .sorting_2 {
    background-color: #ececec;
}
table.dataTable.display tbody tr:hover > .sorting_3,
table.dataTable.order-column.hover tbody tr:hover > .sorting_3 {
    background-color: #efefef;
}
table.dataTable.display tbody tr:hover.selected > .sorting_1,
table.dataTable.order-column.hover tbody tr:hover.selected > .sorting_1 {
    background-color: #a2aec7;
}
table.dataTable.display tbody tr:hover.selected > .sorting_2,
table.dataTable.order-column.hover tbody tr:hover.selected > .sorting_2 {
    background-color: #a3b0c9;
}
table.dataTable.display tbody tr:hover.selected > .sorting_3,
table.dataTable.order-column.hover tbody tr:hover.selected > .sorting_3 {
    background-color: #a5b2cb;
}
table.dataTable.no-footer {
    border-bottom: 1px solid #111111;
}
table.dataTable.nowrap th,
table.dataTable.nowrap td {
    white-space: nowrap;
}
table.dataTable.compact thead th,
table.dataTable.compact thead td {
    padding: 4px 17px;
}
table.dataTable.compact tfoot th,
table.dataTable.compact tfoot td {
    padding: 4px;
}
table.dataTable.compact tbody th,
table.dataTable.compact tbody td {
    padding: 4px;
}

table.dataTable th,
table.dataTable td {
    box-sizing: content-box;
}

@import "~datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css";
</style>

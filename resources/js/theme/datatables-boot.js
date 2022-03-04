/**
 * Datatable boot repo
 */
import $ from "jquery";
import "datatables.net/js/jquery.dataTables";
import "datatables.net-bs5";
import "datatables.net-responsive";
import "datatables.net-responsive-bs5";

/**
 * Patients table boot function
 * @param {string} tableId
 */
function initPatientsTable(tableId){
    $(tableId).DataTable({
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
}

/**
 * Reservation table boot function
 * @param {string} tableId Table id
 */

function initReservationsTable(tableId){
    $(tableId).DataTable({
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
          {data: "time"},
          {data: "type"},
        ]
    });
}

/**
 * Clear the current viewed table preventing the overwriting bug
 * @param {string} tableId
 */
function clearTableBeforeRerendering(tableId){
    let table = $(tableId).DataTable();
    table.clear();
    table.destroy();
}

export{
    initPatientsTable,
    initReservationsTable,
    clearTableBeforeRerendering
}

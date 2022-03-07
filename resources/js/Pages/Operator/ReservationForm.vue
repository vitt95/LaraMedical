<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3"><strong>Prenota</strong> Visita</h1>
                <div id="calendar-div">
                <!--<table class="table calendar-table responsive">
                    <div class="row">
                        <caption>
                            June
                        </caption>
                    </div>
                    <colgroup class="weekday" span="5"></colgroup>
                    <colgroup class="weekend" span="2"></colgroup>
                    <thead>
                        <tr>
                            <th>Lun</th>
                            <th>Mar</th>
                            <th>Mer</th>
                            <th>Giov</th>
                            <th>Ven</th>
                            <th>Sab</th>
                            <th>Dom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><div class="day">1</div></td>
                            <td class="disabled" disabled><div class="day">2</div></td>
                            <td><div class="day">3</div></td>
                            <td><div class="day">4</div></td>
                            <td><div class="day">5</div></td>
                            <td class="birthday">
                                <div class="day">6</div>
                                <div class="notes">It's my birthday!</div>
                            </td>
                            <td><div class="day">7</div></td>
                        </tr>
                        <tr>
                            <td><div class="day">8</div></td>
                            <td><div class="day">9</div></td>
                            <td><div class="day">10</div></td>
                            <td><div class="day">11</div></td>
                            <td><div class="day">12</div></td>
                            <td><div class="day">13</div></td>
                            <td><div class="day">14</div></td>
                        </tr>
                        <tr>
                            <td><div class="day">15</div></td>
                            <td><div class="day">16</div></td>
                            <td><div class="day">17</div></td>
                            <td><div class="day">18</div></td>
                            <td><div class="day">19</div></td>
                            <td><div class="day">20</div></td>
                            <td><div class="day">21</div></td>
                        </tr>
                        <tr>
                            <td><div class="day">22</div></td>
                            <td><div class="day">23</div></td>
                            <td><div class="day">24</div></td>
                            <td><div class="day">25</div></td>
                            <td><div class="day">26</div></td>
                            <td><div class="day">27</div></td>
                            <td><div class="day">28</div></td>
                        </tr>
                        <tr>
                            <td><div class="day">29</div></td>
                            <td><div class="day">30</div></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import flatpickr from "flatpickr";
import { testIndexedDb } from "../../theme/indexeddb";
import { getAvailableDayForService } from "../../theme/date-formatter";
import {buildCalendar} from "../../theme/calendar";

export default {
    mounted() {
        const event = new CustomEvent("child_component_index", { detail: 1 });
        dispatchEvent(event);

        getAvailableDayForService().then((resp) => console.log(resp));

        buildCalendar("calendar-div", {
            disableWeekend: true,

        });
    },
};
</script>

<style lang="scss">

@mixin disabled {
    background-color: #9D9393;
    cursor: not-allowed;
    pointer-events: all !important;
}

.calendar-table.table>:not(:first-child) {
	border-top: none !important;
}

.calendar-table.table {
    border-collapse: none !important;
}

.calendar-table.table thead, .calendar-table.table tbody, .calendar-table.table tfoot,
.calendar-table.table tr, .calendar-table.table td, .calendar-table.table th {
	border-color: none;
}

table.calendar-table{
    border-collapse: unset !important;
    border-spacing: 3px;
}

.calendar-table {

    .table thead, .table tbody, .table tfoot, .table tr, .table td, .table th {
        border-color: none;
    }

    tr {
        border: 1px solid #000 !important;
    }

    caption {
        text-align: center;
        font-size: 1.6em;
        color: #000;
        caption-side: top;
    }

    th {
        text-align: center;
    }

    td {
        width: 7em;
        height: 7em;
        padding: 5px;
        vertical-align: top;
        position: relative;
        border: 1px solid #000;
        .day {
            position: absolute;
            top: 8px;
            right: 8px;
            font-size: 11pt;
            color: #000;
        }
    }

    td.disabled {
        @include disabled();
    }

    .weekend.disabled {
        cursor: not-allowed;
        pointer-events: all !important;
        background: #dddddd;
    }

    #iconPrevCalendar {
        margin-right: 30px;
    }

    #iconNextCalendar {
        margin-left: 30px;
    }

    #iconNextCalendar, #iconPrevCalendar {
        :hover{
            cursor: pointer;
        }
    }

}
</style>

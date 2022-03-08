/**
 * Self made calendar for this project
 * I'va watched pre-built alternatives but nothing in open source
 * project hitted me.
 *
 * Full calendar inspired.
 */

 import resizeCalendar from "./responsive.js";

 const MONTH = 11;

 const months = [
     "Gennaio",
     "Febbraio",
     "Marzo",
     "Aprile",
     "Maggio",
     "Giugno",
     "Luglio",
     "Agosto",
     "Settembre",
     "Ottobre",
     "Novembre",
     "Dicembre",
 ];

 const days = [
     "Lunedì",
     "Martedì",
     "Mercoledì",
     "Giovedì",
     "Venerdì",
     "Sabato",
     "Domenica",
 ];





 const shortDays = ["Lun", "Mar", "Mer", "Giov", "Ven", "Sab", "Dom"];

 const date = new Date();
 const __day = date.getDate();
 const __month = date.getMonth();
 const __year = date.getFullYear();

 /**
  * Add event to buttons for interaction
  * @param {*} tableId
  * @param {*} params
  */
 const addEventToButtons = (tableId, params) => {
     const iconPrevButton = document.getElementById("iconPrevCalendar");
     const iconNextButton = document.getElementById("iconNextCalendar");

     iconPrevButton.addEventListener("click", () => {
         params.month = params.month > 0 ? params.month - 1 : MONTH;
         createTableBody(tableId, params);
     });

     iconNextButton.addEventListener("click", () => {
         params.month = params.month < MONTH ? params.month + 1 : 0;
         createTableBody(tableId, params);
     });
 };

 /**
  * This method builds the Days row up to the calendar.
  * If ShortDays is true , short days will be shown
  * @param {*} hookId
  * @param {*} config
  */
 const generateDaysRow = (hookId, config = { shortDays: false }) => {
     let hook = document.getElementById(hookId);
     for (let i = 0; i < days.length; i++) {
         let th = document.createElement("th");
         th.innerText = config.shortDays ? shortDays[i] : days[i];
         th.classList.add("dayth");
         hook.append(th);
     }
 };

 /**
  * This method generates the main part of the calendar.
  * It provide days markup and days display logic computation
  * @param {*} params
  */
 const generateTableCells = (
     params = {
         daysInMonth,
         paddingDays,
         currentDay,
         daysPrevMonth,
         nextMonthDayDifference,
     },
     config
 ) => {
     let nextCounter = 0;
     let preCounter = params.daysPrevMonth - params.paddingDays;
     let tb = document.getElementById("calTbody");

     for (
         let d = 1;
         d <
         params.daysInMonth + params.paddingDays + params.nextMonthDayDifference;
         d++
     ) {
         let date = new Date();
         date.setFullYear(config.year, config.month, d-1);
         //console.log(date.toLocaleDateString());
         if (d % days.length == 1) {
             let tr = document.createElement("tr");
             tr.classList.add("tr-body");
             tb.append(tr);
         }
         let row = document.getElementsByClassName("tr-body");
         let td = document.createElement("td");
         td.classList.add('calendarTd')
         td.setAttribute('data-date', date.toLocaleDateString())
         let daydiv;
         if (
             d > params.paddingDays &&
             d - params.paddingDays <= params.daysInMonth
         ) {
             daydiv = `<div class="day">${
                 d - params.paddingDays
             }</div>`;
         } else if (d <= params.paddingDays) {
             daydiv = `<div class="day">${++preCounter}</div>`;
             td.setAttribute("disabled", "true");
             td.classList.add("disabled");
         } else if (d - params.paddingDays > params.daysInMonth) {
             daydiv = `<div class="day">${++nextCounter}</div>`;
             td.setAttribute("disabled", "true");
             td.classList.add("disabled");
         }
         td.innerHTML = daydiv;
         row[row.length - 1].append(td);
     }
 };

 /**
  * Initialization of main part of calendar table.
  * It return markup and this will be mounted by buildTableMarkup method.
  * @param {*} config
  * @returns {HTMLTableElement}
  */
 const buildCalendarFundamentals = (
     month,
     config
 ) => {
     let thead = `<thead>
     <tr id="calendarDaysRow"></tr>
 </thead>`;

     let iconPrev = config.iconPrev == "default" ? '<i class="bi bi-caret-left-square-fill"></i>' : config.iconPrev;
     let iconNext = config.iconNext == "default" ? '<i class="bi bi-caret-right-square-fill"></i>' : config.iconNext;
     let caption = `<caption>
 <small id="iconPrevCalendar">
     ${iconPrev}
 </small>
 ${months[month]}
 <small id="iconNextCalendar">
     ${iconNext}
 </small>
 </caption>
 <colgroup class="weekday" span="5"></colgroup>
 <colgroup class="weekend ${
         config.disableWeekend == true ? "disabled" : ""
     }" span="2"></colgroup>
 `;

     let tbody = `<tbody id="calTbody" class="calendarTbody">

 </tbody>`;

     const html = document.createElement("table");
     html.classList.add("table", "calendar-table", "responsive");

     html.innerHTML = `
 ${caption}
 ${thead}
 ${tbody}
 `;

     return html;
 };

 const buildTableMarkup = (
     tableId,
     params = {
         daysInMonth,
         paddingDays,
         currentDay,
         dateString,
         daysPrevMonth,
         firstDay,
         nextMonthDayDifference,
         year,
         month,
         day
     },
     config
 ) => {
     let tableDiv = document.getElementById(tableId);

     // Remove all child if any.
     while (tableDiv.hasChildNodes()) {
         tableDiv.removeChild(tableDiv.lastChild);
     }

     // Build calendar fundamentals
     let html = buildCalendarFundamentals(params.month, config);

     // Hook fundamentals to mount point
     tableDiv.insertAdjacentElement("afterbegin", html);

     // Generate days row
     generateDaysRow("calendarDaysRow", {
         shortDays: true,
     });
     generateTableCells(params, config);

     if(config.responsive == true){
        resizeCalendar(tableId);
     }
 };

 /**
  * Main wrapper method.
  * Responsability of this method is to call all methods in correct order
  * to build entire calendar.
  * @param {*} tableId
  * @param {*} config
  */

 const createTableBody = (
     tableId,
     config
 ) => {
     console.log(config);
     let year = config.year == null ? __year : config.year;
     let month = config.month == null ? __month : config.month;
     let day = config.day == null ? __day : config.day;

     /**
      * First day of the current month
      * @var {Date} firstDay
      */
     let firstDay = new Date(year, month, 1);

     /**
      * Number of days in the current month
      * @var {Date} daysInMonth
      */
     let daysInMonth = new Date(year, month + 1, 0).getDate();

     /**
      * Number of days of previous month
      * @var {Date} daysPrevMonth
      */
     let daysPrevMonth = new Date(year, month, 0).getDate();

     /**
      * Calendar matrix size
      * @var {int} calendarSize
      */
     const calendarSize = days.length * 6;

     /**
      * Date in string format of the first day of the current month.
      * @var {string} dateString
      */
     let dateString = firstDay.toLocaleDateString("it-IT", {
         weekday: "long",
         year: "numeric",
         month: "numeric",
         day: "numeric",
     });

     /**
      * Current day of the current month.
      * @var {string} currentDay
      */
     let currentDay = dateString.split(" ")[0];

     /**
      * Padding days at current day of the previous month.
      * @var {int} paddingDays
      */
     let paddingDays = days.indexOf(
         currentDay.charAt(0).toUpperCase() + currentDay.slice(1)
     );

     /**
      * Integer difference between last day of the current month
      * and first [0-6] days of the next month.
      * @var {int} nextMonthDayDifference
      */
     let nextMonthDayDifference = calendarSize - (daysInMonth + paddingDays - 1);

     let params = {
         daysInMonth,
         paddingDays,
         currentDay,
         dateString,
         daysPrevMonth,
         firstDay,
         nextMonthDayDifference,
         year,
         day,
         month,
     };

     buildTableMarkup(tableId, params, config);
     addEventToButtons(tableId, config);
 };

 /**
  * Build calendar method for bootstrapping the calendar.
  * @param {*} tableId
  * @param {*} config
  */
 const buildCalendar = (
     tableId,
     {
        disableWeekend = true,
        disableCol = [],
        iconNext = "default",
        iconPrev = "default",
        responsive = false,
        year = __year,
        month = __month,
        day = __day
    } = {}
 ) => {
    let config = {
        responsive,
        disableWeekend,
        iconNext,
        iconPrev,
        year,
        month,
        day,
        disableCol
    }

    createTableBody(tableId, config);
 };

 export { buildCalendar };

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
import esLocale from '@fullcalendar/core/locales/es';
import momentPlugin, { toMoment } from '@fullcalendar/moment';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById("calendar");

    let modal = document.querySelector('#fecha');

    let calendar = new Calendar(calendarEl, {
        locale: esLocale,
        plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin, momentPlugin],
        initialView: 'dayGridMonth',
        displayEventTime: true,
        selectable: true,
        selectMirror: true,
        dateClick: function (info) {
            /* let date = new Date(info.dateStr); */
            /* Error con el plugin Moment de FullCalendar */
            let time = toMoment(info.date, calendar);
            modal.value = info.dateStr;
            console.log(time);
            $("#reservation").modal();
        },
        /* unselect: function (info, view) {
            $.ajax({
                dataType: "json",
                url: "api/reservations",
                success: function (result) {
                    console.log($('#fecha').val());
                    console.log($('input[name*="start"]').val());
                    events: result;
                    calendar.render();
                }
            });
        }, */
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        events: 'api/reservations'
        // go ahead with other parameters
    });

    calendar.render();
});

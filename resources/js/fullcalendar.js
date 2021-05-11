import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
import esLocale from '@fullcalendar/core/locales/es';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById("calendar");

    let modal = document.querySelector('#fecha');

    let calendar = new Calendar(calendarEl, {
        locale: esLocale,
        plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        displayEventTime: true,
        selectable: true,
        dateClick: function (info) {
            modal.value = info.dateStr;
            $("#reservation").modal();
        },
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        events: 'calendarReservations'
        // go ahead with other parameters
    });

    calendar.render();
});

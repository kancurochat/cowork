import { Calendar } from '@fullcalendar/core';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import esLocale from '@fullcalendar/core/locales/es';
import momentPlugin, { toMoment } from '@fullcalendar/moment';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById("calendar");

    let fecha = document.querySelector('#fecha');
    let start = document.querySelector('#start_time');
    let end = document.querySelector('#end_time');

    let calendar = new Calendar(calendarEl, {
        locale: esLocale,
        plugins: [timeGridPlugin, interactionPlugin, momentPlugin],
        initialView: 'timeGridWeek',
        displayEventTime: true,
        selectable: true,
        selectMirror: true,
        defaultAllDay: false,
        allDaySlot: false,
        selectOverlap: false,
        slotMinTime: document.querySelector('#open_time').innerHTML,
        slotMaxTime: document.querySelector('#close_time').innerHTML,
        expandRows: true,
        select: function (info) {
            // Defino las fechas de inicio y la hora de salida
            let startDate = new Date(info.startStr);
            let start_time = toMoment(startDate, calendar);
            let endDate = new Date(info.endStr);
            let end_time = toMoment(endDate, calendar).format('HH:mm');


            fecha.value = start_time.format('YYYY-MM-DD');
            start.value = start_time.format('HH:mm');
            end.value = end_time;

            $("#reservation").modal();
        },
        selectAllow: function(info){
            if (info.end.getDate() == info.start.getDate()) {
                return true;
            }
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
            right: ''
        },
        events: '/api/reservations/' + window.location.href.substr(-1)
        // go ahead with other parameters
    });

    calendar.render();
});


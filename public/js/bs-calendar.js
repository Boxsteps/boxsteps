/**
 *
 * Calendario para Boxsteps
 *
 * Autor: Wolfgang Dielingen
 *
 */

function bsCalendar(id) {

    var defaultOptions = {
        lang: 'es',
        defaultView: 'basicWeek',
        minTime: "06:30:00",
        maxTime: "18:00:00",
        timeFormat: 'hh:mm a',
        axisFormat: 'hh:mm a',
        buttonIcons: {
            prev: 'prev fa-angle-left',
            next: 'next fa-angle-right',
        },
        height: 408,
        allDaySlot: false,
        editable: false,
        eventLimit: false,
        droppable: true
    };

    var fc = $(id).fullCalendar(defaultOptions);

    function bsCalendarRecreate(screenWidth) {
        if (screenWidth < 700) {
            defaultOptions.defaultView = 'basicDay';
        } else {
            defaultOptions.defaultView = 'basicWeek';
        }
        fc.fullCalendar('destroy');
        fc.fullCalendar(defaultOptions);
        $('.fc-button-group').css('float', 'right');
    }

    $(window).resize(function () {
        bsCalendarRecreate( $(window).width() );
    });

    bsCalendarRecreate( $(window).width() );

}

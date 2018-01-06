/**
 *
 * Full Calendar script for Boxsteps
 *
 * Author: Wolfgang Dielingen
 *
 */

function bsCalendar(id, events) {

    var defaultOptions = {
        lang: 'es',
        defaultView: 'basicWeek',
        displayEventEnd: true,
        minTime: "06:30:00",
        maxTime: "18:00:00",
        timeFormat: 'hh:mm A',
        axisFormat: 'hh:mm A',
        height: 408,
        allDaySlot: false,
        editable: false,
        eventLimit: false,
        eventSources: events,
        buttonIcons: {
            prev: 'prev fa-angle-left',
            next: 'next fa-angle-right',
        },
        eventRender: function(event, element, view) {
            var title = element.find('.fc-title, .fc-list-item-title');
            title.html( '<br>' + title.text() );
        }
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

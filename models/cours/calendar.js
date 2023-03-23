document.addEventListener('DOMContentLoaded', function () {



    var url = './';



    $('body').on('click', '.datetimepicker', function () {
        $(this).not('.hasDateTimePicker').datetimepicker({
            controlType: 'select',
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            timeFormat: 'HH:mm:ss',
            yearRange: "1900:+10",
            showOn: 'focus',
            firstDay: 1
        }).focus();
    });

    $(".colorpicker").colorpicker();

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        navLinks: true, // can click day/week names to navigate views
        locale: "fr",
        buttonText: {
            today: 'Aujourd\'hui',
            month: 'Mois',
            week: 'Semaine',
            day: 'Jour',
            list: 'Liste'
        },
        businessHours: true, // display business hours
        editable: true,
        //uncomment to have a default date
        //defaultDate: '2020-04-07',
        events: url + 'api/load.php',
        eventDrop: function (arg) {
            var start = arg.event.start.toDateString() + ' ' + arg.event.start.getHours() + ':' + arg.event.start.getMinutes() + ':' + arg.event.start.getSeconds();
            if (arg.event.end == null) {
                end = start;
            } else {
                var end = arg.event.end.toDateString() + ' ' + arg.event.end.getHours() + ':' + arg.event.end.getMinutes() + ':' + arg.event.end.getSeconds();
            }

            $.ajax({
                url: url + "api/update.php",
                type: "POST",
                data: { id: arg.event.id, start: start, end: end },
                cache: false,
                async: true
            });
        },
        eventResize: function (arg) {
            var start = arg.event.start.toDateString() + ' ' + arg.event.start.getHours() + ':' + arg.event.start.getMinutes() + ':' + arg.event.start.getSeconds();
            var end = arg.event.end.toDateString() + ' ' + arg.event.end.getHours() + ':' + arg.event.end.getMinutes() + ':' + arg.event.end.getSeconds();

            $.ajax({
                url: url + "api/update.php",
                type: "POST",
                data: { id: arg.event.id, start: start, end: end },
                cache: false,
                async: true
            });
        },
        eventClick: function (arg) {
            var id = arg.event.id;

            $('#editEventId').val(id);
            $('#deleteEvent').attr('data-id', id);
            $('#deleteEventRec').attr('data-idR', id);


            $.ajax({
                url: url + "api/getevent.php",
                type: "POST",
                dataType: 'json',
                cache: false,
                async: true,
                data: { id: id },
                success: function (data) {
                    $('#editEventTitle').val(data.title);
                    $('#editStartDate').val(data.start);
                    $('#editEndDate').val(data.end);
                    $('#editColor').val(data.color);
                    $('#editTextColor').val(data.textColor);
                    $('#editID_Recurrence').val(data.ID_Recurrence);
                    $('#editeventmodal').modal();
                }
            });

            $('body').on('click', '#deleteEvent', function () {
                $.ajax({
                    url: url + "api/delete.php",
                    type: "POST",
                    data: { id: arg.event.id },
                    cache: false,
                    async: true
                });
                //close model
                $('#editeventmodal').modal('hide');
                //refresh calendar
                calendar.refetchEvents();
            });


            $('body').on('click', '#deleteEventRec', function () {
                $.ajax({
                    url: url + "api/delete.php",
                    type: "POST",
                    data: {
                        id: arg.event.id,
                        ID_Recurrence: $('#editID_Recurrence').val()
                    },
                    cache: false,
                    async: true
                });

                //close model
                $('#editeventmodal').modal('hide');
                //refresh calendar
                calendar.refetchEvents();


            });

            calendar.refetchEvents();
        }
    });

    calendar.render();


    $('#createEvent').submit(function (event) {

        // stop the form refreshing the page
        event.preventDefault();

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        // process the form
        $.ajax({
            type: "POST",
            url: url + 'api/insert.php',
            data: $(this).serialize(),
            dataType: 'json',
            encode: true,
            cache: false,
            async: true
        }).done(function (data) {

            // insert worked
            if (data.success) {

                //remove any form data
                $('#createEvent').trigger("reset");

                //close model
                $('#addeventmodal').modal('hide');

                //refresh calendar
                calendar.refetchEvents();

            } else {

                //if error exists update html
                if (data.errors.date) {
                    $('#date-group').addClass('has-error');
                    $('#date-group').append('<div class="help-block">' + data.errors.date + '</div>');
                }

                if (data.errors.title) {
                    $('#title-group').addClass('has-error');
                    $('#title-group').append('<div class="help-block">' + data.errors.title + '</div>');
                }

            }

        });
    });



    $('#editEvent').submit(function (event) {
        // stop the form refreshing the page
        event.preventDefault();

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        //form data
        var id = "";
        var title = "";
        var start = "";
        var end = "";
        var color = "";
        var textColor = "";

        //form data
        var id = $('#editEventId').val();
        var title = $('#editEventTitle').val();
        var start = $('#editStartDate').val();
        var end = $('#editEndDate').val();
        var color = $('#editColor').val();
        var textColor = $('#editTextColor').val();

        $(".myButton").on('click', function () {
            alert($(this).val());
        });
    });
});


/* document.addEventListener('DOMContentLoaded', function () {



    var url = './';



    $('body').on('click', '.datetimepicker', function () {
        $(this).not('.hasDateTimePicker').datetimepicker({
            controlType: 'select',
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            timeFormat: 'HH:mm:ss',
            yearRange: "1900:+10",
            showOn: 'focus',
            firstDay: 1
        }).focus();
    });

    $(".colorpicker").colorpicker();

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        navLinks: true, // can click day/week names to navigate views
        locale: "fr",
        buttonText: {
            today: 'Aujourd\'hui',
            month: 'Mois',
            week: 'Semaine',
            day: 'Jour',
            list: 'Liste'
        },
        businessHours: true, // display business hours
        editable: true,
        //uncomment to have a default date
        //defaultDate: '2020-04-07',
        events: url + 'api/load.php',
        eventDrop: function (arg) {
            var start = arg.event.start.toDateString() + ' ' + arg.event.start.getHours() + ':' + arg.event.start.getMinutes() + ':' + arg.event.start.getSeconds();
            if (arg.event.end == null) {
                end = start;
            } else {
                var end = arg.event.end.toDateString() + ' ' + arg.event.end.getHours() + ':' + arg.event.end.getMinutes() + ':' + arg.event.end.getSeconds();
            }

            $.ajax({
                url: url + "api/update.php",
                type: "POST",
                data: { id: arg.event.id, start: start, end: end },
                cache: false,
                async: true
            });
        },
        eventResize: function (arg) {
            var start = arg.event.start.toDateString() + ' ' + arg.event.start.getHours() + ':' + arg.event.start.getMinutes() + ':' + arg.event.start.getSeconds();
            var end = arg.event.end.toDateString() + ' ' + arg.event.end.getHours() + ':' + arg.event.end.getMinutes() + ':' + arg.event.end.getSeconds();

            $.ajax({
                url: url + "api/update.php",
                type: "POST",
                data: { id: arg.event.id, start: start, end: end },
                cache: false,
                async: true
            });
        },
        eventClick: function (arg) {
            var id = arg.event.id;

            $('#editEventId').val(id);
            $('#deleteEvent').attr('data-id', id);
            $('#deleteEventRec').attr('data-idR', id);


            $.ajax({
                url: url + "api/getevent.php",
                type: "POST",
                dataType: 'json',
                cache: false,
                async: true,
                data: { id: id },
                success: function (data) {
                    $('#editEventTitle').val(data.title);
                    $('#editStartDate').val(data.start);
                    $('#editEndDate').val(data.end);
                    $('#editColor').val(data.color);
                    $('#editTextColor').val(data.textColor);
                    $('#editID_Recurrence').val(data.ID_Recurrence);
                    $('#editeventmodal').modal();
                }
            });

            $('body').on('click', '#deleteEvent', function () {
                $.ajax({
                    url: url + "api/delete.php",
                    type: "POST",
                    data: { id: arg.event.id },
                    cache: false,
                    async: true
                });
                //close model
                $('#editeventmodal').modal('hide');
                //refresh calendar
                calendar.refetchEvents();
            });


            $('body').on('click', '#deleteEventRec', function () {
                $.ajax({
                    url: url + "api/delete.php",
                    type: "POST",
                    data: {
                        id: arg.event.id,
                        ID_Recurrence: $('#editID_Recurrence').val()
                    },
                    cache: false,
                    async: true
                });

                //close model
                $('#editeventmodal').modal('hide');
                //refresh calendar
                calendar.refetchEvents();


            });

            calendar.refetchEvents();
        }
    });

    calendar.render();


    $('#createEvent').submit(function (event) {

        // stop the form refreshing the page
        event.preventDefault();

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        // process the form
        $.ajax({
            type: "POST",
            url: url + 'api/insert.php',
            data: $(this).serialize(),
            dataType: 'json',
            encode: true,
            cache: false,
            async: true
        }).done(function (data) {

            // insert worked
            if (data.success) {

                //remove any form data
                $('#createEvent').trigger("reset");

                //close model
                $('#addeventmodal').modal('hide');

                //refresh calendar
                calendar.refetchEvents();

            } else {

                //if error exists update html
                if (data.errors.date) {
                    $('#date-group').addClass('has-error');
                    $('#date-group').append('<div class="help-block">' + data.errors.date + '</div>');
                }

                if (data.errors.title) {
                    $('#title-group').addClass('has-error');
                    $('#title-group').append('<div class="help-block">' + data.errors.title + '</div>');
                }

            }

        });
    });



    $('#editEvent').submit(function (event) {
        // stop the form refreshing the page
        event.preventDefault();


        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        //form data
        var id = "";
        var title = "";

        var start = "";
        var end = "";
        var color = "";
        var textColor = "";

        //form data
        var id = $('#editEventId').val();
        var title = $('#editEventTitle').val();

        var start = $('#editStartDate').val();
        var end = $('#editEndDate').val();
        var color = $('#editColor').val();
        var textColor = $('#editTextColor').val();

        function updateCalendar() {
            $('#calendar').fullCalendar('refetchEvents');
        }

        $(function () {
            $("button").click(function () {

                var fired_button = $(this).val();
                if (fired_button == "saveRec") {
                    var ID_Recurrence = $('#editID_Recurrence').val();

                    // process the form
                    $.ajax({
                        type: "POST",
                        url: url + 'api/update.php',
                        data: {
                            id: id,
                            title: title,
                            start: start,
                            end: end,
                            color: color,
                            text_color: textColor,
                            ID_Recurrence: ID_Recurrence
                        },
                        dataType: 'json',
                        cache: false,
                        encode: true,
                        async: true


                    }).done(function (data) {

                        //close model
                        $('#editeventmodal').modal('hide');

                        //remove any form data
                        $('#editEvent').trigger("reset");

                        //refresh calendar
                        calendar.refetchEvents();

                        updateCalendar();


                    });

                } if (fired_button == "save") {
                    var ID_Recurrence = "";
                    // process the form
                    $.ajax({
                        type: "POST",
                        url: url + 'api/update.php',
                        data: {
                            id: id,
                            title: title,
                            start: start,
                            end: end,
                            color: color,
                            text_color: textColor
                        },
                        dataType: 'json',
                        cache: false,
                        encode: true,
                        async: true


                    }).done(function (data) {

                        //remove any form data
                        $('#editEvent').trigger("reset");

                        //close model
                        $('#editeventmodal').modal('hide');

                        //refresh calendar
                        calendar.refetchEvents();

                        updateCalendar();


                    });

                }
            });

        });

    });
}); */




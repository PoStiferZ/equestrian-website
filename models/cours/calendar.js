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
        //defaultDate: '2023-03-03',
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





                    $('#editEventTitleRec').val(data.title);
                    $('#editStartDateRec').val(data.start);
                    $('#editEndDateRec').val(data.end);
                    $('#editColorRec').val(data.color);
                    $('#editTextColorRec').val(data.textColor);
                    $('#editIdRecurrenceRec').val(data.idRecurrence);

                    $('#editeventmodal').modal();
                }
            });
            $('body').on('click', '#deleteEventRec', function () {
                $.ajax({
                    url: url + "api/deleteR.php",
                    type: "POST",
                    data: {
                        id: arg.event.id,
                        idRecurrence: $('#editIdRecurrenceRec').val()
                    },
                    cache: false,
                    async: true
                });
                calendar.refetchEvents();
                //close model
                $('#editeventmodal').modal('hide');
                //refresh calendar
            });

            $('body').on('click', '#deleteEvent', function () {
                $.ajax({
                    url: url + "api/delete.php",
                    type: "POST",
                    data: { id: arg.event.id },
                    cache: false,
                    async: true
                });
                calendar.refetchEvents();
                //close model
                $('#editeventmodal').modal('hide');
                //refresh calendar

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

    $('#editEventForm').submit(function (event) {

        // stop the form refreshing the page
        event.preventDefault();

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        //form data
        var id = $('#editEventId').val();
        var title = $('#editEventTitle').val();
        var start = $('#editStartDate').val();
        var end = $('#editEndDate').val();
        var color = $('#editColor').val();
        var textColor = $('#editTextColor').val();
        var idRecurrence = $('#idRecurrence').val();


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
            encode: true
        }).done(function (data) {

            // insert worked
            if (data.success) {

                //remove any form data
                $('#editEvent').trigger("reset");

                //close model
                $('#editeventmodal2').modal('hide');
                $('#editeventmodal').modal('hide');


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

    $('#editEventFormRec').submit(function (event) {

        // stop the form refreshing the page
        event.preventDefault();

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        //form data
        var id = $('#editEventId').val();
        var title = $('#editEventTitleRec').val();
        var start = $('#editStartDateRec').val();
        var end = $('#editEndDateRec').val();
        var color = $('#editColorRec').val();
        var textColor = $('#editTextColorRec').val();
        var idRecurrence = $('#editIdRecurrenceRec').val();

        // process the form
        $.ajax({
            type: "POST",
            url: url + 'api/updateRec.php',
            data: {
                id: id,
                title: title,
                start: start,
                end: end,
                color: color,
                text_color: textColor,
                idRecurrence: idRecurrence
            },
            dataType: 'json',
            encode: true
        }).done(function (data) {

            // insert worked
            if (data.success) {

                //remove any form data
                $('#editEvent').trigger("reset");

                //close model
                $('#editeventmodalRec').modal('hide');
                $('#editeventmodal').modal('hide');


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


});

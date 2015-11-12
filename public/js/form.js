$(document).on('ready', function () {

    $('.selectpicker').selectpicker();

    $('#departureDateDiv, #arrivalDate, #returnDate').datepicker({
        language: 'ru',
        format: 'yyyy-mm-dd'
    });


    sendRequestAndUpdateInputs();


    $('#departureDateDiv').on("changeDate", function () {
        updateDepartureDate();
        sendRequestAndUpdateInputs();
    });


    $('#regionSelect').on('change', function () {
        sendRequestAndUpdateInputs();
    });


    function updateDepartureDate() {
        $('#departureDate').val(
            $('#departureDateDiv').datepicker('getFormattedDate')
        );
    }


    function sendRequestAndUpdateInputs() {
        getData().done(function(data) {
            data = JSON.parse(data);
            updateCouriers(data.available_couriers);
            updateDates(data.arrival_date, data.return_date);
        });
    }


    function getData() {
        return $.ajax('/available-couriers-and-dates', {
            data: {
                region_id: $('#regionSelect').val(),
                departure_date: $('#departureDateDiv').datepicker('getFormattedDate')
            }
        });
    }


    function updateCouriers(courierIds) {

        if (! courierIds.length) {
            showErrors(['Для данной даты и региона нет доступных курьеров.']);
            disableForm();
            $('#courierSelect').attr('disabled', true);
        } else {

            $('#courierSelect > option').each(function() {
                $(this).attr(
                    'disabled',
                    (courierIds.indexOf($(this).val() * 1) === -1) ? true : false
                );
            });

            $('#courierSelect').val(courierIds[0]).attr('disabled', false);;
            hideErrors();
            enableForm();
        }

        $('#courierSelect').selectpicker('refresh');
    }


    function updateDates(arrivalDate, returnDate) {
        $('#arrivalDate').val(arrivalDate);
        $('#returnDate').val(returnDate);
    }


    function showErrors(messages) {
        console.log('showErrors works');
        $('#errors').removeClass('hidden').empty();
        messages.forEach(function(message) {
            $('#errors').append('<p>' + message +'</p>');
        })
    }

    function hideErrors() {
        $('#errors').addClass('hidden').empty();
    }

    function disableForm() {
        $('button[type=submit]').prop('disabled', true)
    }

    function enableForm() {
        $('button[type=submit]').prop('disabled', false)
    }


});
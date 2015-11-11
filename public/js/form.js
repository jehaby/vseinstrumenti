$(document).on('ready', function () {

    $('.selectpicker').selectpicker();

    $('#departureDateDiv, #arrivalDate, #returnDate').datepicker({
        language: 'ru',
        format: 'yyyy-mm-dd'
    });

    updateInputs();


    $('#departureDateDiv').on("changeDate", function () {
        $('#departureDate').val(
            $('#departureDateDiv').datepicker('getFormattedDate')
        );

        updateInputs();
    });


    $('#regionSelect').on('change', function () {
        updateInputs();
    });


    function updateInputs() {

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

        $('#courierSelect > option').each(function() {
            if (courierIds.indexOf($(this).val() * 1) === -1) {
                $(this).attr('disabled', true);
            }
        })

        $('.selectpicker').selectpicker('refresh');

    }


    function updateDates(arrivalDate, returnDate) {

        $('#arrivalDate').val(arrivalDate);
        $('#returnDate').val(returnDate);

    }


});
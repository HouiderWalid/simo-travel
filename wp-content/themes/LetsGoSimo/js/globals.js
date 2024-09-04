jQuery(document).ready(function ($) {

    $('#contact-us-form').on('submit', function (event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'handle_contact_us_form_submission',
                form_data: formData
            },
            success: function (response) {
                $('#email')
                    .removeClass('hidden text-red-800 border-red-300 bg-red-50')
                    .addClass('text-green-800 border-green-300 bg-green-50')
                $('#email .alert-content')
                    .html('<p>Success: ' + response.data.message + '</p>');
            },
            error: function (xhr, status, error) {
                let displayedError = error
                try {
                    let responseError = JSON.parse(xhr.error().responseText).data.message
                    if (responseError) {
                        displayedError = responseError
                    }
                } catch (e) {

                }

                $('#email-form-response')
                    .removeClass('hidden text-green-800 border-green-300 bg-green-50')
                    .addClass('text-red-800 border-red-300 bg-red-50')
                $('#email-form-response .alert-content')
                    .html('<p>Error: ' + displayedError + '</p>');
            }
        })
    })

    $('#reservation-form').on('submit', function (event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'handle_reservation_form_submission',
                form_data: formData
            },
            success: function (response) {

                $('#reservation-form-response')
                    .removeClass('hidden text-red-800 border-red-300 bg-red-50')
                    .addClass('text-green-800 border-green-300 bg-green-50')
                $('#reservation-form-response .alert-content')
                    .html('<p>Success: ' + response.data.message + '</p>');
            },
            error: function (xhr, status, error) {
                let displayedError = error
                try {
                    let responseError = JSON.parse(xhr.error().responseText).data.message
                    if (responseError) {
                        displayedError = responseError
                    }
                } catch (e) {

                }

                $('#reservation-form-response')
                    .removeClass('hidden text-green-800 border-green-300 bg-green-50')
                    .addClass('text-red-800 border-red-300 bg-red-50')
                $('#reservation-form-response .alert-content')
                    .html('<p>Error: ' + displayedError + '</p>');
            }
        });
    });
});
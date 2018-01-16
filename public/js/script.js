jQuery(document).ready(function () {
    calculadora = function () {
        var $loadingWrapper = $('.wmb-loading-wrapper');

        $.ajaxSetup({
            headers: {
                'x-csrf-token': document.querySelectorAll('input[name=_token]')[0].value
            }
        });

        var $form = $('#formCalc');
        var params = $form.serialize();
        var url = $form.attr('action');
        $.ajax({
            url: url,
            type: 'POST', //POST
            data: params,
            cache: false,
            dataType: 'json', //html, json
            beforeSend: function () {
                $loadingWrapper.show();
            },
            success: function (response) {
                $loadingWrapper.hide();
                $('#resultado').html(response.result);
            },
            error: function (jqXHR, exception, error) {
                var err = exception + ' ' + jqXHR.status + " | " + error;
                var response = JSON.parse(jqXHR.responseText);
                console.warn('Error WMB: ' + err);
                $('.wmb-loading-wrapper').hide();
            }
        }); // End ajax
    };

    $('#btnSend').on('click', function () {
        var value = $('#expression').val();
        if (value) {
            calculadora();
        } else {
            $('#message').html('<div class="alert alert-danger" role="alert">Ingrese valor por favor</div>');
        }
    });
});
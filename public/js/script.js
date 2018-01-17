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
                $('#resultado').html(response.result).hide().fadeIn();

                var $historial = $('#historial-list');
                $historial.html('').hide().fadeIn();
                $.each(response.historial.data, function (index, value) {
                    $historial.append('<li class="list-group-item d-flex justify-content-between align-items-center">' + value.expression + '  <span class="badge badge-primary badge-pill">' + value.result + '</span>' + '</li>');
                });
            },
            error: function (jqXHR, exception, error) {
                var err = exception + ' ' + jqXHR.status + " | " + error;
                var response = JSON.parse(jqXHR.responseText);
                console.warn('Error WMB: ' + err);
                $loadingWrapper.hide();
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

jQuery(document).ready(function () {
    twitterLinks = function (text) {
        var base_url = 'http://twitter.com/'; // identica: 'http://identi.ca/'  
        var hashtag_part = 'search?q=#'; // identica: 'tag/'  
        // convert URLs into links  
        text = text.replace(
                /(>|<a[^<>]+href=['"])?(https?:\/\/([-a-z0-9]+\.)+[a-z]{2,5}(\/[-a-z0-9!#()\/?&.,]*[^ !#?().,])?)/gi,
                function ($0, $1, $2) {
                    return ($1 ? $0 : '<a href="' + $2 + '" target="_blank">' + $2
                            + '</a>');
                });
        // convert protocol-less URLs into links  
        text = text.replace(
                /(:\/\/|>)?\b(([-a-z0-9]+\.)+[a-z]{2,5}(\/[-a-z0-9!#()\/?&.]*[^ !#?().,])?)/gi,
                function ($0, $1, $2) {
                    return ($1 ? $0 : '<a href="http://' + $2 + '">' + $2
                            + '</a>');
                });
        // convert @mentions into follow links  
        text = text.replace(
                /(:\/\/|>)?(@([_a-z0-9-]+))/gi,
                function ($0, $1, $2, $3) {
                    return ($1 ? $0 : '<a href="' + base_url + $3
                            + '" title="Follow ' + $3 + '" target="_blank">@' + $3
                            + '</a>');
                });
        // convert #hashtags into tag search links  
        text = text.replace(
                /(:\/\/[^ <]*|>)?(\#([_a-z0-9-]+))/gi,
                function ($0, $1, $2, $3) {
                    return ($1 ? $0 : '<a href="' + base_url + hashtag_part + $3
                            + '" title="Search tag: ' + $3 + '" target="_blank">#' + $3
                            + '</a>');
                });

        return text;
    };

    twitterByUser = function () {
        var $loadingWrapper = $('.wmb-loading-wrapper');

        $.ajaxSetup({
            headers: {
                'x-csrf-token': document.querySelectorAll('input[name=_token]')[0].value
            }
        });

        var $form = $('#formSocial');
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

                var $social_list = $('#social-list');
                $social_list.html('');

                $.each(response, function (index, value) {
                    var img = null;
                    if (value.user.profile_image_url) {
                        img = '<img src="' + value.user.profile_image_url + '" width="24">';
                    }
                    $social_list.append('<li class="list-group-item justify-content-between align-items-center">' + twitterLinks(value.text) + ' <br/> <a href="https://twitter.com/' + value.user.screen_name + '" target="_blank">' + img + ' <i>@' + value.user.screen_name + '</i></a> <span class="badge badge-primary badge-pill">' + value.retweet_count + '</span>' + '</li>');
                    $social_list.hide().fadeIn();
                });
            },
            error: function (jqXHR, exception, error) {
                var err = exception + ' ' + jqXHR.status + " | " + error;
                var response = JSON.parse(jqXHR.responseText);
                console.warn('Error WMB: ' + err);
                $loadingWrapper.hide();
            }
        }); // End ajax
    };

    twitterSearch = function () {
        var $loadingWrapper = $('.wmb-loading-wrapper');

        $.ajaxSetup({
            headers: {
                'x-csrf-token': document.querySelectorAll('input[name=_token]')[0].value
            }
        });

        var $form = $('#formSearch');
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

                var $social_list = $('#social-list');
                $social_list.html('');

                $.each(response.statuses, function (index, value) {
                    var img = null;
                    if (value.user.profile_image_url) {
                        img = '<img src="' + value.user.profile_image_url + '" width="24">';
                    }
                    $social_list.append('<li class="list-group-item justify-content-between align-items-center">' + twitterLinks(value.text) + ' <br/> <a href="https://twitter.com/' + value.user.screen_name + '" target="_blank">' + img + ' <i>@' + value.user.screen_name + '</i></a> <span class="badge badge-primary badge-pill">' + value.retweet_count + '</span>' + '</li>');
                    $social_list.hide().fadeIn();
                });
            },
            error: function (jqXHR, exception, error) {
                var err = exception + ' ' + jqXHR.status + " | " + error;
                var response = JSON.parse(jqXHR.responseText);
                console.warn('Error WMB: ' + err);
                $loadingWrapper.hide();
            }
        }); // End ajax
    };

    $('#btnListByUser').on('click', function () {
        twitterByUser();
    });
    $('#btnSearch').on('click', function () {
        var value = $('#search_tweets').val();

        if (value) {
            twitterSearch();
        } else {
            $('#message').html('<div class="alert alert-danger" role="alert">Ingrese una palabra de búsqueda por favor</div>');
        }
    });    
});
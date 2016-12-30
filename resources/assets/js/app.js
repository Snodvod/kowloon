/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function () {
    $('#js-toggle-menu').click(function () {
        $('.sidebar').toggleClass('expanded');
    });
    $('#js-close-cookie').click(function () {
        console.log('Close cookie');
        $('.cookie').hide();
    });
    $('#js-toggle-filters').click(function () {
        console.log('toggle filters');
        $('.filters').slideToggle();
    });

    // Overlay open en hide
    $('#js-close-search').click(function () {
        hideOverlays();

    });
    $('#js-close-faq').click(function () {
        hideOverlays();
    });

    $('[id^=js-open-]').click(function () {
        var id = $(this)[0].id.split('-')[2];
        id = '#' + id;
        console.log(id);
        if ($(id).hasClass('hidden')) {
            hideOverlays();
            $('.index').addClass('no-scroll');
            $(id).show();
            $(id).removeClass('hidden');
        } else {
            hideOverlays();
        }
    });

    // Search typeahead
    var engine = new Bloodhound({
        remote: {
            url: '/search',
            prepare: function (query, settings) {

                var categories = '';
                $('.js-cats:checked').each(function () {
                    categories += $(this)[0].id;
                })

                var min = $("#js-min").text();
                var max = $("#js-max").text();

                var page = 's';
                if ($('#search').hasClass('hidden')) {
                    page = 'f';
                }

                settings.url += '?q=' + query + '&c=' + categories + '&min=' + min + '&max=' + max + '&page=' + page;

                return settings;
            }
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    engine.initialize();

    $('.search-input').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        source: engine,
        name: 'results',

        display: function (data) {
            return data.name
        },

        templates: {
            empty: function() {
                $('#faq-static').hide();
                return '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
            },
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                console.log(data)
                if (data.image) {
                    return '<div class="result row"><a href="/products/' + data.id + '"><div class="col-md-3"><div style="background-image: url(/img/' + data.image + ');" class="image"></div></div><div class="col-md-9 name">' + data.name + '</div></a></div>'
                } else {
                    $('#faq-static').hide();
                    return '<div class="row"><div class="col-md-12" style="padding-left: 15px; padding-right: 15px;"><div class="card card-block"><h4 class="card-title">' + data.question + '</h4> <p class="card-text">' + data.answer + '</p></div></div>'
                       + '</div>'
                }
            }
        }
    });

    //Slider
    $("#js-slider").slider({
        animate: "fast",
        range: true,
        values: [1, 9999],
        max: 9999
    });

    $('#js-slider').slider({
        slide: function (event, ui) {
            $("#js-min").text(ui.values[0]);
            $("#js-max").text(ui.values[1]);
        }
    });

    $('.faq-search').blur(function() {
        $('#faq-static').show();
    });

    $(document).keyup(function (e) {
        if (!$('#search').hasClass('hidden') || !$('#faq').hasClass('hidden')) {
            // esc
            if (e.keyCode === 27) {
                if ($('#js-search-input').hasClass("typing")) {
                    $('#js-search-input').val('');
                    $('#js-search-input').blur();
                    $('#js-search-input').removeClass('typing');
                    $('#faq-static').show();
                } else {
                    hideOverlays();
                }
            } else {
                if (!$('#js-search-input').hasClass("typing")) {
                    var letter = String.fromCharCode(e.keyCode);
                    $('#js-search-input').focus();
                    $('#js-search-input').val(letter);
                    $('#js-search-input').addClass('typing');
                }

            }
        }
    })

    $('#js-search-input').blur(function () {
        $('#js-search-input').removeClass("typing");
    })

})

// END DOC READY

function hideOverlays() {
    console.log("hide em overlays");
    $('#js-search-input').removeClass("typing")
    $('#search').addClass('hidden');
    $('#faq').addClass('hidden');
    $('.index').removeClass('no-scroll');
    $('#search').hide();
    $('#faq').hide();
}

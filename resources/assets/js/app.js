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

    // Overlay open en hide
    $('#js-close-search').click(function () {
        $('#search').hide();
        $('#search').addClass('hidden');
    });
    $('#js-close-faq').click(function () {
        $('#faq').hide();
        $('#faq').addClass('hidden');
    });
    $('[id^=js-open-]').click(function () {
        var id = $(this)[0].id.split('-')[2];
        id = '#' + id;
        console.log(id);
        if ($(id).hasClass('hidden')) {
            hideOverlays();
            $(id).show();
            $(id).removeClass('hidden');
        } else {
            hideOverlays();
        }
    });

    // Search typeahead
    var engine = new Bloodhound({
        remote: {
            url: '/search?q=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $('#js-search-input').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        source: engine.ttAdapter(),

        name: 'results',

        display: function(data) {
          return data.name
        },

        templates: {
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                return '<div class="list-group result"><a href="/products/' + data.id + '"><div style="background-image: url(/img/' + data.image + ');" class="image"></div><div class="name">' + data.name + '</div></a></div>'
            }
        }
    });

    $(document).keyup(function (e) {
        if (!$('#search').hasClass('hidden') || !$('#faq').hasClass('hidden')) {
            // esc
            if (e.keyCode === 27) {
                if ($('#js-search-input').hasClass("typing")) {
                    $('#js-search-input').val('');
                    $('#js-search-input').removeClass('typing');
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
    $('#search').hide();
    $('#faq').hide();
}

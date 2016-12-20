/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function () {
    console.log('ready');
    $('#js-toggle-menu').click(function () {
        $('.sidebar').toggleClass('expanded');
    });
    $('#js-close-cookie').click(function () {
        console.log('Close cookie');
        $('.cookie').hide();
    });
})

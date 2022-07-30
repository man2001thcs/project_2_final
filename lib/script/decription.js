$(function() {
    $('#manual_button').click(function() {

        $('#manual').show();
        $('#component').hide();
        if (!$("#manual_button").hasClass("active")) {
            $('#manual_button').toggleClass("active");
        }
        $('#component_button').removeClass("active");

    });

    $('#component_button').click(function() {
        $('#component').show();
        $('#manual').hide();
        if (!$('#component_button').hasClass("active")) {
            $('#component_button').toggleClass("active");
        }

        $('#manual_button').removeClass("active");

    });
});
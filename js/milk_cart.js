$(document).ready(function() {

    // Disable scroll when focused on a number input.
    $('form').on('focus', '.totals-customer', function(e) {
        $(this).on('wheel', function(e) {
            e.preventDefault();
        });
    });

    // Restore scroll on number inputs.
    $('form').on('blur', '.totals-customer', function(e) {
        $(this).off('wheel');
    });

    // Disable up and down keys.
    $('form').on('keypress', '.totals-customer', function(e) {
        if (e.which == 38 || e.which == 40 || e.which == 69)
            e.preventDefault();
        alert(e.which);

    });

});

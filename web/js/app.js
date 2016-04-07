$(function() {
    // Widget ajax
    //-------------
    $('.widget-ajax').on('submit', 'form', function(e) {
        e.preventDefault();

        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serializeArray()
        })
        .done(function(response) {
            form.html(response);
        });
    });
});

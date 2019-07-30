$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#form_messages').submit(function (e) {
    e.preventDefault();
    $('.alert-danger').remove();
    $.ajax({
        type: 'POST',
        url: $(this).data("url"),
        data: { 
            username: $('#username').val(), 
            email: $('#email').val(),
            homepage: $('#homepage').val(),
            message: $('#message').val(),
            tags: $('#tags').val(),
        },
        error: function (jqXHR, exception) {
            var errorString = "<div class='alert alert-danger'><ul>";
            $.each( jqXHR.responseJSON.errors, function( key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += "</ul></div>";
            $( "#form_messages" ).before( errorString);
        }

    })
    .done(function (data) {
        // $('#comments-column').find("header").after(data.html);
        console.log(data);
    });
});
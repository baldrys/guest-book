$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.messages tbody').children(":first").click(function(e){
    // e.preventDefault();
    console.log('HELLO');
});

$('#form_messages').submit(function (e) {
    e.preventDefault();
    $('.alert-danger').remove();
    $('.alert-success').remove();
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
        $('.messages tbody').children(":first").before(data.new_message);
        $("#form_messages")[0].reset();
        var sucessString = "<div class='alert alert-success'><p>Message added</p></div>";
        $( "#form_messages" ).before(sucessString);
        console.log(data);
    });
});
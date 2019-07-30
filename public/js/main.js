$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#form_messages').submit(function (e) {
    e.preventDefault();
    $('.alert-danger').remove();
    $('.alert-success').remove();
    var url = $(this).data("url");
    var pageNum = $('li.page-item.active span').text();
    // var page_no = getURLParameter(url, 'page');
    // console.log(page_no);
    $.ajax({
        type: 'POST',
        url: url,
        data: { 
            username: $('#username').val(), 
            email: $('#email').val(),
            homepage: $('#homepage').val(),
            message: $('#message').val(),
            tags: $('#tags').val(),
            page: pageNum
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
        console.log(data);
        console.log(data.page);
        // $('.messages tbody').children(":first").before(data.new_message);
        $("#form_messages")[0].reset();
        // var sucessString = "<div class='alert alert-success'><p>Message added</p></div>";
        // $( "#form_messages" ).before(sucessString);


        $(".messages tbody").empty();

        $(".messages tbody").append(data.newMessages);

        // here you will replace links
        // $('.pagination').empty();
        // $('.pagination').replaceWith(data.newPagination);
        // var $pagination = $('.pagination');
        
        console.log(pageNum);
        if(!$('.pagination').length)
            $('.messages').after(data.newPagination)
        else
            $('.pagination').replaceWith(data.newPagination);
        

    });
});
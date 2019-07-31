$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#form_messages').submit(function (e) {
    e.preventDefault();
    removeAlerts();
    var url = $(this).data("url");
    var pageNum = $('li.page-item.active span').text();
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
            $(".alert.alert-danger")[0].scrollIntoView()
        }

    })
    .done(function (data) {
        $("#form_messages")[0].reset();
        var sucessString = "<div class='alert alert-success'><p>Message added</p></div>";
        
        $( "#form_messages" ).before(sucessString);
        $(".alert.alert-success")[0].scrollIntoView();
        $('#pagination-messages').html(data.paginationMessages);
    });
});


$(document).on('click', '.pagination a', function(event){
    event.preventDefault();
    removeAlerts();
    var page = $(this).attr('href').split('page=')[1];
    $.ajax({
        url:"/paginate-messages?page=" + page,
        success:function(data)
        {
            $('#pagination-messages').html(data.paginationMessages);
        }
       });
   });

function removeAlerts() {
    $('.alert-danger').remove();
    $('.alert-success').remove();
}

$("#search-form").submit(function(event){
    event.preventDefault();
    removeAlerts();
    var url = $(this).attr('action');
    $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: { 
                search: $('#search-input').val(), 
            },

        })
        .done(function (data) {
            $('#pagination-messages').html(data.paginationMessages);
        });
});
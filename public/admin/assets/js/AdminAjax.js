$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
//admin change status request book
function changeStatus(id, active) {
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    $.ajax({
        type: 'POST',
        url: route('post.change.status'),
        data: {
            request_id: id,
            status: active
        },
    })
    .done(function (data) {
        $("#status-" + id).html(data);
    })
    .fail(function () { alert('Has error when changing status!'); })
    
}

$(function() {
    //admin change status request
    // var status = $("#book-request-id-" + getstatus).html();
    // // var request_id = $("#status-request").val();
    // alert(status);
    // $('#btn_change_status_' + getid).onclick = alert(12);
        
    // search requets book
    $('#btn_search_request').click(function(e) {
        e.preventDefault();
        var search_box = $('input[name=search_box]').val();
        var category_id = $('select[name=category_id]').val();
        $.ajax({
            type: 'GET',
            url: route('search.request.book'),
            data: {
                search_box: search_box,
                category_id: category_id,
            },
        })
        .done(function(data) {
            $('#area-list-request').html(data);
            $('search_box').val('');
            $('category_id').val('');
        })
        .fail(function (json) {
            var msg = json.responseJSON.message;
            alert(msg);
        });
    });

    // search book
    $('#btn_search_book').click(function(e) {
        e.preventDefault();
        var search_box = $('input[name=search_box]').val();
        var category_id = $('select[name=category_id]').val();
        $.ajax({
            type: 'GET',
            url: route('search.book'),
            data: {
                search_box: search_box,
                category_id: category_id,
            },
        })
        .done(function(data) {
            $('#area-list-book').html(data);
            $('search_box').val('');
            $('category_id').val('');
        })
        .fail(function (json) {
            var msg = json.responseJSON.message;
            alert(msg);
        });
    });

    // search user
    $('#btn_search_user').click(function(e) {
        e.preventDefault();
        var search_name = $('input[name=search_name]').val();
        var search_email = $('input[name=search_email]').val();
        $.ajax({
            type: 'GET',
            url: route('search.user'),
            data: {
                search_name: search_name,
                search_email: search_email,
            },
        })
        .done(function(data) {
            $('#area-list-user').html(data);
            $('search_name').val('');
            $('search_email').val('');
        })
        .fail(function (json) {
            var msg = json.responseJSON.message;
            alert(msg);
        });
    });
});
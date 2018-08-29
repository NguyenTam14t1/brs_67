$(function() {
    $('#btn_review_form').click(function(e) {
        e.preventDefault();
        var book_id = $('#book_id').val();
        var user_id = $('#user_id').val();
        var rating = $('input[name=rating]:checked').val();
        var content = $('#review').val();
        
        if (!user_id) {
            alert('Please login to review!')
            window.location = route('login');
        } else {
            $.ajax({
                type: 'POST',
                url: route('post.review'),
                data: {
                    book_id: book_id,
                    user_id: user_id,
                    rating: rating,
                    content: content
                },
            })
            .done(function(data) {
                $('#comment-sec-area').html(data);
                alert('Post review success!');
                $('#book_id').val('');
                $('#user_id').val('');
                $('input[name=rating]').val('');
                $('#review').val('');
            })
            .fail(function (json) {
                var msg = json.responseJSON.message;
                alert(msg);
            });
        }
    });

    $('#btn_request_form').click(function(e) {
        e.preventDefault();
        var user_id = $('#request_user_id').val();
        var category_id = $('#request_category_id').val();
        var title = $('#request_title_book').val();

        if (!user_id) {
            alert('Please login');
            window.location = route('login');
        } else {
            $.ajax({
                type: 'GET',
                url: route('get.request'),
                data: {
                    user_id: user_id,
                    category_id: category_id,
                    title: title
                },
            })
            .done(function(data) {
                $('#list_request').html(data);
                alert('Post request success!');
                $('#request_user_id').val('');
                $('#request_category_id').val('');
                $('#request_title_book').val('');
            })
            .fail(function (json) {
                var msg = json.responseJSON.message;
                alert(msg);
            });
        }
    });
});

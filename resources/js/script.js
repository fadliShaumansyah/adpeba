import $ from 'jquery';

$(document).ready(function () {
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('.like-button').click(function (e) {
        e.preventDefault();

        let button = $(this);
        let postId = button.data('post-id');

        $.ajax({
            url: '/posts/' + postId + '/like',
            type: 'POST',
            data: {
                _token: csrfToken
            },
            success: function (response) {
                // Perbarui jumlah like tanpa reload
                button.find('.like-count').text(response.likes_count);
            },
            error: function () {
                alert('Gagal menyukai postingan.');
            }
        });
    });
});
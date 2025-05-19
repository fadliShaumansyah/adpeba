document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.querySelectorAll('.like-button').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const postId = this.dataset.postId;

            fetch(`/posts/${postId}/like`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                // Perbarui jumlah like tanpa reload
                this.querySelector('.like-count').textContent = data.likes_count;
            })
            .catch(() => {
                alert('Gagal menyukai postingan.');
            });
        });
    });
});
$(document).ready(function () {
    $("button.delete-user").click(function () {
        const userId = $(this).data('id');
        $.ajax({
            url: '/users?userId=' + userId,
            method: 'DELETE',
            success: function (response) {
                response = JSON.parse(response);
                if (response.hasOwnProperty("success") && response.success === true) {
                    alert('Пользователь удалён');
                    window.location.reload();
                    return;
                }
                alert('Error');
            },
            error: function () {
                alert('Error');
            }
        });
    });
});

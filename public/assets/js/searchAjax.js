$(document).ready(function () {
    $('#searchAjax').on("keyup", function () {
        $.ajax({
            method: 'POST',
            url: 'indexController.php',
            data: { name: searchTerm },
            success: function (response) {
                $('#showdata').html(response);
            }
        });
    });
});

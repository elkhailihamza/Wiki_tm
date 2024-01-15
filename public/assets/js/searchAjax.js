$(document).ready(function () {
    $('#searchAjax').on("keyup", function () {
        var searchTerm = $(this).val();
        $.ajax({
            method: 'POST',
            url: 'http://localhost/wiki_tm/get',
            data: { name: searchTerm },
            success: function (response) {
                $('#showdata').html(response);
            }
        });
    });
});

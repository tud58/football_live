
function loadMatch(type,value) {
    if (type && value) {
        if (type == 2) {
            value = $("#league option:selected").val();
        }

        $.ajax({
            method: 'POST',
            data: {
                'type' : type,
                'value' : value
            },
            url: '/site/load-match.io',
            success: function (data) {
                $("#list_match").html(data);
            },
            error: function () {
                toast('error', 'Thông báo', LANG.system_error);
            }
        });
    }
}
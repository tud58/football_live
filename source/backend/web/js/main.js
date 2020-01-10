function toast(type, heading, message, hideSecond = 2000) {
    $.toast({
        heading: heading,
        text: message,
        icon: type,
        position: 'top-right',
        loader: false,        // Change it to false to disable loader
        loaderBg: '#9EC600',  // To change the background,
        hideAfter: hideSecond
    })
}

function changeStatusItem(obj_id, obj_type, message, url, confirm = 1) {
    var data = {
        'obj_id': obj_id,
        'obj_type': obj_type,
        '_csrf-backend': $("meta[name='csrf-token']").attr('content')
    };

    if (confirm == 1) {
        $.confirm({
            title: LANG.confirm,
            content: message,
            buttons: {
                confirm: {
                    text: LANG.button_oke,
                    btnClass: 'btn-primary',
                    keys: ['enter', 'shift'],
                    action: function () {
                        $.ajax({
                            method: 'POST',
                            data: data,
                            url: url,
                            success: function (data) {
                                var res = JSON.parse(data);
                                if (res.status == 1) {
                                    toast('success', 'Thông báo', res.message);
                                    setTimeout(function () {
                                        location.reload();
                                    }, 500);
                                } else {
                                    toast('error', 'Thông báo', res.message);
                                }
                            },
                            error: function () {
                                toast('error', 'Thông báo', LANG.system_error);
                            }
                        });
                    }
                },
                cancel: {
                    text: LANG.button_cancel,
                    action: function () {
                    }
                }
            }
        });
    } else {
        $.ajax({
            method: 'POST',
            dataType: 'json',
            data: data,
            url: url,
            success: function (data) {
                var res = JSON.parse(data);
                if (res.status == 1) {
                    toast('success', 'Thông báo', res.message);
                    setTimeout(function () {
                        location.reload();
                    }, 500);
                } else {
                    toast('error', 'Thông báo', res.message);
                }
            },
            error: function () {
                toast('error', 'Thông báo', LANG.system_error);
            }
        });
    }
}

function showImg(event) {
    var output = document.getElementById('show_img');
    output.src = URL.createObjectURL(event.target.files[0]);
}

function loadClubByLeage() {
    var league_id = $("#match-league_id option:selected").val();
    if (league_id) {
        $.ajax({
            method: 'POST',
            data: {
                'league_id' : league_id
            },
            url: '/match/load-club-by-league.io',
            success: function (data) {
                var data1 = '<option value="">Chọn đội bóng sân nhà</option>'+data;
                var data2 = '<option value="">Chọn đội bóng sân khách</option>'+data;
                $("#match-club1_id").html(data1);
                $("#match-club2_id").html(data2);
            },
            error: function () {
                toast('error', 'Thông báo', LANG.system_error);
            }
        });
    }
}
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    slidesPerView: 'auto',
    paginationClickable: true,
    spaceBetween: 10,
    loop: true
});

$(window).scroll(
    function () {
        if ($(this).scrollTop() < 200) {
            $(".BannerSticky").css("top","200px");
        } else {
            $(".BannerSticky").css("top","10px");
        }
});

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

function closeBanner(value) {
    var c = '.'+value;
    $(c).css('display','none');
    $(".ads").css('display','none');
}

function loadVideo(myFile) {
    jwplayer("myElement1").load({
        image: "https://content.jwplatform.com/thumbs/xJ7Wcodt-720.jpg",
        file : myFile,
    });

    jwplayer().setVolume(50);
};
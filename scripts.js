function sendRequest() {
    $.ajax({
        url : 'apps/server.php',
        type :'POST',
        data :{ key: $('#search').val(),
            by:$('#by').val()},
        success : function (data) {
            $('.res').html(data);
            $('#img').css('visibility','hidden');
            $('#btn').css('visibility','visible');

        },
        beforeSend :function () {
            $('#img').css('visibility','visible');
        }
    });
};
var timeOut;
$('#search').keyup(function () {
    clearTimeout(timeOut);
    $('#btn').css('visibility','hidden');
    timeOut=setTimeout(function () {sendRequest()},800)}
);
$(window).on('load',function () {
    $('.loader').fadeOut();
});
$(document).mouseup(function (e){

    var container = $("#hide");

    if (!container.is(e.target) && container.has(e.target).length === 0){

        container.delay(300).hide();

    }
});
$('.wrap').on('click',function () {
    var link=$(this).attr('href');
    $(link).css('background-color','red');
});

    var lastScrollTop = 0;
    var $navbar = $('.navbar');

    $(window).scroll(function(event){
        var st = $(this).scrollTop();
        if (st > lastScrollTop) {
            $navbar.fadeOut()
        } else {
            $navbar.fadeIn()
        }
        lastScrollTop = st;
    });


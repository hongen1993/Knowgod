$('#skip').click(function(){
    $('.efectoM').css('opacity', '0');
    $('.efectoMT').css('opacity', '0');
    $('.efectoMThree').css('opacity', '0');
    $('.efectoMF').css('opacity', '0');

    $('.whoIs').css('display', 'block');
    $('.listenTo').css('display', 'block');
    $('.contactUs').css('display', 'block');
    $('.aboutUs').css('display', 'block');

    $('.efectoM').addClass('dontAppear');
    $('.efectoMT').addClass('dontAppear');
    $('.efectoMThree').addClass('dontAppear');
    $('.efectoMF').addClass('dontAppear');

    $('#skip').css('display', 'none');
});

$('#skipB').click(function(){
    $('.efectoMB').css('opacity', '0');
    $('.efectoMTB').css('opacity', '0');
    $('.efectoMThreeB').css('opacity', '0');
    $('.efectoMFB').css('opacity', '0');

    $('.whoIs').css('display', 'block');
    $('.listenTo').css('display', 'block');
    $('.contactUs').css('display', 'block');
    $('.aboutUs').css('display', 'block');

    $('.efectoMB').addClass('dontAppear');
    $('.efectoMTB').addClass('dontAppear');
    $('.efectoMThreeB').addClass('dontAppear');
    $('.efectoMFB').addClass('dontAppear');

    $('#skipB').css('display', 'none');

});
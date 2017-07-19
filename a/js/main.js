function send() {
    var text = $('#text-input').val();
    $('#text-input').val('');
    if (text != "") {
        $.ajax({
            type: "POST",
            url: "../a/method/ajax_write.php",
            data: {"text": text},
            cache: false,
            success: function (response) {
                $('.send-post').after(response);
            }
        });
    }
}

function closePopUp() {
    $('#menu').css('left', '-300px');
    $('.burger-bricks').removeClass('sm-in').addClass('sm-out');
    $('.site-name').addClass('sm-switch');
}

$('body').on('click', '.yet', function () {
    $(this).closest('.post').find('.pre').css("height", 'auto');
    $(this).hide();
});

$('body').on('click', '.switch', function () {
    var h = $(this).closest('.buttons').children('.hide');
    if ($(this).hasClass('more')) {
        h.show();
        $(this).removeClass('more');
        $(this).addClass('close');
    }
    else {
        h.hide();
        $(this).removeClass('close');
        $(this).addClass('more');
    }
});

function toggleFormLogin() {
    $('#fon').toggle();
    $('#login-form').toggle();
}
// TODO: упростить скрывание формы. СЛОЖНО!
$('.login').click(function () {
    toggleFormLogin();
});

$('#login-form .form-close').click(function () {
    toggleFormLogin();
});

$('#fon').click(function () {
    toggleFormLogin();
});

$('body').on('click', '.delete', function () {
    var t = $(this).closest('.post').find('.buttons').attr('data-id');
    var r = $(this).closest('.wrap-post');
    $.ajax({
        type: "POST",
        url: "../a/method/ajax_delete.php",
        data: {
            "delete": t
        },
        cache: false,
        success: function (response) {
            r.removeClass('wrap-post');
            r.addClass('deleted-post');
            r.hide();
        }
    });
    return false;
});

$(window).scroll(function () {
    if ($(window).scrollTop() == $(document).height() - $(window).height() && page != countPage) {
        page++;
        $.ajax({
            type: "POST",
            cache: false,
            url: '../a/method/ajax_page.php',
            data: {
                "page": page
            },
            success: function (data) {
                var redirect = '/blog?page=' + page;
                history.pushState('', '', redirect);
                $('.content').append(data);
            }
        });
    }
});
/*
 $('#text-input').keydown(function(e){
 if(e.ctrlKey && e.keyCode == 13){
 send();
 }
 });

 $('body').on('click', '.send', function(){
 send();
 return false;
 });
 */
$('html').on('click', '.pop-up', function () {
    closePopUp();
    $('body').removeClass('pop-up');
});

$('html').on('click', '.sm-switch', function () {
    $('#menu').css('left', '0px');
    $('.burger-bricks').removeClass('sm-out').addClass('sm-in');
    $('body').addClass('pop-up');
    $(this).removeClass('sm-switch');
});

$('form.form-input-post').submit(function () {
    var form = $(this).serializeArray(), data = [];
    data.text = form[0]['value'];
    data.csrf = form[1]['value'];
    data.subject = form[2]['value'];
    console.log(data);
    $.ajax({
        type: "POST",
        cache: false,
        url: '../a/method/prepare_post.php',
        data: {
            "text": form[0]['value'],
            "csrf": form[1]['value'],
            "subject": form[2]['value']
        },
        success: function (data) {
            console.log(data);
        }
    });
    return false;
});
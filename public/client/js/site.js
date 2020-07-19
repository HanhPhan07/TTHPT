//Hiển thị chế độ xử lý và không cho người dùng thao tác gì trên hệ thống.
function ShowThrobber(message) {
    $('body').append('<div class="throbber"><div class="curtain"></div><div class="curtain-content"><div style="padding:10%;"><h1 class="throbber-header">' + message + '</h1><p class="glyphicon glyphicon-refresh fa-spin"></p></div></div></div>');
    window.setTimeout(function() {
        $(".throbber").show();
    }, 200);
}

//Bỏ hiển thị chế độ xử lý và không cho người dùng thao tác gì trên hệ thống.
function HideThrobber() {
    $(".throbber").remove();
}

// hàm sinh một số nguyên
function RandomInt(min, max) {
    var random = Math.floor(Math.random() * (+max - +min)) + +min;
    return random;
}

$(document).ready(function() {
    let timeexam = $('#timeexam').val();
    console.log(timeexam);
});
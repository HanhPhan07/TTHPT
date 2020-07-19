$(document).ready(function(){
    $('#btn_login').click( function(e) {
        e.preventDefault();
        $('#error_message').empty();
        var username = $('#username').val();
        var password = $('#password').val();

        if (username == '' || password == '') $('#error_message').html('<p class="login-box-msg" style="color:red">Vui lòng điền đầy đủ thông tin !</p>')
        else {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '../admin/login',
                type: 'POST',
                data: {
                    username: username,
                    password: password,
                },
                success: function(result) {
                    var json_data = $.parseJSON(result);
                    if (json_data.status == 1) {
                        window.location.replace("../admin/home");
                    } else {
                        $('#error_message').html('<p class="login-box-msg" style="color:red">Tên đăng nhập hoặc mật khẩu không đúng!'  +
                            '</p>');
                    }
                }
            });

        }
    })

    $('#btnUpdate').click(function(e){
        e.preventDefault();
        $('#error_message').empty();
        var id_user=$('#inputID').val();
        var username=$('#inputUsername').val();
        var fullname=$('#inputFullname').val();
        var email=$('#inputEmail').val();
        if(username==''||fullname==''||email==''){
            $('#error_message').html('<p class="login-box-msg" style="color:red">Vui lòng điền đầy đủ thông tin !</p>')
        }
        else{
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '../admin/changeprofile',
                type: 'POST',
                data: {
                    id:id_user,
                    username: username,
                    fullname: fullname,
                    email:email
                },
                success: function() {
                    alert('Success');
                    window.location.replace("../admin/home");
                },
                error:function(){
                    alert('Update Fail');
                }
            });
        }
    })

    $('#btnCancel').click(function(){
        redirect('../admin/home');
    })
});

$(document).ready(function(){
    baseUrl = window.location.origin;
    $('#btnCreate').click(function(e){
        e.preventDefault();
        $('#error_message').empty();
        var subject_id = $('#subject').val();
        var number = $('#number').val();
        if(subject_id == '' || number == ''){
            $('#error_message').html('<div class="callout callout-danger">' +
            '<h4>Lỗi!</h4>' +
            'Vui lòng điền đầy đủ thông tin.' +
            '</div>')
        }
        else if(number <=0)
        {
            $('#error_message').html('<div class="callout callout-danger">' +
            '<h4>Lỗi!</h4>' +
            'Vui lòng chọn thông tin phù hợp.' +
            '</div>')
        }
        else{
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseUrl+'/admin/exam/createexam',
                type: 'POST',
                data: {
                    subject_id: subject_id,
                    number: number
                },
                success:function(data){
                    $('#CreateExam').modal('hide');
                    alert('Exam is created!!');
                    location.reload();
                },
                error: function(){
                    alert('Error! try it again');
                }
            });
        }
    })

    $('.btnDelete').on('click',function(){
        $('#deleteExamModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        $('#id_exam').val(data[0]);
    });

    $('#deleteFormID').on('submit', function(e){
        e.preventDefault();
        var id = $('#id_exam').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: baseUrl+"/admin/exam/deleteexam/"+id,
            success:function(result){
                console.log(result);
                $('#deleteModal').modal('hide');
                alert('Xóa thành công');
                location.reload();
            },
            error: function(){
                alert('Xóa không thành công');
            }
        });
    })

    $('#btnPlayExam').on('click', function(){
        e.preventDefault();
        $('#error_message_exam').empty();
        var id_subject = $('#subject').val();
        if(id_subject==''){
            $('#error_message_exam').html('<div class="callout callout-danger">' +
            '<h4>Lỗi!</h4>' +
            'Vui lòng điền đầy đủ thông tin.' +
            '</div>')
        } else {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseUrl+'/admin/examlist/createexamlist',
                type: 'POST',
                data: {
                    id_subject: id_subject
                },
                success:function(data){
                    $('#PlayExam').modal('hide');
                    alert('Exam is Played!!');
                    location.reload();
                },
                error: function(){
                    alert('Error! try it again');
                }
            });
        }
    })
});


function update(id){
    baseUrl = window.location.origin;
    var time = $("#"+id).html();
    console.log(time);
    if(time==''){
        $('#error').html('<div class="callout callout-danger">' +
        '<h4>Lỗi!</h4>' +
        'Vui lòng không để trống.' +
        '</div>')
    }else if(time<=0){
        $('#error').html('<div class="callout callout-danger">' +
        '<h4>Lỗi!</h4>' +
        'Vui lòng enter correct value.' +
        '</div>')
    }
    else{
        $('#error').empty();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: baseUrl+'/admin/exam/editexam',
            type: 'POST',
            data: {
                id: id,
                time: time
            },
            success:function(result){
                var json_data = $.parseJSON(result);
                if(json_data.status == 1){
                    alert('success');
                }
                else{
                    $('#error_message').html('<div class="callout callout-danger">' +
                            '<h4>Lỗi!</h4>' +
                            'Not update.' +
                            '</div>')
                }
            }
        });
    }
}

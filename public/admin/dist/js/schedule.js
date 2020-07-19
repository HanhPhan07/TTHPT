$(document).ready(function(){
    baseUrl = window.location.origin;
    $('#btnCreateSche').click(function(e){
        e.preventDefault();
        $('#error_message').empty();
        var subject_id = $('#subject').val();
        var time = moment(
            $("#datepicker").datepicker("getDate")
        ).format("Y-M-D");;
        if(subject_id == ''|| time == ''){
            $('#error_message').html('<div class="callout callout-danger">' +
            '<h4>Lỗi!</h4>' +
            'Vui lòng điền đầy đủ thông tin.' +
            '</div>')
        }
        else{
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseUrl+'/admin/schedule/create',
                type: 'POST',
                data: {
                    subject_id: subject_id,
                    time: time
                },
                success:function(data){
                    $('#CreateSchedule').modal('hide');
                    alert('Thành công!!');
                    location.reload();
                },
                error: function(){
                    alert('Lỗi, vui lòng thử lại');
                }
            });
        }
    })

    $('#btnDeleteSche').on('click',function(){
        $('#DeleteSchedule').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        $('#delete_idsche').val(data[0]);
    });

    $('#deleteFormIDSchedule').on('submit', function(e){
        e.preventDefault();
        var id = $('#delete_idsche').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: baseUrl+"/admin/schedule/delete/"+id,
            success:function(result){
                console.log(result);
                $('#DeleteSchedule').modal('hide');
                alert('Xóa thành công');
                location.reload();
            },
            error: function(){
                alert('Xóa không thành công');
            }
        });
    })
});

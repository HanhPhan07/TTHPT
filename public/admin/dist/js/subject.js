$(document).ready(function(){
    $('#subject_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: '../admin/subject',
    },
    columns: [
      {
      data: 'id',
      name: 'id'
      },
      {
      data: 'name',
      name: 'name'
      },
      {
      data: 'time',
      name: 'time'
      },
      {
      data: 'created_at',
      name: 'created_at'
      },
      {
      data: 'updated_at',
      name: 'updated_at'
      },
      {
      data: 'action',
      name: 'action',
      orderable: false
      }
    ]
    });

    $('#add').click(function(){
      var addElement = document.getElementById("data1");


      if (addElement == null){
        var html='<tr>';
        html+= '<td  id="data1"></td>';
        html+= '<td contenteditable id="data2"></td>';
        html+= '<td contenteditable id="data3"></td>';
        html+= '<td  id="data4"></td>';
        html+= '<td  id="data5"></td>';
        html+= '<td><button name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>'; 
        html+= '</tr>';
        $('#subject_table tbody').prepend(html);
      }
      else alert('Vui lòng thêm lần lượt từng môn học');
    });

    $(document).on('click', '#insert', function(){
      var name = $('#data2').text();
      var time = $('#data3').text();
      var time1= parseInt(time);
      if (name!=''&&time!=''){
        if (time>0){

          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "../admin/subject/insert",
            method: "POST",
            data:{name:name,time:time},
            success:function(data){
              $('#subject_table').DataTable().ajax.reload();
            }
          });
        }
        else alert('Thời gian không hợp lệ');
      }
      else alert('Nhập đầy đủ thông tin');

    });

    $(document).on('click', '.delete', function(){
      sub_id = $(this).attr('id');
      if (confirm("Bạn có chắc chắn muốn xóa")) {
        $.ajax({
          url: '../admin/subject/delete/' + sub_id,
          method:"GET",
          success:function(){
            $('#subject_table').DataTable().ajax.reload();
          }
        });
      }
    });

    $(document).on('click', '.edit', function(){
      if ($("button").hasClass('update')==false){
        sub_id = $(this).attr('id');
        $('#'+sub_id+'.delete').hide();
        $('#'+sub_id).attr('class','update btn btn-success btn-sm');
        $('#'+sub_id).text('Update');
        $('#'+sub_id+'.update').parent().parent().children('td:eq("1")').attr('contenteditable','true');
        $('#'+sub_id+'.update').parent().parent().children('td:eq("2")').attr('contenteditable','true');
        
      }
      else alert('Vui lòng update từng dòng');
    });

    $(document).on('click', '.update', function(){
      var name = $('#'+sub_id+'.update').parent().parent().children('td:eq("1")').text();
      var id = $('#'+sub_id+'.update').parent().parent().children('td:eq("0")').text();
      var time = $('#'+sub_id+'.update').parent().parent().children('td:eq("2")').text();
      if (name!=''&&time!=''){
        if (time>0){
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "../admin/subject/update",
            method: "POST",
            data:{name:name,time:time, id:id},
            success:function(data){
              console.log(data);
              $('#subject_table').DataTable().ajax.reload();
            }
          });
        }
      }
      else alert('Time gian không đúng định dạng');
    });
  });
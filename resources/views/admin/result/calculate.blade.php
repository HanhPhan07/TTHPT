@extends('admin.share.master')
@section('content')
    <section class="content-header">
        <h1>
            Kết quả
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Kết quả</a></li>
            <li class="active">Danh sách điểm bài thi</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Điểm thi</h3>

                    </div>


                    <div class="box-body">
                        <table id="mark_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã học sinh</th>
                                    <th>Tên học sinh</th>
                                    <th>Mã đề thi</th>
                                    <th>Số câu đúng</th>
                                    <th>Điểm số</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mark as $item )
                                <tr>
                                    <td>{{ $item->id}}</td>
                                    <td>{{ $item->id_user}}</td>
                                    <td>{{ $item->student->fullname}}</td>
                                    <td>{{ $item->id_exam}}</td>
                                    <td>{{ $item->answer_correct}}</td>
                                    <td>{{ $item->mark}}</td>
                                    
                                </tr>
                            
                                @endforeach
                            </tbody>
                        </table>

                        


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection()

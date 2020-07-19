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
            <li class="active">Danh sách bài thi</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách môn học</h3>
                        <div class="pull-right">
                            <a href="{{ asset ('admin/result/calculatemark ') }}" class="btn btn-info "> <i class="fa  fa-plus"></i> Tính điểm</a>
                        </div>
                    </div>

                    {{-- @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            Upload Validation Error<br><br>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                    @endif --}}

                    {{-- <form action="{{ url('admin/subject') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <div class="box-header" style="text-align: height: 50px;line-height: 50px;white-space: nowrap;">
                            <h3 class="box-title">Danh sách bài thi</h3>
                            <div class="pull-right">
                                <a class="btn btn-app ">
                                    <input type="file" name="select_file" id="exampleInputFile">
                                </a>
                                <input type="submit" class="btn btn-app " value="Import"/><i class="glyphicon glyphicon-import"></i>
                                <a class="btn btn-app "><i class="glyphicon glyphicon-export"></i>Export</a>
                            </div>
                        </div>
                    </form> --}}
                    {{-- <button class="btn btn-app" id="add">Add</button> --}}

                    <div class="box-body">
                        <table id="result_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã học sinh</th>
                                    <th>Tên học sinh</th>
                                    <th>Mã đề thi</th>
                                    {{-- <th>Id học sinh</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $item )
                                <tr>
                                    <td>{{ $item->id}}</td>
                                    <td>{{ $item->id_user}}</td>
                                    <td>{{ $item->student->fullname}}</td>
                                    <td>{{ $item->id_exam}}</td>
                                    {{-- <td>{{ $item->id_user}}</td> --}}
                                    {{-- <td>
                                        <i title="Sửa" class="fa fa-pencil-square-o" style="margin-right: 5px;margin-left: 5px;"></i>

                                        @if ($item['isActive']==1) <i title=" Hiện " class="fa fa-eye"> </i>
                                        @else <i title=" Ẩn " class="fa fa-eye-slash"> </i>
                                        @endif

                                        <i title=" Xóa " class="fa fa-trash-o " style="color: darkred; "></i>
                                    </td> --}}
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

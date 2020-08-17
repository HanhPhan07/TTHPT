@extends('admin.share.master')
@section('content')
    <section class="content-header">
        <h1>
            Môn Học
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Môn Học</a></li>
            <li class="active">Danh sách môn học</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    {{-- <div class="box-header">
                        <h3 class="box-title">Danh sách môn học</h3>
                        <div class="pull-right">
                            <a href="{{ asset ('/subject/addsub ') }}" class="btn btn-info "> <i class="fa  fa-plus"></i> Thêm mới</a>
                        </div>
                    </div> --}}

                    @if(count($errors) > 0)
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
                    @endif


                        <div class="box-header" style="text-align: height: 50px;line-height: 50px;white-space: nowrap;">
                            <h3 class="box-title">Danh sách môn học</h3>
                            <div class="pull-right">
                                <button class="btn btn-app" id="add">Add</button>
                            </div>
                        </div>



                    <div class="box-body">
                        <table id="subject_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên môn học</th>
                                    <th>Thời gian thi</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Công cụ</th>

                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($subject as $item )
                                <tr>
                                    <td>{{ $item->id}}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->created_at}}</td>
                                    <td>{{ $item->updated_at}}</td>
                                    <td>
                                        <i title="Sửa" class="fa fa-pencil-square-o" style="margin-right: 5px;margin-left: 5px;"></i>

                                        @if ($item['isActive']==1) <i title=" Hiện " class="fa fa-eye"> </i>
                                        @else <i title=" Ẩn " class="fa fa-eye-slash"> </i>
                                        @endif

                                        <i title=" Xóa " class="fa fa-trash-o " style="color: darkred; "></i>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody> --}}
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

@extends('admin.share.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thi
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Thi</a></li>
            <li class="active">Danh sách thi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header" style="text-align: height: 50px;line-height: 50px;white-space: nowrap;">
                        <h2 class="box-title">Danh sách thi</h2>
                        <div class="pull-right">
                            <a class="btn btn-app "> <i class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#PlayExam"></i> Phát đề thi</a>
                            <div class="modal fade" id="PlayExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Phát đề thi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div id="error_message_exam">

                                    </div>
                                    <form method="POST">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="form-group">
                                              <label>Chọn môn thi</label>
                                              <select class="form-control" id="subject">
                                                <option selected>Môn thi</option>
                                                @foreach ($subject as $item)
                                                    <option value={{$item->id}}>{{$item->name}}</option>
                                                @endforeach
                                                {{-- <option value="1">1</option>
                                                <option value="2">2</option> --}}
                                              </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                            <button type="button" class="btn btn-primary" id="btnPlayExam">Phát đề</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>ID đề thi</th>
                                    <th>Thí sinh</th>
                                    <th>Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($examlist as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->id_exam}}</td>
                                        <td >
                                            {{$item->student->fullname}} </td>
                                        <td>
                                            <button type="button" class="delete btn btn-danger btn-sm" id="btnDeleteSche">Delete</button>
                                        </td>
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

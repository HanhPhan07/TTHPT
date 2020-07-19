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
            <li class="active">Lịch thi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header" style="text-align: height: 50px;line-height: 50px;white-space: nowrap;">
                        <h2 class="box-title">Lịch thi</h2>
                        <div class="pull-right">
                            <a class="btn btn-app "> <i class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#CreateSchedule"></i> Tạo lịch thi</a>
                            <div class="modal fade" id="CreateSchedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Tạo lịch thi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div id="error_message">

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
                                            <div class="form-group">
                                              <label>Ngày thi</label>

                                              <input type="text" class="form-control" id="datetimepicker" placeholder="Chọn thời gian thi">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="btnCreateSche">Save changes</button>
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
                                    <th>Môn thi</th>
                                    <th>Ngày thi</th>
                                    <th>Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedule as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->subject->name}}</td>
                                        <td >
                                            {{$item->test_date}} </td>
                                        <td>
                                            <button type="button" class="delete btn btn-danger btn-sm" id="btnDeleteSche">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="modal fade" id="DeleteSchedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xóa lịch thi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form id="deleteFormIDSchedule">
                                    <div class="modal-body">
                                        {{@csrf_field()}}
                                        <input type="text" name="id" id="delete_idsche">
                                        <p>Bạn có chắc chắn muốn xóa lịch thi này?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
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

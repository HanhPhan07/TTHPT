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
            <li class="active">Danh sách đề thi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header" style="text-align: aligin; height: 50px;line-height: 50px;white-space: nowrap;">
                        <h2 class="box-title">Danh sách đề thi</h2>
                        <div class="pull-right">
                            <a class="btn btn-app "> <i class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#CreateExam"></i> Tạo đề thi</a>
                            <!-- Button trigger modal -->
                            {{-- <button type="button" class="btn btn-primary, fa  fa-plus" data-toggle="modal" data-target="#CreateExam">
                                Tạo đề
                            </button> --}}

                            <!-- Create Modal -->
                            <div class="modal fade" id="CreateExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Tạo đề thi</h4>
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
                                              <label>Số câu hỏi</label>
                                              <input type="number" class="form-control" id="number" placeholder="Nhập số lượng câu hỏi">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                            <button type="button" class="btn btn-primary" id="btnCreate">Tạo đề</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id=error>

                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã đề thi</th>
                                    <th>Tên môn học</th>
                                    <th>Số lượng câu hỏi</th>
                                    <th>Thời gian tạo</th>
                                    <th>Công cụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exam as $item)
                                   <tr>
                                        {{-- <td><input type="text" value="{{$item->id}}" id="id" readonly></td>
                                        <td><input type="text" value="{{$item->subject->name}}" readonly></td>
                                        <td><input type="number" value="{{$item->number}}" readonly></td> --}}
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->subject->name}}</td>
                                        <td>{{$item->number}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm btnDelete">Delete </a>
                                            {{-- <button type="button" class="delete btn btn-danger btn-sm" id="btnDelete">Delete</button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Start modal delete -->
                        <div class="modal fade" id="deleteExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Exam</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form id="deleteFormID">
                                    <div class="modal-body">
                                        {{@csrf_field()}}
                                        <input type="text" name="id" id="id_exam">
                                        <p>Bạn có chắc chắn muốn xóa bài thi này?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Xóa</button>
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

@extends('admin.share.master')
@section('content')
    <section class="content-header">

        <h1>
            Câu Hỏi
            <small></small>
        </h1>
        <div id="error_message"></div>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Câu Hỏi</a></li>
            <li class="active">Danh sách câu hỏi</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header" style="text-align: height: 50px;line-height: 50px;white-space: nowrap;">
                        <h3 class="box-title">Danh sách câu hỏi</h3>
                        <div class="pull-right">
                            <form  method="post" enctype="multipart/form-data" id="file_form"> {{ csrf_field() }}
                                <a class="btn btn-app ">
                                    <input type="file" id="questionInputFile">
                                </a>
                                <a id="import_question" class="btn btn-app "><i class="glyphicon glyphicon-import"></i>Import</a>
                                <a href="{{route("exportQuestion")}}" class="btn btn-app "><i class="glyphicon glyphicon-export"></i>Export</a>
                            </form>
                        </div>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Câu hỏi</th>
                                    <th>Môn thi</th>
                                    <th>Đáp án 1</th>
                                    <th>Đáp án 2</th>
                                    <th>Đáp án 3</th>
                                    <th>Đáp án 4</th>
                                    <th>Đáp án đúng</th>
                                    <th>Thao tác</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($question as $item )
                                <tr>
                                    <td>{{ $item->id}}</td>
                                    <td>{{ $item->question_content}}</td>
                                    <td>
                                        @foreach ($subject as $itemsub)
                                        {{ $itemsub->id != $item->id_subject ? "" : $itemsub->name }}
                                        @endforeach

                                    </td>
                                    <td>{{ $item->ans_1}}</td>
                                    <td>{{ $item->ans_2}}</td>
                                    <td>{{ $item->ans_3}}</td>
                                    <td>{{ $item->ans_4}}</td>
                                    <td>{{ $item->ans_correct}}</td>

                                    <td>
                                        <a href="{{url('admin/question/detail/' .$item->id )}}"><i title="Sửa" class="fa fa-pencil-square-o" style="margin-right: 5px;margin-left: 5px; color: darkred;"></i></a>
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

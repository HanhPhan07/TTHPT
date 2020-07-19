@extends('admin.share.master')
@section('title','Chi tiết học sinh')
@section('content')
<section class="content-header">
    <h1>
        Câu hỏi
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a ><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/question')}}" >Câu hỏi</a></li>
        <li class="active">Chi tiết câu hỏi</li>
    </ol>
</section>

<section class="content">
    <div id="error_message">

    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header" style="text-align: height: 50px;line-height: 50px;white-space: nowrap;">
                    <h3 class="box-title">Chi tiết câu hỏi</h3>

                </div>

                <div class="box-body">
                    <div class="col-xs-12">
                        <input hidden id="idquestion" value="{{$question->id}}"/>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-2 control-label">Câu hỏi </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-9 col-sm-9">
                                <textarea id="question_content" class="form-control" >{{$question->question_content}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-2 control-label">Môn </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-9 col-sm-9">
                                    <select class="form-control select1" style="width: 100%;" id="inputidsubject">
                                        @foreach ($subject as $item)
                                            <option value="{{$item->id}}"{{ $item->id == $question->id_subject ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-2 control-label">Đáp án 1 </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-9 col-sm-9">
                                <textarea id="ans_1" class="form-control" value="">{{$question->ans_1}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-2 control-label">Đáp án 2 </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-9 col-sm-9">
                                <textarea id="ans_2" class="form-control" value="">{{$question->ans_2}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-2 control-label">Đáp án 3 </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-9 col-sm-9">
                                <textarea id="ans_3" class="form-control" value="">{{$question->ans_3}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-2 control-label">Đáp án 4 </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-9 col-sm-9">
                                <textarea id="ans_4" class="form-control" value="">{{$question->ans_4}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 col-sm-2 control-label">Đáp án đúng </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-9 col-sm-9">
                                    <select class="form-control select1" style="width: 100%;" id="ans_correct">
                                        <option value="A" {{ $question->ans_correct == "A" ? 'selected' : '' }}>A</option>
                                        <option value="B" {{ $question->ans_correct == "B" ? 'selected' : '' }}>B</option>
                                        <option value="C" {{ $question->ans_correct == "C" ? 'selected' : '' }}>C</option>
                                        <option value="D" {{ $question->ans_correct == "D" ? 'selected' : '' }}>D</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <div class="pull-right">
                            <a class="btn btn-app" id="btn-update">
                                <i class="fa fa-save"></i> Lưu thay đổi
                            </a>
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

</section>
<!-- /.content -->

@endsection()

@extends('admin.share.master')
@section('title','Chi tiết học sinh')
@section('content')
<section class="content-header">
    <h1>
        Học Sinh
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a ><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/student')}}" >Học Sinh</a></li>
        <li class="active">Chi tiết học sinh</li>
    </ol>
</section>

<section class="content">
    <div id="error_message">

    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header" style="text-align: height: 50px;line-height: 50px;white-space: nowrap;">
                    <h3 class="box-title">Chi tiết học sinh</h3>
                    <div class="pull-right">
                        <a class="btn btn-app" id="btn-save">
                            <i class="fa fa-save"></i> Save
                        </a>
                        <a class="btn btn-app dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <i class="glyphicon glyphicon-export"></i>Export
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                          <h2 class="page-header">
                          <i class="fa fa-fw fa-user-secret"></i><b> {{$student->fullname}}</b>
                          </h2>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <input hidden id="idusername" value="{{$student->id}}"/>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-xs-3 col-sm-3 control-label">Username </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-8 col-sm-8">
                                <input type="text" class="form-control" disabled value="{{$student->username}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-xs-3 col-sm-3 control-label">Password </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-8 col-sm-8">
                                    <input type="text" class="form-control" disabled value="{{$student->password}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-xs-3 col-sm-3 control-label">CMND </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-8 col-sm-8">
                                    <input type="text" class="form-control" id="inputcmnd" value="{{$student->cmnd}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-xs-3 col-sm-3 control-label">Ngày Sinh</label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-8 col-sm-8">
                                    <input type="text" class="form-control" id="datepicker" value="{{$student->date_of_birth->format('d/m/Y')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-xs-3 col-sm-3 control-label">Giới Tính </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-8 col-sm-8">
                                    <input type="text" class="form-control" id="inputgender" value="{{$student->gender}}">
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    <div class="col-xs-7">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label  class="col-xs-3 col-sm-3 control-label">Dân Tộc </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-8 col-sm-8">
                                    <input type="text" class="form-control" id="inputnation" value="{{$student->nation}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-xs-3 col-sm-3 control-label">Trường </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-8 col-sm-8">
                                    <select class="form-control select2" style="width: 100%;" id="inputidschool">
                                        @foreach ($school as $item)
                                            <option value="{{$item->id}}"{{ ($id_school->first()->id_school == $item->id) ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 col-sm-3 control-label">Địa Chỉ </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-8 col-sm-8">
                                    <input type="text" class="form-control" id="inputaddress" value="{{$student->address}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-xs-3 col-sm-3 control-label">Môn Thi </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-8 col-sm-8">
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Chọn Môn Thi" style="width: 100%;" id="inputsubjectlist">
                                        @foreach ($subject as $item)
                                            <option value="{{$item->id}}" {{ (in_array($item->id,$id_subject)) ? 'selected' : '' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 col-sm-3 control-label">Ngày Tạo </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-8 col-sm-8">
                                    <input type="text" class="form-control"  disabled value="{{$student->created_at->format('d/m/yy h:i:s')}}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        @foreach ($resultSubject as $item_O)
            @foreach ($item_O->result as $item1=>$value1)
                @foreach ($item_O->exam_list as $item2=>$value2)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
          
                      <div class="info-box-content">
                      <span class="info-box-text"></span>
                        <span class="info-box-number">{{$value1->mark}}</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                @endforeach
            
            @endforeach
        @endforeach
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Messages</span>
              <span class="info-box-number">1,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        {{-- <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bookmarks</span>
              <span class="info-box-number">410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Uploads</span>
              <span class="info-box-number">13,648</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">93,139</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->
      </div>
</section>
<!-- /.content -->

@endsection()
@extends('admin.share.master')
@section('title','Danh sách học sinh')
@section('content')
<section class="content-header">
    <h1>
        Học Sinh
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a ><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Học Sinh</a></li>
        <li class="active">Danh sách học sinh</li>
    </ol>
</section>

<section class="content">
    <div id="error_message">

    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header" style="text-align: height: 50px;line-height: 50px;white-space: nowrap;">
                    <h3 class="box-title">Danh sách học sinh</h3>
                    <div class="pull-right">
                        <div class="col-xs-9">
                            <form  method="post" enctype="multipart/form-data" id="file_form"> {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xs-8">
                                        <input type="file" id="inputFile" class="btn btn-app " />
                                    </div>
                                    <div class="col-xs-4">
                                        <a id ="btn_import" class="btn btn-app btn_import"><i class="glyphicon glyphicon-import"></i>Import</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-3">
                            <div class="btn-group">
                                <div class="form-group">
                                    <div class="input-group">
                                        <a class="btn btn-app" data-toggle="dropdown" aria-expanded="true">
                                            <i class="glyphicon glyphicon-export"></i>
                                            <span class="badge bg-blue">3</span>Export
                                        </a>
                                        <ul class="daterangepicker opensright dropdown-menu " >
                                            <li><a href="{{url('admin/student/export')}}">DSHS</a></li>
                                            <li><a href="{{url('export_excel')}}">Theo trường</a></li>
                                            <li><a href="{{url('export_excel')}}">Theo môn </a></li>
                                        </ul>
                                    </div>
                                  </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Ngày sinh</th>
                                <th>CMND</th>
                                <th>Giới tính</th>
                                <th>Dân tộc</th>
                                {{-- <th>Mã trường</th> --}}
                                <th>Địa chỉ</th>
                                {{-- <th>Môn Thi</th> --}}
                                <th>Công cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student as $item )
                                <tr>
                                    <td>{{ $item->id}}</td>
                                    <td>{{ $item->fullname}}</td>
                                    <td>{{ $item->date_of_birth->format('d/m/Y')}}</td>
                                    <td>{{ $item->cmnd}}</td>
                                    <td>{{ $item->gender}}</td>
                                    <td>{{ $item->nation}}</td>
                                    {{-- <td>{{ $item->id_school}}</td> --}}
                                    <td>{{ $item->address}}</td>
                                    {{-- <td>{{ $item->subject_list}} </td> --}}
                                    <td>
                                    <a href="{{url('admin/student/' .$item->id )}}"><i title="Sửa" class="fa fa-pencil-square-o" style="margin-right: 5px;margin-left: 5px; color: darkred;"></i></a>
                                        @if ($item['isActive']==1)
                                        <i title="Đã Thi" class="btn-isActive fa fa-eye "data-id={{ $item->id}} > </i>
                                        @else <i title="Chưa Thi" class="btn-isActive fa fa-eye-slash" data-id={{ $item->id}} > </i>
                                        @endif
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

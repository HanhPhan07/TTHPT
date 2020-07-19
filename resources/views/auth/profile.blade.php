@extends('admin.share.master')
@section('title','Thông tin cá nhân')
@section('content')
{{-- <section class="content">
    {{-- <form> --}}
        {{-- <label>Bạn có thể chỉnh sửa thông tin cá nhân tại đây</label>
        <hr>
        <div id="error_message" class="form-group col-md-7">

        </div>
        <div>
            <input type="hidden" id="inputID" value="{{Auth::user()->id}}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label>Username</label>
                <input type="text" class="form-control" id="inputUsername" value="{{Auth::user()->username}}">
            </div>
        </div>
        <div>
            <div class="form-group col-md-7">
                <label>Full name</label>
                <input type="text" class="form-control" id="inputFullname" value="{{Auth::user()->fullname}}">
            </div>
        </div>
        <div>
            <div class="form-group col-md-7">
                <label>Email</label>
                <input type="email" class="form-control" id="inputEmail" value="{{Auth::user()->email}}">
            </div>
        </div>
        <div class="form-row col-md-7">
            <div class="form-group col-md-3" >
                <button type="submit" class="btn btn-primary" id="btnUpdate" style="float: right;">Cập nhật</button>
            </div>
            <div class="form-group col-md-3">
                <a href="/home" class="btn btn-primary">Hủy</button>
            </div>
        </div> --}}
      {{-- </form> --}}
{{-- </section> --}}

<section class="content-header">
    <h1>
        Thông tin cá nhân
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Thông tin cá nhân</li>
    </ol>
</section>

<section class="content">
    <div id="error_message">

    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header" style="text-align: height: 50px;line-height: 50px;white-space: nowrap;">
                    <h3 class="box-title">Chỉnh sửa thông tin cá nhân</h3>
                </div>

                <div class="box-body">
                    <div class="col-xs-5">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <div id="error_message" class="form-group col-md-7">

                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <input type="hidden" id="inputID" value="{{Auth::user()->id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 col-sm-3 control-label">Username </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-8 col-sm-8">
                                <input type="text" class="form-control" id="inputUsername" value="{{Auth::user()->username}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-xs-3 col-sm-3 control-label">Fullname </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-8 col-sm-8">
                                    <input type="text" class="form-control" id="inputFullname" value="{{Auth::user()->fullname}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-xs-3 col-sm-3 control-label">Email </label>
                                <label class="col-xs-1 col-sm-1 control-label">:</label>
                                <div class="col-xs-8 col-sm-8">
                                    <input type="text" class="form-control" id="inputEmail" value="{{Auth::user()->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div  class="col-xs-6 col-sm-6">
                                    <button type="submit" class="btn btn-primary" id="btnUpdate" style="float: right;">Cập nhật</button>
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <button type="submit"  id="btnCancel" class="btn btn-primary">Hủy</button>
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
</section>
@endsection()

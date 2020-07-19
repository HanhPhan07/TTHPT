@extends('client.share.master')
@section('title','Chưa đến ngày thi')
@section('content')

<div class="box " style=" text-align: center; margin-top: 10%">
    <!-- /.box-header -->
    <div class="box-body">
      <div class="callout callout-danger">
        <h4>{{$title}}</h4>
        <p>{{$text}}</p>
      </div>
    </div>
    <!-- /.box-body -->
</div>
{{-- <div class="box box-solid" style="text-align: center">
    <div class="box-header with-border">
        <div class="box-body">
            <div class="box-body no-padding">
                <button type="button" class="btn bg-olive margin" onclick="location.href='{{ url('/home') }}'">Quay Lại</button>
            </div>
        </div>
    </div>
</div> --}}


@endsection()
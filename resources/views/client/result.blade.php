<div id="contentbody">
@extends('client.share.master')
@section('title','Xem lại bài làm')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-8 col-md-8">

            {{-- @for ($i=0;$i<$count;$i++) --}}
            <?php $i=0; ?>
            @foreach ($checkout as $item)
                <?php $i++; ?>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fa fa-question"></i>
                        <h3 class="box-title">
                            <strong>Câu {{$i}} :</strong>
                        </h3>
                    <span style="font-size: 16px">{{ $item->question->question_content }}</span>
                    </div>
                    <div class="box-body">
                        <dl class="dl-horizontal" id=" {{ $item->id }} ">
                            <dt>
                                <input type="radio" name="{{ $item->id }}" class="minimal" <?php if ($item->answer_selected==="A") echo "checked"; ?> disabled>A.
                            </dt>
                            <dd>{{ $item->question->ans_1 }}</dd>
                            <dt>
                                <input type="radio" name="{{ $item->id }}" class="minimal" <?php if ($item->answer_selected==="B") echo "checked"; ?> disabled>B.
                            </dt>
                            <dd>{{ $item->question->ans_2 }}</dd>
                            <dt>
                                <input type="radio" name="{{ $item->id }}" class="minimal" <?php if ($item->answer_selected==="C") echo "checked"; ?> disabled>C.
                            </dt>
                            <dd>{{ $item->question->ans_3 }}</dd>
                            <dt>
                                <input type="radio" name="{{ $item->id }}" class="minimal" <?php if ($item->answer_selected==="D") echo "checked"; ?> disabled>D.
                            </dt>
                            <dd>{{ $item->question->ans_4 }}</dd>
                        </dl>
                    </div>
                </div>
            @endforeach
                
            {{-- @endfor --}}
        </div>
        <div class="col-xs-4 col-md-4">
            <div class="box box-default color-palette-box">
                {{-- <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-clock-o"></i> THỜI GIAN HOÀN THÀNH
                    </h3>
                    <p class="text-red" id="time">01:52:12</p>
                </div> --}}
                <div class="box-body">
                    <div class="box box-solid">
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                {{-- @foreach ($student as $students) --}}
                                <tbody><tr>
                                    <th>Tên: </th>
                                    <th>{{ $student->fullname }}</th>
                                </tr>
                                <tr>
                                    <td>SBD: </td>
                                    <td>{{$student->username}}</td>
                                </tr>
                                <tr>
                                    <td>CMND: </td>
                                    <td>{{$student->cmnd}}</td>
                                </tr>
                                </tbody></table>
                                {{-- @endforeach --}}
                          </div>
                        </div>

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection()
</div>

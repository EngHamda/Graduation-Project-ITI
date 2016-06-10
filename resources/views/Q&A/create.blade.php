@extends('layouts.main')
@section('title','Q&A-Create')
@section('sidebar')
    create Sidebar
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Create Question</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                {{-- This comment will not be present in the rendered HTML --}}
                {{--  question_code, question_specific, question_detail
                      is_private, is_answered, patient_id--}}
                <div class="col-md-12">
                    {!! Form::open(array('url' => '/questions/save','method'=>'POST', 'enctype' =>'multipart/form-data')
                                , array('class'=>'form-horizontal')) !!}
                    <div class="form-group row">
                        {!! Form::label('question-specific', 'Specific Question'  
                                ,array('class'=>'col-sm-3 control-label'))!!}
                        <div class="col-sm-9">
                            {!! Form::text('question-specific', null, 
                                              array('class'=>' form-control',
                                                    'placeholder' => 'Specific Question')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('question-detail', 'Question Details'  
                                ,array('class'=>'col-sm-3 control-label'))!!}
                        <div class="col-sm-9">
                            {!! Form::textarea('question-detail', null, 
                                              array('class'=>' form-control',
                                                    'placeholder' => 'Question Details')) !!}
                        </div>
                    </div>
                    {{--<div class="form-group row">--}}
                        {{--{!! Form::label('question_attach', 'Question Attachments'  --}}
                                {{--,array('class'=>'col-sm-3 control-label'))!!}--}}
                        {{--<div class="col-sm-9">--}}
                            {{--{!! Form::file('question-attach', null, --}}
                                              {{--array('class'=>' form-control', 'multiple'=>'multiple'--}}
                                                    {{--'placeholder' => 'Upload Attachment')) !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}
<!--                    <form action="./php/upload.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="files[]" id="filer_input" multiple="multiple">
                            <input type="submit" value="Submit">
                      </form>Form::file('image')-->
                    <div class='col-sm-10 col-sm-offset-2'>
                        {!! Form::submit('Create Question', array('class'=>'btn btn-success col-sm-offset-2')) !!}                               
                        {!! Form::reset('Cancel Question', array('class'=>'btn btn-danger col-sm-offset-5')) !!}                               
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div><!--./panel-->
@stop

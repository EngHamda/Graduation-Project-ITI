@extends('layouts.main')
@section('title','Q&A-Edit Question')
{{--@section('sidebar')
    edit Sidebar
@stop--}}
@section('content')
<!--<div style="margin-top: 50px;"></div>-->
<!--    <div class="row"></div>-->
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Edit Question {{ $question->question_code }}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                {{-- This comment will not be present in the rendered HTML --}}
                {{--  question_code, question_specific, question_detail
                      is_private, is_answered, patient_id--}}
                <div class="col-md-12">
                    {!! Form::open(array('url' => "questions/update/".$question->id, 'method' => 'PUT', 'enctype' =>'multipart/form-data')
                                , array('class'=>'form-horizontal')) !!}
                    <div class="form-group row">
                        {!! Form::label('question-specific', 'Specific Question'  
                                ,array('class'=>'col-sm-3 control-label'))!!}
                        <div class="col-sm-9">
                            {!! Form::text('question-specific', $question->question_specific, 
                                              array('class'=>' form-control',
                                                    'placeholder' => 'Specific Question')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('question-detail', 'Question Details'  
                                ,array('class'=>'col-sm-3 control-label'))!!}
                        <div class="col-sm-9">
                            {!! Form::textarea('question-detail', $question->question_detail, 
                                              array('class'=>' form-control',
                                                    'placeholder' => 'Question Details')) !!}
                        </div>
                    </div>
                    <div class='col-sm-10 col-sm-offset-2'>
                        {!! Form::submit('Edit Question', array('class'=>'btn btn-success col-sm-offset-2', 'style' =>'margin-left: 60px;')) !!}                               
                        {!! Form::reset('Cancel Question', array('class'=>'btn btn-danger col-sm-offset-6', 'style' =>'margin-left: 210px;')) !!}                               
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div><!--./panel-->
@stop

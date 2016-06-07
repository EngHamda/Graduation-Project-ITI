@extends('layouts.main')
{{--@section('title','Q&A-Show')--}}
{{--@section('sidebar')--}}
    {{--show Sidebar--}}
{{--@stop--}}
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
              Question details
          </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <h3>Question QI      : {{ $question->question_code }}</h3>
                    <h4>Question Specific: {{ $question->question_specific }}</h4>
                    <h4>Question Detail  : {{ $question->question_detail }}</h4>
<!--                    <h4>Question Name: {{-- $unanswered_questions->clinic->name --}}</h4>-->
                    <h4>Question Owner   : {{ $question->patient->name }}</h4>
                    <h4>Question Status  : {{ $question->is_private }} , {{ $question->is_answered }}</h4>
                    <h4>Question Created_at: {{ $question->created_at }}</h4>
                    <h4>Question Updated_at: {{ $question->updated_at }}</h4>
@if(auth()->user()->role_id==4)
                    <a href="/answers/{{ $question->id}}/create" class="btn btn-success">Add Answer</a>
@endif
                    @if($question->patient_id == auth()->user()->id)
                    <a href="/questions/{{ $question->id}}/edit" class="btn btn-info">Edit</a>
                    

                    {!! Form::open([ 'url' => "/questions/destroy/".$question->id,'method' => 'DELETE'] ) !!}
                    {!! Form::submit('Cancel', array('class'=>'btn btn-danger')) !!} 
                    {!! Form::close() !!}
 @endif
                </div>  
<!--                <div class="col-md-4">
                    <img src="images/{{--$question->profile_picture--}}">
                    <h4><a href="http://localhost:8000/reservations/{{$question->id}}">{{$question->is_answered}}</a></h4>
                </div>
                <div class="col-md-8">
                    <ul class="list-group">
                        <li class="list-group-item"></li>
                    </ul>                       
                </div>-->
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
              Answers
          </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    @foreach($question->answers as $answer)
                    <h3>Answer Specific  : {{ $answer->answer_specific }}</h3>
                    <h4>Answer Detail  : {{ $answer->answer_detail }}</h4>
                    <h4>Answer Owner   : {{ $answer->physician->name }}</h4>
                    <h4>Answer Created_at: {{ $answer->created_at }}</h4>
                    <h4>Answer Updated_at: {{ $answer->updated_at }}</h4>
                @if($answer->id==auth()->user()->id)
                    <a href="/questions/answers/{{ $answer->id}}/edit" class="btn btn-success">Edit</a>
                 
                   
                    {!! Form::open([ 'url' => '/answers/destroy/'.$answer->id,'method' => 'DELETE' ]) !!}
                    {!! Form::submit('Cancel', array('class'=>'btn btn-danger')) !!} 
                    {!! Form::close() !!}
                    @endif
                    @endforeach
                </div>  
            </div>
        </div>
    </div>    
<!--Test Show-->
@stop

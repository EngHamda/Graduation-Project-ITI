@extends('layouts.main')

@section('content')
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
   @foreach($adverisements as $index => $add)
    <div class="item @if($index == 0) {{ 'active' }} @endif">
    <a href="/physician/request/{{$add->id}}"><img style="width: 25%;" src="{{ URL::to('/') }}/images/{{ $add->path }}"  alt="{{ URL::to('/') }}/images/{{ $add->path }}">  </a>
    <h3>requst now </h3>
    </div>
@endforeach

      
    </div>
      

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Create Advice</h3>
    </div>
    <div class="panel-body">
        {!! Form::open(array('url' => '/advices/create','method'=>'POST','enctype'=>'multipart/form-data')) !!}

        <div class="form-group">
            {!!Form::label('advice', 'Insert Advice') !!}
            {!! Form::text('advice',$values=null,$attributes=['class'=>'form-control','name'=>'advice'])!!}


            {!! Form::submit('Submit')!!}
        </div>

        {!! Form::close() !!}
    </div>
</div>
@stop

@extends('layouts.main')
@section('title','Q&A-Index')
@section('sidebar')
    Index Sidebar
@stop
@section('content')
            
         <div class="row">
           
            <div class="col-sm-12">
              <h3>Question & Answers </h3>
              <!--begin tabs going in wide content -->
               <ul class="nav nav-tabs content-tabs" id="maincontent">
                  <?php $first = true; ?>
                   @foreach($specialties as $specialty)
                    @if ( $first )
                  <li class="active">
                      <a href="#{{ $specialty->speciality_id }}" data-toggle="tab">
                          {{ $specialty->speciality_id }}
                      </a>
                  </li>
                        <?php $first = false; ?>
                    @else
                  <li><a href="#{{ $specialty->speciality_id }}" data-toggle="tab">{{ $specialty->speciality_id }}</a></li>
                    @endif
                  @endforeach
                  <li><a href="#unanswered" data-toggle="tab">Unanswered Question</a></li>
               </ul><!--/.nav-tabs.content-tabs -->
               <div class="tab-content">
                 <?php $first = true; ?>
                  @foreach($specialties as $specialty)
                    @if ( $first )
                  <div class="tab-pane fade in active" id="{{ $specialty->speciality_id }}">
                      @foreach($questions as $question)
                        @if ( $specialty->speciality_id == $question->speciality_id )
                            <h4>
                                <a href="http://localhost:8000/questions/{{ $question->id}}">
                               {{ $question->question_specific }}
                                </a>
                            </h4>
                        @endif                                              
                      @endforeach
                  </div><!--/.tab-pane -->
                        <?php $first = false; ?>
                    @else
                  <div class="tab-pane fade" id="{{ $specialty->speciality_id }}">
                     @foreach($questions as $question)
                        @if ( $specialty->speciality_id == $question->speciality_id )
                            <h4>
                                <a href="http://localhost:8000/questions/{{ $question->id}}">
                               {{ $question->question_specific }}
                                </a>
                            </h4>
                        @endif                                              
                      @endforeach 
                  </div><!--/.tab-pane -->
                    @endif
                  @endforeach
                  <div class="tab-pane fade" id="unanswered">
                     @foreach($questions as $question)
                        @if ( !$question->is_answered)
                            <h4>
                                <a href="http://localhost:8000/questions/{{ $question->id}}">
                               {{ $question->question_specific }}
                                </a>
                            </h4>
                        @endif                                              
                      @endforeach 
                  </div><!--/.tab-pane -->
               </div><!--/.tab-content -->
            </div><!--/.col-sm-12 -->
         </div><!--/.row -->
        
@stop
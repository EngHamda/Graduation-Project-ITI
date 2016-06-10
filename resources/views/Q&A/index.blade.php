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
              @if( auth()->user()->role_id != 2 && auth()->user()->role_id != 4 && auth()->user()->role_id != 5)
              <div id="user_notPhy_notanyPat">
                {{-- "5555555555" --}}
                @foreach($answered_questions as $answered_questions)
                    <h4>
                        <a href="http://localhost:8000/questions/{{ $answered_questions->id}}">
                           {{ $answered_questions->question_specific }}
                        </a>
                    </h4>
                    @foreach($answersList as $answer)
                        @if ( $answer->question_id == $answered_questions->id )
                        <p>
                            {{ $answer->answer_specific }}
                            {{-- $answer->question->question_code --}}
                        </p>
                        @endif
                    @endforeach
                @endforeach 
              </div>
              @else
                {{-- "g,p,ph"--}}
                <ul class="nav nav-tabs content-tabs" id="maincontent">
                    <li class="active">
                @if( auth()->user()->role_id == 4)
                <!--physician unanswered, answered-->
                    {{--"physician"--}}
                    <a href="#UnansweredQuiestion" data-toggle="tab">
                        {{"Unanswered Question"}}{{-- $specialty->speciality_id --}}
                    </a>
                    </li>
                    <li>
                        <a href="#AnsweredQuestion" data-toggle="tab">
                            {{"Answered Question"}}{{-- $specialty->speciality_id --}}
                        </a>
                    </li>
                @else
                <!--my question, answered question-->
                    {{--"patient"--}}
                    <a href="#MyQuestion" data-toggle="tab">
                        {{"My Question"}}{{-- $specialty->speciality_id --}}
                    </a>
                    </li>
                    <li>
                        <a href="#AnsweredQuestion" data-toggle="tab">
                            {{"All Question"}}{{-- $specialty->speciality_id --}}
                        </a>
                    </li>
                @endif
                </ul><!--/.nav-tabs.content-tabs -->
                <!--tab Content if phy & if patient -->
                <div class="tab-content">
                @if( auth()->user()->role_id == 4)
                    <!--tab content with id #UnansweredQuiestion -->
                    <div class="tab-pane fade in active" id="UnansweredQuiestion">
                        @foreach($unanswered_questions as $unanswered_question)
                            <h4>
                                <a href="/questions/{{ $unanswered_question->id}}">
                                   {{ $unanswered_question->question_specific }}
                                </a>
                            </h4>
                        @endforeach
                    </div><!-- /.tab-pane -->
                @else
                    <!--tab content with id #MyQuestion -->
                    <div class="tab-pane fade in active" id="MyQuestion">
                        @foreach($unanswered_questions as $unanswered_question)
                            @if($unanswered_question->patient_id == auth()->user()->id)
                            <h4>
                                <a href="/questions/{{ $unanswered_question->id}}">
                                   {{ $unanswered_question->question_specific }}
                                </a>
                            </h4>
                            @endif
                        @endforeach
                        @foreach($answered_questions as $answered_question)
                            <!--get user questions-->
                            @if($answered_question->patient_id == auth()->user()->id)
                                <h4>
                                    <a href="/questions/{{ $answered_question->id}}">
                                       {{ $answered_question->question_specific }}
                                    </a>
                                </h4>
                                @foreach($answersList as $answer)
                                    @if ( $answer->question_id == $answered_question->id )
                                        <p style="padding-left: 20px;margin-left: 10px;">
                                            {{ $answer->answer_specific }}
                                        </p>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div><!-- /.tab-pane -->
                @endif
                    <!--tab content with id #AnsweredQuestion -->
                    <div class="tab-pane fade" id="AnsweredQuestion">
                        @foreach($answered_questions as $answered_question)
                            <h4>
                                <a href="/questions/{{ $answered_question->id}}">
                                   {{ $answered_question->question_specific }}
                                </a>
                            </h4>
                            @foreach($answersList as $answer)
                                @if ( $answer->question_id == $answered_question->id )
                                    <p style="padding-left: 20px;margin-left: 10px;">
                                        {{ $answer->answer_specific }}
                                    </p>
                                @endif
                            @endforeach
                        @endforeach 
                    </div><!-- /.tab-pane -->
                </div><!--/.tab-content -->
              @endif
              
            </div><!--/.col-sm-12 -->
         </div><!--/.row -->
        
@stop
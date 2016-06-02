<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\Commands\StoreQuestionCommand;
use App\Http\Requests\StoreQuestionRequest;

use App\Commands\UpdateQuestionCommand;
use App\Http\Requests\UpdateQuestionRequest;


use App\Commands\DestoryQuestionCommand;

use App\Question;
//use App\Answer;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //*  id, question_code, question_specific, question_detail
        //*  is_private, is_answered, patient_id, created_at, updated_at

//        $questions = Question::all();
        $questions = Question::orderBy('question_code', 'asc')->get();

        $answered_questions     = array();
        $unanswered_questions   = array();
        $answersList            = array();
        foreach ($questions as $question ){ 
            // Code Here
            if( $question->is_answered == 'unanswered' ){
                array_push($unanswered_questions, $question);
            }else{
                array_push($answered_questions, $question);                
            }
            //echo $question->is_answered;
        }
        foreach ($questions as $question) {
            $answers = Question::find($question->id)->answers;
                //asso array need foreach
                //get all answers of this question
            foreach ($answers as $answer) {
                array_push($answersList, $answer);
                //$answer is all answers of question & $answer is json
            }
        }
        return view('Q&A.index',  compact('unanswered_questions', 'answered_questions','answersList'));//,'specialties'));
//        return compact('unanswered_questions', 'answered_questions','answersList');//,'specialties');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Q&A.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        //
        //get data from view
        //*  id, question_code, question_specific, question_detail
        //*  is_private, is_answered, patient_id, created_at, updated_at

        $question_code      = 'QI-'.time();//$request->input('patient-name');$x=time();
        $question_specific  = $request->input('question-specific');
        $question_detail    = $request->input('question-detail');
        $patient_id         = 3;//$request->input('patient-id');
///*        
////$attach      = $request->file('question-attach');
//        //check data
////        if($attach){
////            $attach_filename= $attach->getClientOriginalFileName();
////            //write @bootstrap\app.php
////            $attach->move(public_path('attachments'),$attach_filename);
////        }else {
////            $attach_filename = null; //is send to command           
////        }
// * 
// */
        //create command
        $command = new StoreQuestionCommand($question_code, $question_specific, $question_detail, $patient_id);
        //run command
        $this->dispatch($command);
        return \Redirect::route('questions.index')
                ->with('message','New Question is added');
//        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $question = Question::find($id);
//        $answers = $question->answers;
//        return compact('question');
        return view('Q&A.show',  compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $question = Question::find($id);
        return view('Q&A.edit',  compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, $id)
    {
        //
        $question_specific  = $request->input('question-specific');
        $question_detail    = $request->input('question-detail');
        $patient_id         = 3;//$request->input('patient-id');
        //create command
        $command = new UpdateQuestionCommand($id, $question_specific, $question_detail, $patient_id);
        //run command
        $this->dispatch($command);
        return \Redirect::route('questions.index')
                ->with('message','Question is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $command = new DestoryQuestionCommand($id);
        //run command
        $this->dispatch($command);
        return \Redirect::route('questions.index')
                ->with('message','Question is deleted');
        
    }
}

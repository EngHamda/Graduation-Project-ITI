<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Commands\StoreAnswerCommand;
use App\Commands\StoreAnswerQuestionCommand;
use App\Http\Requests\StoreAnswerRequest;

use App\Commands\UpdateAnswerCommand;
use App\Http\Requests\UpdateAnswerRequest;

use App\Commands\UpdateIsanswerQuestionCommand;
use App\Commands\DestoryAnswerCommand;

use App\Question;
use App\Speciality;
use App\Answer;
class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//$id)
    {
        //
//        return view('Q&A.index',  compact('unanswered_questions', 'questions'));//,'specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $question = Question::find($id);
        //create query of all specialities
        $specialities=  Speciality::all('id','name');
//        return $specialities;
        return view('Q&A.createAnswer',  compact('question','specialities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswerRequest $request)
    {
        //answer-specific, answer-detail, answer-speciality, id-question
        $answer_specific     = $request->input('answer-specific');
        $answer_detail       = $request->input('answer-detail');
        $answer_speciality   = $request->input('answer-speciality');
        $question_id         = $request->input('id-question');
        $physician_id        = auth()->user()->id;//$request->input('id-question');
//        echo "$question_specific";
        //create command
        $commandCreate = new StoreAnswerCommand($answer_specific, $answer_detail, $answer_speciality, $question_id, $physician_id);
        $commandUpdate = new StoreAnswerQuestionCommand($question_id);
        //run command
        $this->dispatch($commandCreate);
        $this->dispatch($commandUpdate);
        return redirect('/questions')
                ->with('message','New Answer is added');
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
        //$question = Question::find($id);
        $answer = Answer::find($id);
        $specialities=  Speciality::all('id','name');
        return view('Q&A.editAnswer',  compact('answer','specialities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnswerRequest $request, $id)
    {
        //
        //answer-specific, answer-detail, answer-speciality, id-question
        $answer_specific     = $request->input('answer-specific');
        $answer_detail       = $request->input('answer-detail');
        $answer_speciality   = $request->input('answer-speciality');
        $question_id         = $request->input('id-question');
        $physician_id        = auth()->user()->id;//$request->input('id-question');
        //create command
        $command = new UpdateAnswerCommand($id, $answer_specific, $answer_detail, $answer_speciality, $question_id, $physician_id);
        //run command
        $this->dispatch($command);
        return redirect('/questions')
                ->with('message','The Answer is updated');
        
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
        $answer = Answer::find($id);
        $count = Answer::where('question_id', $answer->question_id)->count();
        if($count==1){
            //set question unanswered
            $commandUpdate = new UpdateIsanswerQuestionCommand($answer->question_id);
            $this->dispatch($commandUpdate);
            //$question = Question::find($answer->question_id);
            
        }
        //count number of answer of this question 
            //if number is one change question is unanswered 
            //
            //select count(question_id) from answers where question_id=2;
            //else 
        $command = new DestoryAnswerCommand($id);
        //run command
        $this->dispatch($command);
        return redirect('/questions/'.$answer->question_id)
                ->with('message','Answer is deleted');
    }
}

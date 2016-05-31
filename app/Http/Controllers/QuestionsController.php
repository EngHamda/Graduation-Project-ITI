<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/*
use App\Commands\StoreReservationCommand;
use App\Http\Requests\StoreReservationRequest;

use App\Commands\UpdateReservationCommand;
use App\Http\Requests\UpdateReservationRequest;


use App\Commands\DestoryReservationCommand;

use App\Reservation;
use DB;
 */
use App\Question;
use DB;

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
        $questions = DB::table('questions')
            ->join('questionspecialties', 'questionspecialties.question_id', '=', 'questions.id')
            ->select('questions.id', 'questions.question_code'
                    , 'questions.question_specific', 'questions.question_detail'
                    , 'questionspecialties.speciality_id', 'questions.is_private'
                    , 'questions.is_answered', 'questions.updated_at')
            ->get();
        $specialties = DB::table('questionspecialties')
            ->select('question_id', 'speciality_id')
            ->groupBy('speciality_id')
                  //for no duplicate (no record has same ('speciality_id'))
            ->get();
        
        return view('Q&A.index',  compact('questions','specialties'));
//        return compact('questions','specialties');

        
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
    public function store(Request $request)
    {
        //
        //get data from view
        //*  id, question_code, question_specific, question_detail
        //*  is_private, is_answered, patient_id, created_at, updated_at

        $question_code      = 1;//$request->input('patient-name');
        $question_specific  = $request->input('question-specific');
        $question_detail    = $request->input('question-detail');
        $is_private         = 0;//$request->input('is-private');
        $is_answered        = 0;$request->input('is-answered');
        $patient_id         = 1;//$request->input('patient-id');
///*        
////$image      = $request->image('reservation-image');
//        //check data
////        if($image){
////            $image_filename= $image->getClientOriginalFileName();
////            //write @cache\app.php
////            $image->move(public_path('images'),$image_filename);
////        }else {
////            $image_filename = 'noimage.jpg';            
////        }
// * 
// */
        //create command
        $command = new StoreQuestionCommand($question_code, $question_specific, $question_detail, $is_private, $is_answered, $patient_id);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}

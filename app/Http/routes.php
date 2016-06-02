<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
//Route::get('auth/logout', 'Auth\AuthController@logout');


Route::get('user/logout', 'Auth\AuthController@userlogout');
Route::get('user/login', 'Auth\AuthController@userlogin');
Route::get('auth/login', 'Auth\AuthController@getlogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::post('user/login', 'UsersController@userslogin');
//put here routes to be acess only by doctor
Route::group(['middleware' => 'patient'], function () {   

  Route::get('/patient', function () {
    return view('patientprofile');
} );    
    
    //Question Routes
    Route::resource('questions','QuestionsController');
  });


//put here routes to be acess only by doctor
Route::group(['middleware' => 'physician'], function () {
Route::get('/physician', 'PhysicianController@index'); 
 

Route::get('/physician/request/{id}','PhysicianController@requestcompany');
Route::post('physician/storecompanyrequest','PhysicianController@storecompanyrequest');
    Route::post('/advices/create','AdvicesController@store');
    Route::delete('/advices/destroy/{id}',array('uses' => 'AdvicesController@destroy','as' => 'advices.destroy'));
    Route::get('/advices/{id}/edit',array('uses' => 'AdvicesController@edit'));
    Route::put('/advices/update/{id}','AdvicesController@update');
       });


//put here routes to be acess only by assistant
Route::group(['middleware' => 'assistant'], function () {

  /*Route::get('/assistant', function () {
    return view('assistantprofile');



} );*/  


Route::get('/assistant/addnewpatientprofile', function () {
    return view('addnewpatientprofile');


} );  

Route::post('assistant/addnewpatientprofile','AssistantController@store');

Route::resource('assistant','AssistantController');
Route::post('assistant/searchpatientprofile',"AssistantController@search");


  

       });




Route::group(['middleware' => 'medicalcompany'], function () {
Route::group(['middleware'=>'auth:medicalcompany'],function(){Route::get('/medicalcompany', 'MedicalcompanyController@index');});

Route::get('/medicalcompany/login', 'MedicalcompanyController@login');
Route::post('/medicalcompany/login', 'MedicalcompanyController@postLogin');
Route::get('/medicalcompany/logout', 'MedicalcompanyController@logout');
Route::post('/medicalcompany/storead', 'MedicalcompanyController@uploaded');
Route::get('/medicalcompany/confirmdoctorrequest/{id}','MedicalcompanyController@confirm');
});


//Route::resource('advices','AdvicesController');
Route::get('/advices',array('uses' => 'AdvicesController@index','as' => 'advices.index'));
Route::post('advices/like',array('uses' => 'AdvicesController@adviceLikeAdvice'));

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/','ReservationsController@index');


//Reservation Routes
Route::resource('reservations','ReservationsController');


//Answer Routes
//Route::resource('answers','AnswersController');
//Route::post('answers/{question}/create','AnswersController@create');
Route::get('answers/{id}/create','AnswersController@create');
Route::post('answers','AnswersController@store');
Route::resource('answers','AnswersController', ['only' => 'destroy']);
Route::GET('questions/answers/{id}/edit','AnswersController@edit');
Route::PUT('questions/answers/{aid}','AnswersController@update');
//Route::get('answers/{id}','AnswersController@destroy');
//Route::resource('questions.answers', 'AnswersController');
//    photos/{photos}/comments/{comments}.
//questions/1/answers/10/edit

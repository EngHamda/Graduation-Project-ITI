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

       });


//put here routes to be acess only by doctor
Route::group(['middleware' => 'physician'], function () {
Route::get('/physician', 'PhysicianController@index'); 
 

Route::get('/physician/request/{id}','PhysicianController@requestcompany');
Route::post('physician/storecompanyrequest','PhysicianController@storecompanyrequest');
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


Route::resource('advices','AdvicesController');
//Route::post('/physician','AdvicesController@create');
Route::post('advices/like',array('uses' => 'AdvicesController@adviceLikeAdvice'));

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/','ReservationsController@index');


//Reservation Routes
Route::resource('reservations','ReservationsController');

//Question Routes
Route::resource('questions','QuestionsController');

//Answer Routes
//Route::resource('answers','AnswersController');
//Route::post('answers/{question}/create','AnswersController@create');
Route::get('answers/{id}/create','AnswersController@create');
Route::post('answers','AnswersController@store');


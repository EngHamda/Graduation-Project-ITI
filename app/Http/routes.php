<?php
Route::get('/', function () { return view('welcome');});
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('user/logout', 'Auth\AuthController@userlogout');
Route::get('user/login', 'Auth\AuthController@userlogin');
Route::get('auth/login', 'Auth\AuthController@getlogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::post('user/login', 'UsersController@userslogin');





Route::group(['middleware' => 'reservation'], function () {

Route::post('/patient/store','ReservationsController@store');
});










//route acess by patient 
Route::group(['middleware' => 'patient'], function () {
  Route::get('/patient', function () {return view('patientprofile');});  
});




//put here routes to be acess only by doctor
Route::group(['middleware' => 'physician'], function () {
Route::get('/physician', 'PhysicianController@index'); 
Route::get('/physician/request/{id}','PhysicianController@requestcompany');
Route::post('physician/storecompanyrequest','PhysicianController@storecompanyrequest');
});







//put here routes to be acess only by assistant
Route::group(['middleware' => 'assistant'], function () {
Route::get('/patient/index','ReservationsController@index');
Route::get('/patient/show/{id}','ReservationsController@show');
Route::get('/patient/delayreservation/{id}','ReservationsController@edit');
Route::delete('/patient/delete/{id}','ReservationsController@destroy');
Route::put('/patient/update/{id}','ReservationsController@update');
Route::get('/assistant/addnewpatientprofile', function () {return view('addnewpatientprofile');});  
Route::post('assistant/addnewpatientprofile','AssistantController@store');
Route::resource('assistant','AssistantController');
Route::post('assistant/searchpatientprofile',"AssistantController@search");
Route::get('/patient/create/{id}','ReservationsController@createbyassistant');
});



//put here links to be acess only by medicalcompany
Route::group(['middleware' => 'medicalcompany'], function () {
Route::group(['middleware'=>'auth:medicalcompany'],function(){Route::get('/medicalcompany', 'MedicalcompanyController@index');});

Route::get('/medicalcompany/login', 'MedicalcompanyController@login');
Route::post('/medicalcompany/login', 'MedicalcompanyController@postLogin');
Route::get('/medicalcompany/logout', 'MedicalcompanyController@logout');
Route::post('/medicalcompany/storead', 'MedicalcompanyController@uploaded');
Route::get('/medicalcompany/confirmdoctorrequest/{id}','MedicalcompanyController@confirm');
});




















/*Route::get('advices/like',[
     'uses'=>'AdvicesController@adviceLikeAdvice',
     //'as' =>'like'
]);*/
Route::post('advices/like',array('uses' => 'AdvicesController@adviceLikeAdvice'));

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/','ReservationsController@index');


//Reservation Routes
//Route::resource('reservations','ReservationsController');

//Question Routes
Route::resource('questions','QuestionsController');

//Answer Routes
//Route::resource('answers','AnswersController');
//Route::post('answers/{question}/create','AnswersController@create');
Route::get('answers/{id}/create','AnswersController@create');
Route::post('answers','AnswersController@store');
Route::resource('answers','AnswersController', ['only' => 'destroy']);










//Route::get('answers/{id}','AnswersController@destroy');
//Route::resource('questions.answers', 'AnswersController');
//    photos/{photos}/comments/{comments}.

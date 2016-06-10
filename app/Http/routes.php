<?php


//Route::get('/', function () { return view('welcome');});

Route::get('/',array('uses' => 'HomePageController@index','as' => 'homepage'));
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('user/logout', 'Auth\AuthController@userlogout');
//Route::get('user/login', 'Auth\AuthController@userlogin');
Route::get('auth/login', 'Auth\AuthController@getlogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::post('user/login', 'UsersController@userslogin');
Route::get('questions','QuestionsController@index');
Route::get('question/{id}','QuestionsController@show');
Route::get('/advices/{id}','AdvicesController@show');
Route::get('/advices',array('uses' => 'AdvicesController@index','as' => 'advices.index'));
Route::post('advices/like',array('uses' => 'AdvicesController@adviceLikeAdvice'));

Route::get('/medicalcompany/login', 'AuthMedicalcompanyController@login');
Route::post('/medicalcompany/login', 'AuthMedicalcompanyController@postLogin');


//put here routes to be acess only by doctor
Route::group(['middleware' => 'patient'], function () {   
    Route::get('/patient', function () {
        return view('patientprofile');   
    });    
});

//onlyquestionowner
Route::group(['middleware' => 'questionowneredit'], function () {   

Route::get('questions/{id}/edit','QuestionsController@edit');
Route::put('questions/update/{id}','QuestionsController@update');

   
  });

//questionowner and questionnotansweredyet
Route::group(['middleware' => 'questionownerdestroy'], function () {   
    Route::delete('/questions/destroy/{id}','QuestionsController@destroy');
  });


//onlyquestionowner
Route::group(['middleware' => 'questionowneredit'], function () {   
    Route::get('questions/{id}/edit','QuestionsController@edit');
    Route::put('questions/update/{id}','QuestionsController@update');   
});


//patientandguestpatient
Route::group(['middleware' => 'askquestion'], function () {   
    Route::get('/questions/create','QuestionsController@create');
    Route::post('/questions','QuestionsController@store');
});


//questionowner and questionnotansweredyet
Route::group(['middleware' => 'questionownerdestroy'], function () {   
    Route::delete('/questions/destroy/{id}','QuestionsController@destroy');
});


//acess by assistant and patient and guestpatient
Route::group(['middleware' => 'reservation'], function () {
    //for ajax
    //create
    Route::get ('reservations/create', 'ReservationsController@create');
    Route::get ('reservations/create/{id}', 'ReservationsController@show');
    Route::get('reservations/physicians', 'ReservationsController@getphysicians');
    Route::get('reservations/days', 'ReservationsController@getdays');
    Route::resource('reservations','ReservationsController', 
        ['except' => ['create', 'show','edit', 'update', 'destroy', 'index']]);
    

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
Route::get('/answers/{id}/create','AnswersController@create');
Route::post('/answers/store','AnswersController@store');
 Route::post('/advices/create','AdvicesController@store');
Route::get('/add', function () { return view('doctorpatientprofile');});
Route::post('/test','PatientprofilesController@insertpatientprofile');
Route::get('/prescription', function () { return view('prescription');});

Route::post('/addprescription','PatientprofilesController@insertprescription');
Route::post('/sendemail','PatientprofilesController@sendemailtoprescriptionpage');
Route::get('/addprescription','PatientprofilesController@showprescription');

});


//adviceowner
Route::group(['middleware' => 'adviceeditdestroy'], function () {
    Route::get('/advices/{id}/edit','AdvicesController@edit');
    Route::put('/advices/update/{id}','AdvicesController@update');
    Route::delete('/advices/destroy/{id}',array('uses' => 'AdvicesController@destroy','as' => 'advices.destroy'));
});




//put here routes to be acess only by assistant
Route::group(['middleware' => 'assistant'], function () {
    /*Reservation*/
    //for ajax
//    //create
//    Route::get ('reservations/create', 'ReservationsController@create');
//    Route::get ('reservations/create/{id}', 'ReservationsController@show');
//    Route::get('reservations/physicians', 'ReservationsController@getphysicians');
//    Route::get('reservations/days', 'ReservationsController@getdays');
    Route::resource('reservations','ReservationsController', 
        ['except' => ['create', 'show','edit', 'store']]);
    //edit
    Route::get ('reservations/{id}/edit', 'ReservationsController@edit');
    Route::get('reservations/{id}/physicians', 'ReservationsController@getphysicians');
    Route::get('reservations/{id}/days', 'ReservationsController@getdays');
    
    Route::get('/assistant/addnewpatientprofile', function () {
        return view('addnewpatientprofile');
        
    });  
    Route::post('assistant/addnewpatientprofile','AssistantController@store');
    Route::resource('assistant','AssistantController');
    Route::post('assistant/searchpatientprofile',"AssistantController@search");
    Route::get('/patient/create/{id}','ReservationsController@createbyassistant');
    //ClinicTimes
    Route::resource('clinictimes','ClinicTimesController');

});



//put here links to be acess only by medicalcompany
Route::group(['middleware' => 'medicalcompany'], function () {

Route::group(['middleware'=>'auth:medicalcompany'],function(){Route::get('/medicalcompany', 'AuthMedicalcompanyController@index');});
    Route::get('/medicalcompany/logout', 'AuthMedicalcompanyController@logout');
Route::post('/medicalcompany/storead', 'AdvertisementController@uploaded');
Route::get('/medicalcompany/confirmdoctorrequest/{id}','AdvertisementController@confirm');

});


//answerowner
Route::group(['middleware' => 'answerowner'], function () {
    Route::delete('/answers/destroy/{id}','AnswersController@destroy');
    Route::GET('questions/answers/{id}/edit','AnswersController@edit');
    Route::PUT('questions/answers/{id}','AnswersController@update');
});

/*
Route::get('advices/like',[
     'uses'=>'AdvicesController@adviceLikeAdvice',
     //'as' =>'like'
]);*/

//Route::resource('advices','AdvicesController');


//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/','ReservationsController@index');

/**/
//Reservation Routes
//Route::resource('reservations','ReservationsController', 
//        ['except' => ['create', 'show','edit']]);
//Route::get ('reservations/{id}', 'ReservationsController@show');

//for ajax
//create
//Route::get ('reservations/create', 'ReservationsController@create');
//Route::get ('reservations/create/{id}', 'ReservationsController@show');
//Route::get('reservations/physicians', 'ReservationsController@getphysicians');
//Route::get('reservations/days', 'ReservationsController@getdays');
////edit
//Route::get ('reservations/{id}/edit', 'ReservationsController@edit');
//Route::get('reservations/{id}/physicians', 'ReservationsController@getphysicians');
//Route::get('reservations/{id}/days', 'ReservationsController@getdays');
/**/

//Route::resource('reservations','ReservationsController');

//Answer Routes
//Route::resource('answers','AnswersController');
//Route::post('answers/{question}/create','AnswersController@create');



//Route::get('answers/{id}','AnswersController@destroy');
//Route::resource('questions.answers', 'AnswersController');
//    photos/{photos}/comments/{comments}.


//Route::get('answers/{id}','AnswersController@destroy');
//Route::resource('questions.answers', 'AnswersController');
//    photos/{photos}/comments/{comments}.
//questions/1/answers/10/edit


Route::get('/profile','PatientprofilesController@index');
Route::post('searchpatient','PatientprofilesController@index');


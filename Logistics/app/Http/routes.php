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

//*********************************** Default Route *************************//

/* Old Code */
Route::get('/demo', function(){
    return view('demo');
});

Route::group(array('prefix' => ''), function() {
    Route::any('/login',"AuthenticationController@login");
    Route::any('/Module', "AuthenticationController@modulePage");
    Route::any('/Subjects', "AuthenticationController@subjectsPage");
    Route::any('/Sample', "AuthenticationController@samplePage");
    Route::any('/Concept', "AuthenticationController@conceptPage");
    Route::any('/Timer', "AuthenticationController@timerPage");
    Route::any('/module1/next_question', function(){return view('averagequestion');});
    Route::any('/module1/AverageTimerConcept', function(){return view('averagetimer');});
    Route::any('/AverageConcept', function(){return view('averageconcept');});
    Route::any('/Module2/Sample', function(){return view('module2_sample');});
    Route::any('/Module2/Concept', function(){return view('module2_concept');});
    Route::any('/Module2/Timer', function(){return view('module2_timer');});
    Route::any('/Module3/Sample', function(){return view('module3_sample');});
    Route::any('/Module3/Concept', function(){return view('module3_concept');});
    Route::any('/Module3/Timer', function(){return view('module3_timer');});
    Route::any('/Module4/Sample', function(){return view('module4_sample');});
    Route::any('/Module4/Concept', function(){return view('module4_concept');});
    Route::any('/Module4/Timer', function(){return view('module4_timer');});
});


Route::group(array('prefix' => '/quick'), function() {
    Route::any('/goToModule', "AuthenticationController@module");
    Route::any('/goToSample', "AuthenticationController@sample");
    Route::any('/goToConcept', "AuthenticationController@concept");
    Route::any('/goToTimer', "AuthenticationController@timer");
    Route::any('/goToAverageConcept', "AuthenticationController@concept");
    Route::any('/goToAverageTimer', "AuthenticationController@concept");
});

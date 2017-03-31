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

Route::get('/', 'FrontPageController@loadQuiz');
Route::get('/load/questions/{id}', 'FrontPageController@getQuestionForQuiz');
Route::group(['prefix' => 'admin'], function(){
	Route::auth();

	Route::get('/', 'HomeController@index');
	Route::group(['prefix' => 'quiz', 'middleware' => 'auth'], function(){
		Route::get('/', 'QuizController@index');
		Route::get('/add', 'QuizController@showForm');
		Route::post('/add', 'QuizController@saveQuiz');
	});

	Route::group(['prefix' => 'questions', 'middleware' => 'auth'], function(){
		Route::get('/', 'QuestionsController@index');
		Route::get('/add', 'QuestionsController@showForm');
		Route::post('/add', 'QuestionsController@saveQuestions');
	});

});

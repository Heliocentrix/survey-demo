<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

/*admin routes*/

//login
Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

//survey
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//survey
Route::get('/survey', 'SurveyController@index')->name('survey');
Route::post('/survey/store', 'SurveyController@store');

Route::get('/survey/{id}/edit', 'SurveyController@edit');
Route::get('/survey/{id}/delete', 'SurveyController@destroy');
Route::get('/survey/{id}/view', 'SurveyController@showTemplate');
Route::get('/survey/{id}/assignQuestions', 'SurveyController@assign_questions');
Route::post('/survey-questions/store', 'SurveyController@store_surveyQuestions');



Route::post('/survey/category/create', 'SurveyCategoryController@store');
Route::get('/survey/archives', 'SurveyController@view_archives')->name('archives');



//reports
Route::get('/reports', 'ReportsController@index')->name('reports');
Route::get('/result/{id}', 'ReportsController@user_result')->name('user.result');

//questions
Route::get('/questions', 'QuestionController@index')->name('questions');
Route::get('/question/create', 'QuestionController@create');
Route::get('/question/{id}/edit', 'QuestionController@edit');
Route::get('/question/{id}/delete', 'QuestionController@destroy');
Route::get('/question/{id}/retrieve', 'QuestionController@retrieve_question');
Route::post('/question/save', 'QuestionController@store');
Route::post('/question/update', 'QuestionController@update');

/*end admin routes*/

/*jquery api*/
Route::post('/api/survey/sort', 'SurveyController@sort_questions')->name('question.sort');

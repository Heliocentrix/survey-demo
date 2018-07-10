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
Route::get('/survey', 'SurveyController@index')->name('admin.dashboard');
Route::get('/survey/results', 'SurveyController@view_results')->name('results');
Route::get('/survey/archives', 'SurveyController@view_archives')->name('archives');
Route::get('/result/{id}', 'SurveyController@user_result')->name('user.result');

//crud
Route::get('/question/new', 'QuestionController@new_question');
Route::get('/question/{id}/edit', 'QuestionController@edit_question');
Route::get('/question/{id}/delete', 'QuestionController@delete_question');
Route::get('/question/{id}/retrieve', 'QuestionController@retrieve_question');
Route::post('/question/save', 'QuestionController@store_question');
Route::post('/question/update', 'QuestionController@update_question');

/*end admin routes*/

/*jquery api*/
Route::post('/api/survey/sort', 'SurveyController@sort_questions')->name('question.sort');

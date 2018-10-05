<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/questions', 'ApiController@get_questions');
Route::post('/survey/submit', 'ApiController@submit_survey');

Route::get('/{slug}', 'ApiController@check');

Route::get('/survey_category', 'api\SurveyTypeController@getSurveyCategory');
Route::post('/survey_category/submit', 'api\SurveyTypeController@submit_surveyCategory');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

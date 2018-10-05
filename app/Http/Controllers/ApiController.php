<?php

namespace App\Http\Controllers;

use App\Question;
use App\Survey;
use App\SurveyQuestions;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ApiController extends Controller
{
    public function get_questions()
    {
        $questions = Question::where('status', 'published')->orderBy('sort_order')->get();
        foreach ($questions as $key => $value) {
            $value->options;
        }

        return $questions;
    }

    public function submit_survey(Request $request)
    {
        return $request['answer'];
    }

    public function getSurveyCategory()
    {
        $sub_cat = ['education','poll'];
        return $sub_cat;
    }

    public function submit_surveyCategory(Request $request)
    {
        return response()
        ->json($request['name']);

    }

    
    public function check($slug)
    {
      $surveys = Survey::where('url',$slug)->get();       
      $questions = new Collection();
       foreach ($surveys as $survey) {
          foreach ($survey->survey_questions as $key => $value) {    
            $questions->push($value->question);          
          }
       }
       $surveys->survey_questions = $questions;
        return response()
        ->json($surveys);

    }
}

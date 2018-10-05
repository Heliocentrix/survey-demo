<?php

namespace App\Http\Controllers;

use Input;
use Redirect;
use Validator;
use App\SurveyType;
use Illuminate\Http\Request;

class SurveyCategoryController extends Controller
{
    public function store(Request $request)
    {
          $survey_category = new SurveyType();
          $survey_category->name = $request->category_name;
          $survey_category->description = $request->category_description;
          $survey_category->save();
          if(!$survey_category->save()){
            return Redirect::back()->withInput()->withErrors($validation->messages());
          } 
          return Redirect::back();
    
    }

}

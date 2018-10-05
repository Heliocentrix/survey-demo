<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SurveyType;

class SurveyTypeController extends Controller
{
    //
    
    public function getSurveyCategory()
    {
        $surveyType = SurveyType::all();
        return response()
        ->json($surveyType);
    }
    
    public function submit_surveyCategory(Request $request)
    {   
        $response = false;
        //store submitted data to Question
        $surveyType = new SurveyType();
        $surveyType->name = $request->name;
        $surveyType->description = $request->description;
        $surveyType->save();
        
        if($surveyType->save())
        {
            $response = true;
        }        
        return response()
        ->json($response);
        
    }
}

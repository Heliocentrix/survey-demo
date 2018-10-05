<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Survey;
use App\SurveyQuestions;
use App\User;
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
        
        $userExist = User::where('email',$request['email'])->get()->first();
        $id = 0;
        if(count($userExist) == 0){
            $user = new User();
            $user->email = $request['email'];
            $user->name = $request['email'];
            $user->password = bcrypt('secret');
            $user->save();     
            $id = $user->id;    
        }else{
            $answerExist = Answer::where('user_id', $userExist->id)->where('survey_id', $request['survey_id'])->get()->count();
         
            if($answerExist == 1){
                return response()
                ->json(['error' => "You have answer this survey alreay!"]);
            }
        }
        
      
        foreach($request['questions'] as $question){
            $answers = new Answer();
            $answers->user_id = count($userExist) == 1 ? $userExist->id : $id;
            $answers->question_id = $question['id'];
            $answers->survey_id = $request['survey_id'];
            $answers->answer = $question['value'];
            $answers->save();
        }
        return response()
        ->json(['success' => "Thank you for answering our survey!"]);
      
        
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

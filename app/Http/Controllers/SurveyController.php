<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Survey;
use App\SurveyQuestions;
use App\SurveyType;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $surveys = Survey::all();
        $survey_categories = SurveyType::all();
        return view('admin.survey.list', compact('surveys', 'survey_categories'));
    }


    /**
     * 
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.survey.create');
    }


      /**
     * 
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $survey = new Survey();
        $survey->name = $request->survey_name;
        $survey->description = $request->survey_description;
        $survey->url = $request->survey_url;
        $survey->survey_type_id = $request->category_id;
        $survey->save();

        return redirect()->back();
    }


    public function assign_questions($id){
        $survey = Survey::find($id);
        $questions = Question::all();
        return view('admin.survey.assign-questions', compact('survey', 'questions'));
    }

    public function store_surveyQuestions(Request $request){
        
        $data = $request->except('_token');
        foreach ($data['question_ids'] as $key => $question_id) {
                $survey_question =  new SurveyQuestions();
                $survey_question->survey_id = $data['survey_id'];
                $survey_question->question_id = $question_id;
                $survey_question->order = $key+1;
                $survey_question->save();
        }
        return redirect()->back();
    }





    /**
     * Show the deleted questions.
     *
     * @return \Illuminate\View\View
     */
    public function view_archives()
    {
        //display archieved questions
        $archieves = Question::where('status', 'deleted')->get();

        return view('admin.retrieve-question', compact('archieves'));
    }

    /**
     * update the sort order.
     */
    public function sort_questions(Request $request)
    {
        $data = $request->all();

        foreach ($data['data'] as $key => $value) {
            $question = Question::find($value['question_id']);
            $question->sort_order = $value['order'];
            $question->update();
        }

        return $data;
    }
    
 
}

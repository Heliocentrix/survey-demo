<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
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
        //display published questions
        $questions = Question::where('status', 'published')->orderBy('sort_order')->get();

        return view('admin.survey', compact('questions', 'archieves'));
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

    //RESULTS
    public function view_results()
    {
        $answers = Answer::distinct()->get(['user_id']);

        return view('admin.survey-results', compact('answers'));
    }

    public function user_result($id)
    {
        //get all answer of specific user
        $questions = Question::where('status', 'published')->get();
        $answers = Answer::where('user_id', $id)->get();

        return view('admin.user-result', compact('questions', 'answers'));
    }

    //END RESULTS
}

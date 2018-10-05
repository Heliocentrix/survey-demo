<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;

use Illuminate\Http\Request;

class ReportsController extends Controller
{    
    public function index()
    {
        $answers = Answer::distinct()->get(['user_id']);

        return view('admin.reports.list', compact('answers'));
    }

    public function user_result($id)
    {
        //get all answer of specific user
        $questions = Question::where('status', 'published')->get();
        $answers = Answer::where('user_id', $id)->get();

        return view('admin.reports.user-result', compact('questions', 'answers'));
    }

    //END RESULTS
}

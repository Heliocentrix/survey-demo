<?php

namespace App\Http\Controllers;

use App\Question;
use App\Survey;
use App\User;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $questions_count = Question::get()->count();
        $users_count = User::get()->count();
        $survey_count = Survey::get()->count();

        return view('admin.dashboard', compact('questions_count','users_count','survey_count'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Option;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
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

        return view('admin.questions.list', compact('questions', 'archieves'));
    }


    public function create()
    {
        return view('admin.questions.create');
    }

    public function edit($id)
    {
        //get question by id
        $question = Question::where('id', $id)->first();

        return view('admin.questions.edit', compact('question'));
    }

    public function destroy($id)
    {
        $question = Question::find($id);
        $question->status = 'deleted';
        $question->update();

        return redirect('/questions');
    }

    public function retrieve_question($id)
    {
        //get question by id and update to published
        $question = Question::find($id);
        $question->status = 'published';
        $question->update();

        return redirect('/questions');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        //store submitted data to Question
        $question = new Question();
        $question->title = $request->title;
        $question->question_category = $request->question_category;
        $question->question_type = $request->question_type;
        $question->status = 'published';
        $question->survey_id = 1;
        $question->save();

        if ($question->save() && $request->question_type == 'multiple') {
            $id = $question->id;
            foreach ($data['option'] as $key => $value) {
                $option = new Option();
                $option->question_id = $id;
                $option->text = $value;
                $option->save();
            }
        }

        return redirect('/questions');
    }

    public function update(Request $request)
    {
        $question = Question::find($request->question_id);

        $question->title = $request->title;
        $question->question_type = $request->question_type;
        $question->question_category = $request->question_category;
        $question->update();
        if ($request->question_type == 'multiple') {
            $id = $request->question_id;
            foreach ($request['answer'][$id] as $key => $value) {
                $option = Option::find($key);

                if ($option) {
                    $option->question_id = $id;
                    $option->text = $value;
                    $option->update();
                } else {
                    $option = new Option();
                    $option->question_id = $id;
                    $option->text = $value;
                    $option->save();
                }
            }
        }

        return redirect('/questions');
    }
}

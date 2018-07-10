<?php

namespace App\Http\Controllers;

use App\Option;
use App\Question;

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

    public function new_question()
    {
        return view('admin.new-question');
    }

    public function edit_question($id)
    {
        //get question by id
        $question = Question::where('id', $id)->first();

        return view('admin.edit-question', compact('question'));
    }

    public function delete_question($id)
    {
        $question = Question::find($id);
        $question->status = 'deleted';
        $question->update();

        return redirect('/survey');
    }

    public function retrieve_question($id)
    {
        //get question by id and update to published
        $question = Question::find($id);
        $question->status = 'published';
        $question->update();

        return redirect('/survey');
    }

    public function store_question(Request $request)
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

        return redirect('/survey');
    }

    public function update_question(Request $request)
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

        return redirect('/survey');
    }
}

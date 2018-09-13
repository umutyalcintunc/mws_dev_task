<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;

use App\Question;
use App\Choice;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function start_get()
    {
        return view('welcome');
    }

    public function start_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $request->session()->put('name', $request->name);
        $request->session()->put('question_number', 0);

        return redirect('continue');
    }

    public function continue_get()
    {
        //dd(session()->all());
        //dd(Session::get('question_number'));

        $question_number = Session::get('question_number');

        $question = Question::where('id', $question_number+1)->get()->toArray();
        //dd($question);
        $choices = Choice::where('question_id', $question_number+1)->get()->toArray();

        if(empty($question) || empty($choices)) {
            return view('completed');
        } else {
            return view('questionnaire')->with(['question' => $question[0]['body'], 'choices' => $choices]);
        }
    }

    public function continue_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'choice' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $question_number = Session::get('question_number');
        Session::put('answer_'.$question_number, $request->choice);

        Session::put('question_number', $question_number + 1);
        Session::put('prev_question_number', $question_number);

        return redirect('continue');
    }
}

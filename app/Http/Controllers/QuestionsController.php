<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Quiz;
use App\Question;


class QuestionsController extends Controller
{
	public function index()
	{
		$questions = Question::with('get_quiz')->paginate(15);
		foreach ($questions as $key => $value) {
			$answers = explode(",", $value->options);
			$value->correct_answer = $answers[$value->answer-1];
		}
		return view('questions.all', compact('questions'));
	}


    public function showForm()
    {
    	$quiz = Quiz::select('title', 'id', 'noofquestions')->get();
    	return view('questions.add', compact('quiz'));
    }


    public function saveQuestions(Request $req)
    {
    	$params = [];
    	$questions = $req->get('question');
    	$options = $req->get('option');
    	$answer = $req->get('answer');
    	foreach($questions as $key => $val){
    		$params[$key]['quiz_id'] = $req->get('quiz_id');
    		$params[$key]['title'] = $val;
    		$params[$key]['options'] = implode(",", $options[$key]);
    		$params[$key]['answer'] = $answer[$key];
    		$params[$key]['created_at'] = date('Y-m-d h:i:s');
    		$params[$key]['updated_at'] = date('Y-m-d h:i:s');
    	}
    	try{
    		Question::insert($params);
    		return redirect('/admin/questions');
    	}catch(\Exception $ex){
    		return $ex->getMessage();
    	}
    }
}

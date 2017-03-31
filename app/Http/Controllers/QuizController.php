<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Quiz;

class QuizController extends Controller
{

    public function index(){
    	$quiz = Quiz::paginate(5);
    	return view('quiz.all', compact('quiz'));
    }

    public function showForm(){
    	return view('quiz.add');
    }


    public function saveQuiz(Request $req){
    	$rules = [
    		'title' => 'required',
			'noofquestions' => 'required|numeric',
			'timeperiod' => 'required|numeric'
    	];
    	$messages = [
    		'title.required' => 'Please neter title for your quiz',
			'noofquestions.required' => 'Please enter how many questions you want to add',
			'noofquestions.numeric' => 'Please enter numeric values only',
			'timeperiod.required' => 'Please enter how many minutes quiz will run',
			'timeperiod.numeric' => 'Please enter numeric values only'
    	];
    	$this->validate($req, $rules, $messages);
    	$quiz = new Quiz;
    	$quiz->title = $req->get('title');
    	$quiz->noofquestions = $req->get('noofquestions');
    	$quiz->timeperiod = $req->get('timeperiod');
    	$quiz->save();
    	if(!empty($quiz->id)){
    		return redirect('admin/quiz');
    	}else{
    		return redirect()->back()->withErrors('Oops, look like something went wrong, please try after some time');
    	}
    }
}

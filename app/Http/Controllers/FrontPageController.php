<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Quiz;
use App\Question;




class FrontPageController extends Controller
{
    public function loadQuiz()
    {
    	$quiz = Quiz::pluck('title', 'id');
    	return view('quiz', compact('quiz'));
    }



    public function getQuestionForQuiz($id)
    {
    	$question = Question::where('quiz_id', $id)->get();
    	$response = [];
    	foreach ($question as $key => $value) {
    		$response[$key]['title'] = $value->title;
    		$optarray = explode(",", $value->options);
    		$response[$key]['options'] = $optarray;
    		$response[$key]['answer'] = $optarray[$value->answer-1];
    	}
    	return $response;
    }
}

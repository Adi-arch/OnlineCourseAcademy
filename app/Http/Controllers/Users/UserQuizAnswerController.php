<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\UserQuiz;
use App\Models\UserAnswerQuiz;
use Illuminate\Http\Request;

class UserQuizAnswerController extends Controller
{
    public function storeQuizAns(Request $request)
    {
       
            $answer=UserAnswerQuiz::create([
                'user_id' => $request->user()->id,
                'question' => $request->input('question'),
                'given_answer' => $request->input('answer'),
                'true_answer' => $request->input('true_answer')
            ]);
        if ($request->input('answer')==$request->input('true_answer')) {
            $insert=UserQuiz::where('user_id',$request->user()->id)->increment('score');
        }
            return response($answer);
        
    }
}
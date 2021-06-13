<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuizInfo;

class QuizCreationController extends Controller
{
    public function create()
    {
        return view('dashboard.instructor.createQuiz');
    }

    public function uploadQuiz(Request $request)
    {
        $quizInfo= new QuizInfo;

        $quizInfo = QuizInfo::create([
                
                'course' => $request->input('course'),
                'question_length' => $request->input('question_length'),
                'uniqueid' => $request->input('uniqueid'),
                'time' => $request->input('time')
            ]);
            // return('success');
        return view('dashboard.instructor.createQuestion', ['quizInfo' => $quizInfo]);
    }
}

<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\UserQuiz;
use App\Models\QuizInfo;
use App\Models\Questions;
use Illuminate\Http\Request;

class UserQuizController extends Controller
{
    public function index()
    {
        return view('dashboard.user.applyQuiz');
    }

    public function quizStore(Request $req)
    {
        $userQuiz = new UserQuiz;
        $userId = $req->user()->id;
        $examCodeForValidate = $req->input('exam_code');
        $initialScore = 0;

        $checker=UserQuiz::where('user_id','=',$userId)->where('uniqueId','=',$examCodeForValidate)->count();
        if ($checker>0) {
            return "You already done this exam";
        }
        else {
            $userQuiz = UserQuiz::create([
                'user_id' => $req->user()->id,
                'uniqueId' => $req->input('exam_code'),
                'score' => $initialScore
            ]);

            $exam_id = $req->input('exam_code');
            $user_id = $req->user()->id;
            $findCourse =  QuizInfo::where('uniqueid',$exam_id)->value('id');
            $findTime =  QuizInfo::where('uniqueid',$exam_id)->value('time');
            $course = QuizInfo::where('uniqueid',$exam_id)->value('course_id');
            $questions = Questions::where('quiz_id',$findCourse)->get();
            return view('dashboard.user.answerQuiz')
            ->with('questions',$questions)
            ->with('user_id',$user_id)
            ->with('time',$findTime)
            ->with('course',$course);
        }
    }
}